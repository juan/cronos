<?php

namespace App\Http\Livewire\Registro;
use App\Classes\Settings\confEmpleado;
use App\Events\Welcomeapp;
use Livewire\Component;
use App\Models\Grade;
use App\Models\Sector;
use Livewire\WithFileUploads;
use App\Traits\SaveLogs;
use App\Traits\Checkcompany;
use Spatie\LivewireWizard\Support\State;

class Empleado extends Component
{
    use WithFileUploads;
    use SaveLogs;
    use Checkcompany;
    /**listener**/
    protected $listeners = ['companySelected'];
    
    /*Attributes*/
    public $listsector, $listgrade;
    public $name, $email,$password,$password_confirmation,$companie_id,
           $sector_id,$grade_id,$lastname,$dni,$resposablearea,
           $cuil,$address,$phone,$datebirth,$numberlegajo,
           $datecompany,$status,$profile_photo_path;
    
    /*Attributes for message*/
    public $showmesagge= false;
    public $statusmeesage, $mesagge;
    
    /*Attributes for confEmpleado class*/
    private confEmpleado $confEmpleado;
    
    /*Load confEmpleado class for checkin funcions in user*/
    public function boot(confEmpleado $confEmpleado)
    {
        $this->confEmpleado = $confEmpleado;
    }
    
    public function render()
    {
        if($this->checkssesioncompany()>=1) {
            $this->listgrade = Grade::listGrade();
            $this->listsector = Sector::listSector();
        }else{
            $this->listgrade = [];
            $this->listsector = [];
        }
        return view('livewire.registro.empleado');
    }
    
    /*render form when a Company is selected*/
    public function companySelected()
    {
        $this->render();
    }
    /*save a new User in model Class*/
    public function saveuserData()
    {
       
       //$this->dispatchBrowserEvent('banner-message',['style'=>'succes','message'=>'Saludos']);
       
        if(!$this->checkssesioncompany()>=1){
          
            $this->emit('openModal', 'message.message-modal',
                ['menssage' => 'Por favor seleccione una empresa', 'typemessage' => 'warning']);
        }else{
           $this->confEmpleado->validData($this->all());
           $empleado = $this->confEmpleado->saveEmpleado($this->all());
           
           if($empleado){
               $empleado->profile_photo_path = $this->profile_photo_path?
                                               $this->profile_photo_path->store("/public/usersfile/$empleado->id") : null;
               $empleado->save();
               event(new Welcomeapp($empleado));
               $this->showmesagge= true;
               $this->statusmeesage='ok';
               $this->mesagge="registro exitoso !";
               $mesaggelog ="se ha registrado exitosamente el usuario $this->name $this->lastname";
               $this->resetErrorBag();
           }else{
               $this->showmesagge = true;
               $this->statusmeesage = 'cancel';
               $this->mesagge = 'error en registro !';
               $mesaggelog ="error en registro del usuario $this->name $this->lastname";
           }
            $querytype = 'INSERT';
            $this->saveActivityInfo($mesaggelog, $querytype, $empleado);
        }
    }
    
    /*Clear all inpunts form the form*/
    public function cleanform()
    {
        $this->reset();
        $this->resetErrorBag();
    }
   
}
