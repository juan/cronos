<?php

namespace App\Http\Livewire\Settings;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use App\Models\User;

class Profile extends Component
{
    public $name;
    public function render()
    {
        $user = User::find(Auth::id());
        $this->name=$user->name;
        return view('livewire.settings.profile')->extends('dashboard');
    }
}
