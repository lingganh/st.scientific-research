<?php

namespace App\Livewire;

use App\Models\Workshop;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\WithPagination;

class Workshops extends Component
{
    use WithPagination;

     public string $search = '';

    public function render()
    {
         $workshopsQuery = Workshop::query();

         if ($this->search) {
            $workshopsQuery->where('title', 'like', '%' . $this->search . '%');
        }

         $workshops = $workshopsQuery->orderBy('start_time', 'desc')->paginate(9);

        return view('livewire.workshops', [
            'workshops' => $workshops,
        ])->extends('components.layouts.app')->section('content');
    }

     public function updatingSearch()
    {
        $this->resetPage();
    }
}
