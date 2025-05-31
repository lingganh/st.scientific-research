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
    public function render()
    {
        return view('livewire.login')->extends('components.layouts.app')->section('content');
    }
}
