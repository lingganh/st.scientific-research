<?php

namespace App\Livewire;

use Livewire\Component;

class Signup extends Component
{
    public function render()
    {
        return view('livewire.signup')->extends('components.layouts.app')->section('content');
    }
}
