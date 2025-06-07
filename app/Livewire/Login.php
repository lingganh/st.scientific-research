<?php

namespace App\Livewire;

use Illuminate\Http\Request;
use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;
use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Exception;


class Login extends Component
{
    public $email;
    public $password;

    public function redirectToGoogle(){
        return Socialite::driver('google')->redirect();
    }
    public function handleGoogleCallback(){
        try {

            $user = Socialite::driver('google')->user();

            $finduser = User::where('email', $user->email)->first();

            if($finduser)

            {

                Auth::login($finduser);

                return redirect()->intended('')->with('success', 'Đăng Nhập Thành Công ');

            }

            else

            {
                $newUser = User::create([
                    'name' => $user->name,
                    'email' => $user->email,
//                    'google_id' => $user->id,
                    'password' => encrypt('123456qQ')
                ]);

                Auth::login($newUser);

                return redirect()->intended('')->with('success', 'Đăng Ký Thành Công ');
            }

        } catch (Exception $e) {
            dd($e->getMessage());
        }
    }
    public function logout(Request $request){
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect()->route('home')->with('success', 'Đăng Xuất Thành Công ');
    }
    public function login( ){
        $credentials = [
            'email' => $this->email,
            'password' => $this->password,
        ];

        if (Auth::attempt($credentials)) {
            $user = Auth::user();
            // dd($user->email);
            if($user->otp != null) {
                // session(['otp_email' => $user->email]);

                return redirect()->route('verify-otp')->with('warning', 'Tài khoản của bạn cần được xác thực. Vui lòng nhập mã OTP đã được gửi đến email của bạn.');
            }
            else{
                Auth::login($user);
                session(['user_id' => $user->id]);
                return redirect()->route('home')->with('success', 'Đăng Nhập Thành  Công');
            }

        } else {
            return redirect()->route('login')->with('error', 'Email hoặc mật khẩu không chính xác !');
        }
    }
    public function render()
    {
        return view('livewire.login')->extends('components.layouts.app')->section('content');
    }
}
