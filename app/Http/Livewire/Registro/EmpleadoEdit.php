<?php

namespace App\Http\Livewire\Registro;
use App\Classes\Settings\confEmpleado;
use App\Enums\AvailableStatus;
use App\Models\Grade;
use App\Models\Sector;
use App\Models\User;
use App\Traits\Checkcompany;
use App\Traits\SaveLogs;
use Livewire\Component;
use Livewire\WithFileUploads;

class EmpleadoEdit extends Component {
    use WithFileUploads;
    use SaveLogs;
    use Checkcompany;
    
    /*Attributes*/
    public $listsector, $listgrade;
    public $user;
    public $name, $email, $password, $password_confirmation, $companie_id,
        $sector_id, $grade_id, $lastname, $dni, $resposablearea,
        $cuil, $address, $phone, $datebirth, $numberlegajo,
        $datecompany, $status, $profile_photo_path, $userid;
   public $appformstatus;
    /*Attributes for confEmpleado class*/
    private confEmpleado $confEmpleado;
    
    /*Attributes for message*/
    public $showmesagge = false;
    public $statusmeesage, $mesagge;
    
    /*Attributes for estatus in App using Enums*/
    public function mount($id)
    {
        $this->userid = $id;
        $this->user = User::find($id);
        $this->name = $this->user->name;
        $this->lastname = $this->user->lastname;
        $this->dni = $this->user->dni;
        $this->cuil = $this->user->cuil;
        $this->email = $this->user->email;
        $this->address = $this->user->address;
        $this->datebirth = $this->user->datebirth;
        $this->phone = $this->user->phone;
        $this->grade_id = $this->user->grade_id;
        $this->sector_id = $this->user->sector_id;
        $this->resposablearea = $this->user->resposablearea;
        $this->datecompany = $this->user->datecompany;
        $this->numberlegajo = $this->user->numberlegajo;
        $this->profile_photo_path =  $this->user->profile_photo_path;
        $this->status=$this->user->status;
    }
    
    /*Load confEmpleado class for checkin funcions in user*/
    public function boot(confEmpleado $confEmpleado)
    {
        $this->confEmpleado = $confEmpleado;
    }
    
    public function render()
    {
        $this->appformstatus=AvailableStatus::cases();
       
        $this->listgrade = Grade::listGrade();
        $this->listsector = Sector::listSector();
        return view('livewire.registro.empleado-edit');
    }
    
    /*Edit an existing User*/
    public function edituserData()
    {
        $this->confEmpleado->validDataedit($this->all());
        $name = $this->user->name . ' ' . $this->user->lastname;
        $useredit = $this->confEmpleado->saveedituser($this->all());
        if ($useredit) {
            if (gettype($this->profile_photo_path) !== 'string') {
              $this->user->profile_photo_path = $this->profile_photo_path ?
              $this->profile_photo_path->store("/public/usersfile/$this->userid") : null;
              $this->user->save();
            }
            $this->showmesagge = true;
            $this->statusmeesage = 'ok';
            $this->mesagge = 'actualización exitosa !';
            $mesaggelog = "se ha actualizado exitosamente el usuario $name";
            $this->resetErrorBag();
        } else {
            $this->showmesagge = true;
            $this->statusmeesage = 'cancel';
            $this->mesagge = 'error en actualización !';
            $mesaggelog = "error en actualización del usuario $name";
        }
        $querytype = 'UPDATE';
        $this->saveActivityInfo($mesaggelog, $querytype, $this->user);
       
    }
    
    /*Clear all inpunts form the form*/
    public function cleanform()
    {
        $this->mount($this->user->id);
        $this->render();
    }
    
}
