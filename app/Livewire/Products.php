<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Products extends Component
{
    public $allProduct;
    public function mount(){
        $this->allProduct = Product::with('categories')->get();

    }
    public function render()
    {
        return view('livewire.products')->extends('components.layouts.app')->section('content');;
    }
}
