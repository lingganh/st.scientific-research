<?php

namespace App\Livewire;

use Livewire\Component;
use Laravel\Socialite\Facades\Socialite;


class Login extends Component
{
    public function render()
    {
        return view('livewire.login')->extends('components.layouts.app')->section('content');
    }
}
