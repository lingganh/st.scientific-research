<?php

namespace App\Livewire;

 use App\Models\User;
use Livewire\Component;
 use Illuminate\Support\Facades\Hash;
 use Illuminate\Support\Facades\Mail;
class Signup extends Component
{
    public $name;
    public $email;
    public $password;
    public $password_confirmation;

    protected $rules = [
        'name' => 'required|string|max:255',
        'email' => 'required|email|unique:users,email',
        'password' => 'required|min:8|confirmed',
    ];

    protected $messages = [
        'name.required' => 'Tên là bắt buộc.',
        'email.required' => 'Email là bắt buộc.',
        'email.email' => 'Email không đúng định dạng.',
        'email.unique' => 'Email này đã được sử dụng.',
        'password.required' => 'Mật khẩu là bắt buộc.',
        'password.min' => 'Mật khẩu phải có ít nhất 8 ký tự.',
        'password.confirmed' => 'Xác nhận mật khẩu không khớp.',
    ];

    public function register()
    {
        $this->name = trim($this->name);
        $this->email = trim($this->email);

        $this->validate();

        $otp = rand(100000, 999999);
        $otpExpiresAt = now()->addMinutes(10);

        $user = User::create([
            'name' => $this->name,
            'email' => $this->email,
            'password' => Hash::make($this->password),
            'otp' => $otp,
            'otp_expires_at' => $otpExpiresAt,
            'email_verified_at' => null,
        ]);

        $subject = 'Mã Kích Hoạt Tài Khoản Của Bạn';
        $messageContent = "<h1>Chào mừng bạn đến với ứng dụng của chúng tôi!</h1>";
        $messageContent .= "<p>Mã xác thực của bạn là: <strong>{$otp}</strong></p>";
        $messageContent .= "<p>Mã này sẽ hết hạn sau 10 phút.</p>";
        $messageContent .= "<p>Nếu bạn không đăng ký tài khoản này, vui lòng bỏ qua email này.</p>";

        try {
            Mail::raw($messageContent, function ($message) use ($user, $subject) {
                $message->to($user->email, $user->name)
                    ->subject($subject);
            });
            session()->flash('success', "Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email.");
            session(['otp_email' => $user->email]);
            return redirect()->route('verify-otp');

        } catch (\Exception $e) {
            \Log::error('Error sending OTP email for user ' . $user->email . ': ' . $e->getMessage());
            $user->delete();
            session()->flash('error', 'Có lỗi xảy ra khi gửi mã OTP. Vui lòng thử lại sau hoặc liên hệ hỗ trợ.');
        }
    }

    public function render()
    {
        return view('livewire.signup')->extends('components.layouts.app')->section('content');
    }
}
