<?php

namespace App\Classes\Settings;


use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;
use Illuminate\Validation\Rules\Password;
use App\Models\User;
use App\Traits\Checkcompany;
use Laravel\Fortify\Http\Controllers\RegisteredUserController;

class confEmpleado extends RegisteredUserController {
    use Checkcompany;
    public function validData(array $arrayuser)
    {
       
       return $validatedData = Validator::make(
           ['name' => str()->upper(trim($arrayuser['name'])),
            'email' => str()->lower(trim($arrayuser['email'])),
            'sector_id' => $arrayuser['sector_id'],
            'grade_id' => $arrayuser['grade_id'],
            'lastname' => str()->upper(trim($arrayuser['lastname'])),
            'dni' => trim($arrayuser['dni']),
            'cuil' => trim($arrayuser['cuil']),
            'address'  => $arrayuser['address'],
            'phone'    => $arrayuser['phone'],
            'datebirth'    => $arrayuser['datebirth'],
            'numberlegajo' => trim($arrayuser['numberlegajo']),
            'datecompany'    => $arrayuser['datebirth'],
            'profile_photo_path'    => $arrayuser['profile_photo_path'],
            'password' => str()->squish($arrayuser['password']),
            'password_confirmation' => str()->squish($arrayuser['password_confirmation']),
           ],
    
           ['name' => 'required|min:3',
            'email' => 'required|email|unique:users,email',
            'sector_id' => 'sometimes',
            'grade_id' =>  'sometimes',
            'lastname' => 'required|min:3',
            'dni' => 'required|unique:users,dni|regex:/^[\d]*$/',
            'cuil' => 'required|unique:users,cuil|regex:/^[\d]*$/',
            'address'  => 'required',
            'phone'    => 'sometimes|nullable|regex:/^[0-9-.]*$/',
            'datebirth'    => 'required|date_format:d/m/Y',
            'numberlegajo' => 'required|min:1|unique:users,numberlegajo',
            'datecompany'    => 'required|date_format:d/m/Y',
            'profile_photo_path'    => 'sometimes|nullable|image|mimes:jpg,png,jpeg,svg|max:1500',
            'password' => [
                'required',
                Password::min(9) // Debe tener por lo menos 9 caracteres
                ->mixedCase() // Debe tener mayúsculas + minúsculas
                ->letters() // Debe incluir letras
                ->numbers(),
                'confirmed'
            ],
           ],
    
           [ 'name.required' => 'campo requerido',
             'name.min' => 'campo debe ser mayor a 3 caracteres',
             'email.required' => 'campo requerido',
             'email.unique' => 'campo ya existe',
             'email.email' => 'campo no valido',
             'lastname.required' => 'campo requerido',
             'lastname.min' => 'campo debe ser mayor a 3 caracteres',
             'dni.required' => 'campo requerido',
             'dni.unique' => 'campo ya existe',
             'dni.regex' => 'campo solo numerico, sin puntos',
             'cuil.required' => 'campo requerido',
             'cuil.unique' => 'campo ya existe',
             'cuil.regex' => 'campo solo numerico, sin puntos',
             'address.required' => 'campo requerido',
             'phone.regex' => 'campo no valido',
             'datebirth.required'    => 'campo requerido',
             'datebirth.date_format'    => 'formato no valido',
             'numberlegajo.required' => 'campo requerido',
             'numberlegajo.unique' => 'campo ya existe',
             'numberlegajo.min' => 'campo debe ser mayor a 1 caracter',
             'datecompany.required'    => 'campo requerido',
             'datecompany.date_format'    => 'formato no valido',
             'profile_photo_path.image' => 'archivo no valido. (permitidos jpg,png,jpeg)',
             'profile_photo_path.mimes' => 'archivo no valido. (permitidos jpg,png,jpeg)',
             'profile_photo_path.max' => 'archivo excede. (1.5MB)',
             'profile_photo_path.uploaded' => 'archivo no valido. (permitidos jpg,png,jpeg)',
             'password.required' => 'campo requerido',
             'password.min' => 'campo debe ser mayor a 9 caracteres',
             'password.confirmed' => 'confirmación de contraseña incorrecta',
           ],
       )->validate();
    }//End of validate a new user
    
    public function saveEmpleado(array $arrayuser)
    {
      
        return
            User::create([
                'companie_id' => $this->checkssesioncompany(),
                'name' => $arrayuser['name'],
                'lastname' => $arrayuser['lastname'],
                'dni' => $arrayuser['dni'],
                'cuil' => $arrayuser['cuil'],
                'email' => $arrayuser['email'],
                'address' => $arrayuser['address'],
                'datebirth' => $arrayuser['datebirth'],
                'phone' => $arrayuser['phone'],
                'sector_id'=> $arrayuser['sector_id']? $arrayuser['sector_id'] : null,
                'grade_id' => $arrayuser['grade_id']? $arrayuser['grade_id'] : null,
                'datecompany' => $arrayuser['datecompany'],
                'numberlegajo' => $arrayuser['numberlegajo'],
                'resposablearea' => $arrayuser['resposablearea'],
                'password' => $arrayuser['password']
            ]);
    }//End of create a new user
    
