<?php

namespace App\Traits;

trait Checkcompany {
    public function checkssesioncompany()
    {
        if(!empty(session('companyID'))){
            return session('companyID');
        }
    }
    
    public function setCompany($id)
    {
        return session(['companyID' => $id]);
    }
    
    public static function mycompanyid()
    {
        return (new class { use Checkcompany; })->checkssesioncompany();
    }
}