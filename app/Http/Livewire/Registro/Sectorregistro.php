<?php

namespace App\Http\Livewire\Registro;

use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Models\Sector;
use App\Traits\Checkcompany;
use App\Traits\SaveLogs;

class Sectorregistro extends Component
{
    use Checkcompany;
    use SaveLogs;
    
    public $estatuswindow = false;
    public $namesector;
    public $listsector;
    public $showmesagge = false;
    public $status, $mesagge;
    
    protected $listeners = ['companySelected'];
    
    public function render()
    {
     
        $this->namesector='';
        if($this->checkssesioncompany()>=1) {
            $this->listsector = Sector::listSector();
        }else{
            $this->listsector =[];
        }
        return view('livewire.registro.sectorregistro');
    }
    
    /*Check if a company is selected*/
    public function viewcompany()
    {
      if($this->checkssesioncompany()>=1){
          $this->cleanform();
          $this->estatuswindow=true;
      }else{
          $this->emit('openModal', "message.message-modal",
              ['menssage' => 'Por favor seleccione una empresa', 'typemessage' => 'warning'] );
      }
    }
    
    /*Save a New Sector*/
    public function savesector()
    {
        $this->prepareData();
        $sectorsave = Sector::create(['namesector'=>$this->namesector,
                                      'companie_id' =>$this->checkssesioncompany() ]);
      
        if($sectorsave){
            $this->showmesagge = true;
            $this->status = 'ok';
            $this->mesagge = 'registro exitoso !';
            $mesaggelog ="se ha registrado exitosamente el sector $this->namesector";
            $this->resetErrorBag();
        } else {
            $this->showmesagge = true;
            $this->status = 'cancel';
            $this->mesagge = 'error en registro !';
            $mesaggelog ="error en registro del sector $this->namesector";
        }
        $querytype="INSERT";
        $this->saveActivityInfo($mesaggelog,$querytype,$sectorsave);
    }
    /*Clean all inputs form*/
    public function cleanform()
    {
        $this->reset();
        $this->resetErrorBag();
    }
    
    /*Validate Data before create*/
    protected function prepareData()
    {
        
        $validatedData = Validator::make(
            ['namesector' => str()->upper(trim($this->namesector))
            ],
            
            ['namesector' => [Rule::unique('sectors')->
                              where('companie_id', $this->checkssesioncompany()),'required']
            ],
            
            [ 'namesector.required' => 'campo requerido',
              'namesector.unique' => 'Sector ya existe'
            ],
        )->validate();
    }
    /*Render componente when listener get an event CompanySelected*/
    public function companySelected()
    {
        $this->render();
    }
}
