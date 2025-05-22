<?php

namespace App\Livewire;

use App\Models\Award;
use App\Models\Category;
use App\Models\Post;
use App\Models\Product;
use App\Models\Text;
use App\Models\Workshop;
use Livewire\Component;

class Home extends Component
{
    public $workshop;
    public $texts;
    public $posts;
    public $awards;
    public $product;
    public $category;
    public $allProduct;
    public $categories;
    public function mount()
    {
        $this->workshop = Workshop::latest()->first();
        $this->texts = Text::all();
        $this->posts = Post::all();
        $this->awards = Award::with('product')->get();
        $this->product = Product::find('product_id');
        $this->category = Category::all();
        $this->allProduct = Product::with('categories')->take(6)->get();
        $this->categories= Category::find('idDM');
    }
    public function render()
    {
        return view('livewire.home')->extends('components.layouts.app')->section('content');
    }
}
