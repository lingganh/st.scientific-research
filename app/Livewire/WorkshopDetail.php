<?php

namespace App\Livewire;

use App\Models\Workshop;
use Livewire\Component;

class WorkshopDetail extends Component
{

    public Workshop $workshop;

     public function mount(Workshop $workshop)
    {
        $this->workshop = $workshop;
    }

    public function render()
    {
         return view('livewire.workshop-detail', [
            'workshop' => $this->workshop,
         ])->extends('components.layouts.app')->section('content');
    }

}