    public function validDataedit(array $arrayuser)
    {
       $typeof= gettype($arrayuser['profile_photo_path']);
       if($typeof==="string"){
           $arrayuser['profile_photo_path']= null;
          
       }
       
        return $validatedData = Validator::make(
            ['name' => str()->upper(trim($arrayuser['name'])),
             'email' => str()->lower(trim($arrayuser['email'])),
             'sector_id' => $arrayuser['sector_id'],
             'grade_id' => $arrayuser['grade_id'],
             'lastname' => str()->upper(trim($arrayuser['lastname'])),
             'dni' => trim($arrayuser['dni']),
             'cuil' => trim($arrayuser['cuil']),
             'address'  => $arrayuser['address'],
             'phone'    => $arrayuser['phone'],
             'datebirth'    => $arrayuser['datebirth'],
             'numberlegajo' => trim($arrayuser['numberlegajo']),
             'datecompany'    => $arrayuser['datebirth'],
             'profile_photo_path'    => $arrayuser['profile_photo_path'],
            ],
            
            ['name' => 'required|min:3',
             'email' => ['required',
                         Rule::unique('users','email')->ignore($arrayuser['user']->id)],
             'sector_id' => 'sometimes',
             'grade_id' =>  'sometimes',
             'lastname' => 'required|min:3',
             'dni' => ['required',
                       Rule::unique('users','dni')->ignore($arrayuser['user']->id),
                       'regex:/^[\d]*$/'
                     ] ,
             'cuil' => ['required',
                        Rule::unique('users','cuil')->ignore($arrayuser['user']->id),
                        'regex:/^[\d]*$/'
                       ],
             'address'  => 'required',
             'phone'    => 'sometimes|nullable|regex:/^[0-9-.]*$/',
             'datebirth'    => 'required|date_format:d/m/Y',
             'numberlegajo' => ['required',
                                Rule::unique('users','numberlegajo')->ignore($arrayuser['user']->id),
                                'min:1'
                 ],
             'datecompany'    => 'required|date_format:d/m/Y',
             'profile_photo_path'    => 'sometimes|nullable|file|mimes:jpg,png,jpeg,svg|max:1500',
            ],
            
            [ 'name.required' => 'campo requerido',
              'name.min' => 'campo debe ser mayor a 3 caracteres',
              'email.required' => 'campo requerido',
              'email.unique' => 'campo ya existe',
              'email.email' => 'campo no valido',
              'lastname.required' => 'campo requerido',
              'lastname.min' => 'campo debe ser mayor a 3 caracteres',
              'dni.required' => 'campo requerido',
              'dni.unique' => 'campo ya existe',
              'dni.regex' => 'campo solo numerico, sin puntos',
              'cuil.required' => 'campo requerido',
              'cuil.unique' => 'campo ya existe',
              'cuil.regex' => 'campo solo numerico, sin puntos',
              'address.required' => 'campo requerido',
              'phone.regex' => 'campo no valido',
              'datebirth.required'    => 'campo requerido',
              'datebirth.date_format'    => 'formato no valido',
              'numberlegajo.required' => 'campo requerido',
              'numberlegajo.unique' => 'campo ya existe',
              'numberlegajo.min' => 'campo debe ser mayor a 1 caracter',
              'datecompany.required'    => 'campo requerido',
              'datecompany.date_format'    => 'formato no valido',
              'profile_photo_path.file' => 'archivo no valido. (permitidos jpg,png,jpeg)',
              'profile_photo_path.mimes' => 'archivo no valido. (permitidos jpg,png,jpeg)',
              'profile_photo_path.max' => 'archivo excede. (1.5MB)',
            ],
        )->validate();
    }//End of validate user for edit
    
    function saveedituser(array $arrayuser){
        $arrayuser['user']->name=$arrayuser['name'];
        $arrayuser['user']->email = $arrayuser['email'];
        $arrayuser['user']->sector_id = $arrayuser['sector_id']? $arrayuser['sector_id'] : null;
        $arrayuser['user']->grade_id = $arrayuser['grade_id']? $arrayuser['grade_id'] : null;
        $arrayuser['user']->lastname = $arrayuser['lastname'];
        $arrayuser['user']->dni = $arrayuser['dni'];
        $arrayuser['user']->cuil = $arrayuser['cuil'];
        $arrayuser['user']->address = $arrayuser['address'];
        $arrayuser['user']->phone = $arrayuser['phone'];
        $arrayuser['user']->datebirth = $arrayuser['datebirth'];
        $arrayuser['user']->numberlegajo = $arrayuser['numberlegajo'];
        $arrayuser['user']->datecompany = $arrayuser['datebirth'];
        $arrayuser['user']->resposablearea = $arrayuser['resposablearea'];
        $arrayuser['user']->status = $arrayuser['status'];
        return $arrayuser['user']->save();
    }//End edit user save
}