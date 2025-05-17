<?php

namespace App\Livewire;

use App\Models\Award;
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
    public function mount()
    {
        $this->workshop = Workshop::all();
        $this->texts = Text::all();
        $this->posts = Post::all();
        $this->awards = Award::with('product')->get();
        $this->product = Product::find('product_id');
    }
    public function render()
    {
        return view('livewire.home')->extends('components.layouts.app')->section('content');
    }
}
