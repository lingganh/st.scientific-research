<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class UserProfile extends Component
{
    public function mount(){

    }
    public function render()
    {
        $user = Auth::user();
        return view('livewire.user-profile')->extends('components.layouts.app')->section('content');
    }
}
