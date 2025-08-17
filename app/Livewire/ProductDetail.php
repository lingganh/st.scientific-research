<?php

namespace App\Livewire;

use Darryldecode\Cart\Facades\CartFacade as Cart;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\Product;
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
    public function addToCart()
    {
        if (!Auth::check()) {
             session()->flash('error', 'Vui lòng đăng nhập để thêm sản phẩm!');

             return redirect()->route('login');
        }

        $p = $this->product;
        Cart::session(Auth::id())->add([
            'id'       => $p->id,
            'name'     => $p->name ?? ('Product '.$p->id),
            'price'    => (float)($p->price ?? 0),
            'quantity' => 1,
            'attributes' => [],
            'associatedModel' => $p,
        ]);
        // test
        session()->flash('success', ' thêm sp thành công ');
        return redirect()->route('product');


    }


    public function render()
    {
        return view('livewire.product-detail', [
            'product' => $this->product,
        ])->extends('components.layouts.app')
        ->section('content');
    }
}
