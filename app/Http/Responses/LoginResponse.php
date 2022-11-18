<?php

namespace App\Http\Responses;
use App\Models\Log;
use Laravel\Fortify\Contracts\LoginResponse as FortyLogin;

class LoginResponse implements FortyLogin
{
   public function toResponse($request)
   {
       $username=auth()->user()->name;
       Log::create([
           'user_id' =>auth()->user()->id,
           'ip'=> request()->ip(),
           'query_type'=>'LOGIN',
           'form_name'=> url()->getRequest()->path(),
           'method'=> request()->method(),
           'http_estatus'=>200,
           'message'=>strtoupper("Usuario {$username} ha ingresado correctamente del sistema"),
           'duration_ms'=>request()->request->get('timequery')
       ]);
       return redirect('/dashboard');
   }
}
