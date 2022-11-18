<?php

namespace App\Http\Livewire\Registro;

use App\Models\User;
use LivewireUI\Modal\ModalComponent;

class EmpleadoData extends ModalComponent
{
    public  $user;
    
    public function mount(User $user)
    {
        $this->user = $user;
       
        
    }
    public function render()
    {
    
        return view('livewire.registro.empleado-data');
    }
    public static function modalMaxWidth(): string
    {
        return 'lg';
    }
}
