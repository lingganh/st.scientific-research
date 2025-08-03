<?php

namespace App\Livewire;

use Livewire\Component;
use Livewire\Attributes\On;

class TestPagination extends Component
{
    public int $perPage = 0;

    #[On('test-event')]
    public function updateTest( $perPage)
    {   $this->perPage= $perPage;
        // Dừng chương trình ngay khi nhận được sự kiện
        dd('COMPONENT TEST ĐÃ NHẬN EVENT!', $perPage);


    }

    public function render()
    {
        return view('livewire.test-pagination')->extends('components.layouts.app')->section('content');
    }
}
