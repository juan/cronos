<?php

namespace App\Http\Livewire\Registro;

use Livewire\Component;
use Livewire\WithPagination;
use App\Models\User;
use App\Traits\Checkcompany;
class ListaEmpleado extends Component
{
    use WithPagination;
    use Checkcompany;
    /**listener**/
    protected $listeners = ['companySelected'];
    
    /*Attributes*/
    public $listsector;
    public $search = '';
    public $opcionsearch = 'dni';
    
 
    public function companySelected()
    {
        
        $this->render();
    }
    public function updatingSearch()
    {
     
        $this->resetPage();
    }
    
    public function render()
    {
            return view('livewire.registro.lista-empleado', [
                'listusers' => User::listUser($this->search, $this->opcionsearch)
            ]);
   
    }
    
    public function EmpleadoData($id)
    {
        $this->emit('openModal', 'registro.empleado-data',
            ['user' => $id]);
    }
}
