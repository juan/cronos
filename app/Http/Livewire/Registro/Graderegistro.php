<?php

namespace App\Http\Livewire\Registro;

use App\Traits\Checkcompany;
use App\Traits\SaveLogs;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Grade;

class Graderegistro extends Component
{
    use Checkcompany;
    use SaveLogs;
    
    public $estatuswindow = false;
    public $namegrade;
    public $listgrade;
    public $showmesagge = false;
    public $status, $mesagge;
    
    protected $listeners = ['companySelected'];
    
    
    public function render()
    {
        $this->namegrade='';
        if($this->checkssesioncompany()>=1) {
            $this->listgrade = Grade::listGrade();
        }else{
            $this->listgrade =[];
        }
        return view('livewire.registro.graderegistro');
    }
    
    /*Check if a company is selected*/
    public function viewcompany()
    {
        if ($this->checkssesioncompany()>=1) {
            $this->estatuswindow = true;
        } else {
            $this->emit('openModal', 'message.message-modal',
                ['menssage' => 'Por favor seleccione una empresa', 'typemessage' => 'warning']);
        }
    }
    
    /*Save a New Grade*/
    public function savecargo()
    {
        $this->prepareData();
        $gradesave = Grade::create(['namegrade'  => $this->namegrade,
                                      'companie_id' => $this->checkssesioncompany()]);
    
        if ($gradesave) {
            $this->showmesagge = true;
            $this->status = 'ok';
            $this->mesagge = 'registro exitoso !';
            $mesaggelog = "se ha registrado exitosamente el cargo $this->namegrade";
            $this->resetErrorBag();
        } else {
            $this->showmesagge = true;
            $this->status = 'cancel';
            $this->mesagge = 'error en registro !';
            $mesaggelog = "error en registro del cargo $this->namegrade";
        }
        $querytype = 'INSERT';
        $this->saveActivityInfo($mesaggelog, $querytype, $gradesave);
    }
    
    /*Validate Data before create*/
    protected function prepareData()
    {
        
        $validatedData = Validator::make(
            ['namegrade' => str()->upper(trim($this->namegrade))
            ],
            
            ['namegrade' => ['required',Rule::unique('grades')->
                where('companie_id', $this->checkssesioncompany()) ]
            ],
            
            [ 'namegrade.required' => 'campo requerido',
              'namegrade.unique' => 'Cargo ya existe'
            ],
        )->validate();
    }
    
    /*Clean all inputs form*/
    public function cleanform(){
        $this->reset();
        $this->resetErrorBag();
    }
    
    /*Render componente when listener get an event CompanySelected*/
    public function companySelected()
    {
        $this->render();
    }
}
