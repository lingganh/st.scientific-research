<?php

namespace App\Livewire;

use Livewire\Component;
use App\Models\Product;
use App\Models\Category;
use Livewire\WithoutUrlPagination;
use Livewire\WithPagination;
use Livewire\Attributes\On;
class Products extends Component
{
    use WithPagination, WithoutUrlPagination;
    public $search = '';
    public $selectedCategory = '';
//    public $minPrice = '';
//    public $maxPrice = '';
    public $sortOrder = 'default';
    public int $perPage = 9;

    #[On('per-page-updated')]
    public function updatePerpage(int $perPage){
        if (in_array($perPage, [6, 8, 9, 12, 15])) {
            $this->perPage = $perPage;
            $this->resetPage();
        }
    }
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
 //  dd($this->perPage);

        $allProduct = $products->with('categories')->paginate($this->perPage);

        return view('livewire.products', [
            'allProduct' => $allProduct,
            'categories' => $categories,
        ])->extends('components.layouts.app')->section('content');
    }
}
