<?php

namespace App\Classes\Settings;

use Illuminate\Support\Facades\Validator;

class confCompany {
    
    public function validData(array $arrayvalues)
    {
        return $validatedData = Validator::make(
            ['companyname' => str()->upper(trim($arrayvalues['companyname'])),
             'cuit' => trim($arrayvalues['cuit']),
             'email' => str()->upper(trim($arrayvalues['email']))
            ],
    
            ['companyname' => 'required|unique:companies,companyname',
             'cuit' => 'required|unique:companies,cuit',
             'email' => 'required|email|unique:companies,email',
            ],
    
            [ 'companyname.required' => 'Nombre de Empresa requerido',
              'companyname.unique' => 'Nombre de Empresa ya existe',
              'cuit.required' => 'CUIT de Empresa requerido',
              'cuit.unique' => 'CUIT de Empresa ya existe',
              'email.required' => 'Correo de Empresa requerido',
              'email.email' => 'Correo de Empresa ya existe',
            ],
        )->validate();
    }

}