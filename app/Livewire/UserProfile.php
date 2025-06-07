<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;

class UserProfile extends Component
{
    use WithFileUploads;

    public $name;
    public $email;
    public $phone;
    public $dob;
    public $address;
    public $gender;
    public $bio;

    public $img;
    public $currentImg;

    public $user;

    protected $listeners = ['profileUpdated' => 'refreshProfileData'];

    public function mount()
    {
        $user = Auth::user();
        if ($user) {
            $this->user = $user;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->dob = $user->dob;
            $this->address = $user->address;
            $this->gender = $user->gender;
            $this->bio = $user->bio;
            $this->currentImg = $user->img;
        }
    }



    protected function rules()
    {
        return [
            'name' => 'required|string|max:255',
            'email' => 'required|email|max:255|unique:users,email,' . Auth::id(),
            'phone' => 'nullable|string|max:20',
            'dob' => 'nullable|date',
            'address' => 'nullable|string|max:255',
            'gender' => 'nullable|string|in:Nam,Nữ,Khác',
            'bio' => 'nullable|string|max:1000',
            'img' => 'nullable|image|max:2048',
        ];
    }


    public function updateProfile()
    {
        $this->validate();

        $user = Auth::user();

        if ($user) {
            $user->name = $this->name;
            $user->email = $this->email;
            $user->phone = $this->phone;
            $user->dob = $this->dob;
            $user->address = $this->address;
            $user->gender = $this->gender;
            $user->bio = $this->bio;

            if ($this->img) {
                if ($user->img && !str_contains($user->img, 'default_avatar.png') && !str_contains($user->img, 'fptshop.com') && Storage::disk('public')->exists(str_replace('/storage/', '', $user->img))) {
                    Storage::disk('public')->delete(str_replace('/storage/', '', $user->img));
                }
                $imagePath = $this->img->store('profile-photos', 'public');
                $user->img = '/storage/' . $imagePath;
            }

            $user->save();

             $this->reset('img');

            $this->loadUserData();

//            return redirect()->route('profile.user')->with('success', 'Chỉnh Sửa Thông Tin Thành Công ');

            $this->dispatch('profileUpdated');
            $this->user = Auth::user()->fresh();
            $this->dispatchBrowserEvent('show-success-modal');

        }
    }
    public function loadUserData()
    {
        $user = Auth::user();
        if ($user) {
            $this->user = $user;
            $this->name = $user->name;
            $this->email = $user->email;
            $this->phone = $user->phone;
            $this->dob = $user->dob;
            $this->address = $user->address;
            $this->gender = $user->gender;
            $this->bio = $user->bio;
            $this->currentImg = $user->img;
        }
    }

    public function render()
    {
        $user = Auth::user();
        return view('livewire.user-profile', compact('user'))->extends('components.layouts.app')->section('content');
    }

}
