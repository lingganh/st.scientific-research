<?php

namespace App\Livewire;

use App\Models\Product;
use Darryldecode\Cart\Cart;
use Livewire\Component;
use Illuminate\Support\Facades\Auth;
class CartPage extends Component
{

    public $total = 0;


    public Product $product;

    public function mount(Product $product)
    {
        $this->product = $product;
    }





    public function render()
    {
        return view('livewire.cart-page')
          ->extends('components.layouts.app')
            ->section('content');
    }
}
