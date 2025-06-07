<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;

class Products extends Component
{
     public $search = '';
    public $selectedCategory = '';
//    public $minPrice = '';
//    public $maxPrice = '';
    public $sortOrder = 'default';



    public function render()
    {
         $categories = Category::all();

         $products = Product::query();

         if ($this->search) {
            $products->where('name', 'like', '%' . $this->search . '%');
        }

         if ($this->selectedCategory) {

            $products->where('idDM', $this->selectedCategory);


        }

//        if (is_numeric($this->minPrice) && $this->minPrice !== '') {
//            $products->where('price', '>=', $this->minPrice);
//        }
//        if (is_numeric($this->maxPrice) && $this->maxPrice !== '') {
//            $products->where('price', '<=', $this->maxPrice);
//        }

         if ($this->sortOrder === 'price_asc') {
            $products->orderBy('price', 'asc');
        } elseif ($this->sortOrder === 'price_desc') {
            $products->orderBy('price', 'desc');
        } else {
            $products->orderBy('created_at', 'desc');
        }

         $allProduct = $products->with('categories')->get();

        return view('livewire.products', [
            'allProduct' => $allProduct,
            'categories' => $categories,
        ])->extends('components.layouts.app')->section('content');
    }
}
