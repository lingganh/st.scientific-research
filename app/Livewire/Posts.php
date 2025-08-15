<?php

namespace App\Livewire;

use App\Models\Post;
use Livewire\Component;
use Livewire\WithPagination;

class Posts extends Component
{
    use WithPagination;

    public string $search = '';

    public function render()
    {
        $posts = Post::query()
            ->where('title', 'like', '%' . $this->search . '%')
            ->orderBy('created_at', 'desc')
            ->paginate(9);

        return view('livewire.posts', [
            'posts' => $posts,
        ])->extends('components.layouts.app')->section('content');
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }
}
