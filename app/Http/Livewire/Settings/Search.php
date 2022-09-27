<?php

namespace App\Http\Livewire\Settings;

use Livewire\Component;

class Search extends Component
{
  
    public  $estatuswindow = false;
   
   
 
    public function render()
    {
        return view('livewire.settings.search')->layout('layouts.guest');
    }
  
}
