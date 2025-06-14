<?php

namespace App\Livewire;

use AllowDynamicProperties;
use Livewire\Component;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Carbon;

#[AllowDynamicProperties] class VerifyOtp extends Component
{
    public $email;
    public $otp;
    public $showResendButton = false;
    public $resendCooldown = 120;
    public $resendTimer = 0;

    protected $rules = [
        'otp' => 'required|numeric|digits:6',
    ];

    protected $messages = [
        'otp.required' => 'Mã OTP không được để trống.',
        'otp.numeric' => 'Mã OTP phải là số.',
        'otp.digits' => 'Mã OTP phải có 6 chữ số.',
    ];

    public function mount()
    {
        $this->email = session('otp_email');

        if (empty($this->email)) {
            return redirect()->route('siginup');
        }


        $this->startResendCooldown();
    }


    public function startResendCooldown()
    {
        $this->showResendButton = false;
        $this->resendTimer = $this->resendCooldown;

        $this->dispatch('resend-timer-start');
    }

    public function verifyOtp()
    {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            session()->flash('error', 'Không tìm thấy tài khoản với email này.');

        }

        if ($user->otp !== (int)$this->otp) {
            session()->flash('error', 'Mã OTP không chính xác. Vui lòng kiểm tra lại.');

        }

        if (Carbon::parse($user->otp_expires_at)->isPast()) {
            session()->flash('error', 'Mã OTP đã hết hạn. Vui lòng yêu cầu gửi lại mã mới.');
        }

        $user->email_verified_at = now();
        $user->otp = null;
        $user->otp_expires_at = null;
        $user->save();

        Auth::login($user);
        session()->forget('otp_email');
        session()->flash('success', 'Xác thực tài khoản thành công ');
        return redirect()->route('home');
    }

    public function resendOtp()
    {
        $user = User::where('email', $this->email)->first();

        if (!$user) {
            session()->flash('error', 'Không tìm thấy tài khoản với email này.');
            return;
        }

        $newOtp = rand(100000, 999999);
        $newOtpExpiresAt = now()->addMinutes(2);

        $user->otp = $newOtp;
        $user->otp_expires_at = $newOtpExpiresAt;
        $user->save();

        $subject = 'Mã Kích Hoạt Tài Khoản Mới Của Bạn';
        $messageContent = "<h1>Chào mừng bạn đến với ứng dụng của chúng tôi!</h1>";
        $messageContent .= "<p>Mã xác thực mới của bạn là: <strong>{$newOtp}</strong></p>";
        $messageContent .= "<p>Mã này sẽ hết hạn sau 2 phút.</p>";
        $messageContent .= "<p>Nếu bạn không yêu cầu mã này, vui lòng bỏ qua email này.</p>";

        try {
            Mail::raw($messageContent, function ($message) use ($user, $subject) {
                $message->to($user->email, $user->name)
                    ->subject($subject);
            });
            session()->flash('success', 'Mã OTP mới đã được gửi đến email của bạn. Vui lòng kiểm tra email.');
            $this->startResendCooldown();
        } catch (\Exception $e) {
            \Log::error('Error resending OTP email for user ' . $user->email . ': ' . $e->getMessage());
            session()->flash('error', 'Có lỗi xảy ra khi gửi lại mã OTP. Vui lòng thử lại sau.');
        }
    }


    protected $listeners = ['updateTimer', 'enableResend'];

    public function updateTimer($value)
    {
        $this->resendTimer = $value;
    }

    public function enableResend()
    {
        $this->showResendButton = true;
    }


    public function render()
    {
        return view('livewire.verify-otp')->extends('components.layouts.app')->section('content');
    }
}
