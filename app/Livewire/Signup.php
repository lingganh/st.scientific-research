<?php

namespace App\Livewire;

use App\Http\Requests\RegisterRequest;
use App\Models\User;
use Livewire\Component;

class Signup extends Component
{
    public function register( )
    {
        $this->validate([
            'name' => 'required|string',
            'email' => 'required|email|unique:users,email',
            'password' => 'required|confirmed',
        ]);
        $otp = rand(100000, 999999);
        $otpExpiresAt = now()->addMinutes(10);

        $user = User::create([
            'name' => $request->name,
            'email' => $request->email,
            'password' => bcrypt($request->password),
            'otp' => $otp,

            'otp_expires_at' =>  $otpExpiresAt,
        ]);

        $subject = 'Mã Kích Hoạt';
        $messageContent = "<h1> Mã xác thực của bạn : {$otp} </h1>";

        \Mail::raw($messageContent, function ($message) use ($user, $subject) {
            $message->to($user->email, $user->name)
                ->subject($subject);
        });

        session(['otp_email' => $user->email]);
        return redirect()->route('verify-otp')->with('success', "Mã OTP đã được gửi đến email của bạn. Vui lòng kiểm tra email");
    }
    public function render()
    {
        return view('livewire.signup')->extends('components.layouts.app')->section('content');
    }
}
