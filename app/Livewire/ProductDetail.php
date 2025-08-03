<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product; // Import model Product
use App\Models\Category;

class ProductDetail extends Component
{
    public $productId;
    public $product;

     public function mount($productId)
    {
        $this->productId = $productId;
        $this->loadProduct();
    }

     public function loadProduct()
    {
         $this->product = Product::with(['categories' ,'images','authors' ,'reviews'])->find($this->productId);

        if (!$this->product) {

            return redirect()->route('products');
        }
    }

    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product,
        ])->extends('components.layouts.app')
        ->section('content');
    }
}
