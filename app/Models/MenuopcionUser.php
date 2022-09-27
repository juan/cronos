<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuopcionUser extends Model
{
    use HasFactory;
    
    /***Relations one Sub-Option Menu Belongs to Option menu****/
    public function menuopcion()
    {
        return $this->belongsTo(MenuOpcion::class);
    }
    
}
