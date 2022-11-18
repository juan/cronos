<?php

namespace App\Http\Livewire\Publicacion;
use App\Models\Document;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Livewire\Component;
use App\Traits\Checkcompany;
use App\Traits\SaveLogs;
class GestionPublic extends Component
{
    use Checkcompany;
    use SaveLogs;
    /*Attributes*/
    public  $namedocument,$descripcion;
    public $listdocuments;
    public $estatuswindow = false;
    /*Attributes for message*/
    public $showmesagge= false;
    public $status, $mesagge;
    
    protected $listeners = ['companySelected'];
    
    public function render()
    {
        if($this->checkssesioncompany()>=1) {
            $this->listdocuments = Document::listDocument();
        }else{
            $this->listdocuments =[];
        }
        return view('livewire.publicacion.gestion-public');
    }
    
    /*Render componente when listener get an event CompanySelected*/
    public function companySelected()
    {
        $this->render();
    }
    
    /*Check if a company is selected*/
    public function createFile()
    {
        if ($this->checkssesioncompany()>=1) {
            $this->reset();
            $this->estatuswindow = true;
           
        } else {
            $this->emit('openModal', 'message.message-modal',
                ['menssage' => 'Por favor seleccione una empresa', 'typemessage' => 'warning']);
        }
    }
    /*Clean all inputs form*/
    public function cleanform()
    {
        $this->reset();
        $this->resetErrorBag();
    }
    /*Create a NEW file for documents*/
    public function saveFile()
    {
        $this->prepareData();
        $filesave = Document::create([ 'namedocument' =>$this->namedocument,
                                       'descripcion' => $this->descripcion,
                                       'companie_id' => $this->checkssesioncompany()]);
        if ($filesave) {
            $this->showmesagge = true;
            $this->status = 'ok';
            $this->mesagge = 'registro exitoso !';
            $mesaggelog = "se ha registrado exitosamente el archivo $this->namedocument";
            $this->estatuswindow = false;
        } else {
            $this->showmesagge = true;
            $this->status = 'cancel';
            $this->mesagge = 'error en registro !';
            $mesaggelog = "error en registro de archivo $this->namedocument";
        }
        $querytype = 'INSERT';
        $this->saveActivityInfo($mesaggelog, $querytype, $filesave);
    }
    
    /*Validate Data before create*/
    protected function prepareData()
    {
        
        $validatedData = Validator::make(
            ['namedocument' => str()->upper(trim($this->namedocument))],
            
            ['namedocument' => [Rule::unique('documents')->
                    where('companie_id', $this->checkssesioncompany()),'required']
            ],
            
            [ 'namedocument.required' => 'campo requerido',
              'namedocument.unique' => 'Sector ya existe'
            ],
        )->validate();
    }
}
