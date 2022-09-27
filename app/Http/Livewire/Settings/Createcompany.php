<?php

namespace App\Http\Livewire\Settings;


use Illuminate\Support\Facades\Validator;
use Livewire\Component;
use App\Models\Company;


class Createcompany extends Component
{
   public $companyname, $cuit, $address, $number,
          $phone, $zipcode, $email, $web;
    
   public $showmesagge= false;
   public $status, $mesagge;
   
    public function render()
    {
        return view('livewire.settings.createcompany');
    }
    
    /*Clean all inputs form*/
    public function cleanform()
    {
        $this->reset();
        $this->resetErrorBag();
    }
    
    /*Save new Company*/
    public function savecompany()
    {
       $this->prepareData();
       $savecompany = Company::create($this->all());
       if($savecompany){
           $this->showmesagge=true;
           $this->status='ok';
           $this->mesagge="registro exitoso !";
           $this->resetErrorBag();
       }else{
           $this->showmesagge = true;
           $this->status = 'cancel';
           $this->mesagge = 'error en registro !';
       }
       
    }
    
    /*Validate Data before create*/
    protected function prepareData()
    {
       
        $validatedData = Validator::make(
            ['companyname' => str()->upper(trim($this->companyname)),
             'cuit' => trim($this->cuit),
             'email' => str()->lower(trim($this->email)),
             'address'  => $this->address,
             'number'   => $this->number,
             'phone'    => $this->phone
            ],
          
            ['companyname' => 'required|unique:companies,companyname',
             'cuit' => 'required|unique:companies,cuit|regex:/^[\d]*$/',
             'email' => 'required|email|unique:companies,email',
             'address'  => 'required',
             'number'   => 'required',
             'phone'    => 'sometimes|regex:/^[0-9-.]*$/',
            ],
            
            [ 'companyname.required' => 'campo requerido',
              'companyname.unique' => 'Nombre de Empresa ya existe',
              'cuit.required' => 'campo requerido',
              'cuit.unique' => 'CUIT de Empresa ya existe',
              'cuit.regex' => 'CUIT solo numerico, sin puntos',
              'address.required' => 'campo requerido',
              'number.required' => 'campo requerido',
              'email.required' => 'campo requerido',
              'email.unique' => 'Correo de Empresa ya existe',
              'email.email' => 'campo no valido',
              'phone.regex' => 'campo no valido'
            ],
        )->validate();
    }
}
