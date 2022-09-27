<?php

namespace App\Http\Livewire\Registro;

use Illuminate\Support\Facades\Validator;
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
        $this->listsector = Sector::where('companie_id',$this->checkssesioncompany())
            ->orderBy('namesector')
            ->get(['id','namesector','status']);
      
        return view('livewire.registro.sectorregistro');
    }
    
    public function viewcompany()
    {
      if($this->checkssesioncompany()){
          $this->estatuswindow=true;
      }else{
          $this->emit('openModal', "message.message-modal",
              ['menssage' => 'Por favor seleccione una empresa', 'typemessage' => 'warning'] );
      }
    }
    
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
            
            ['namesector' => 'required|unique:sectors,namesector'
            ],
            
            [ 'namesector.required' => 'campo requerido',
              'namesector.unique' => 'Sector ya existe'
            ],
        )->validate();
    }
    
    public function companySelected()
    {
        $this->render();
    }
}
