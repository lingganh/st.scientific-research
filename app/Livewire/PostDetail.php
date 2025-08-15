<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;

class PostDetail extends Component
{
    public Post $post;

     public function mount(Post $post)
    {
        $this->post = $post;
    }

    public function render()
    {
         return view('livewire.post-detail', [
            'post' => $this->post,
         ])->extends('components.layouts.app')->section('content');
    }
}
