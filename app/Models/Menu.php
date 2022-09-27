<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    use HasFactory;
    /*Relations one item Menu can have multiple options*/
    public function menuopcions()
    {
        return $this->hasMany(MenuOpcion::class)->orderBy('numcolum');
        
    }
    
}
