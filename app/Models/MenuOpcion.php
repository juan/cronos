<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class MenuOpcion extends Model
{
    use HasFactory;
    
    /***Relations one Option Menu can have one sub-option menu****/
    public function menuopcionusers()
    {
        return $this->hasMany(MenuopcionUser::class);
    }
    
}
