<?php

namespace App\Models;

use App\Enums\AvailableStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sector extends Model
{
    protected $fillable = ['companie_id','namesector','status'];
    
    protected $casts = [
        'status' => AvailableStatus::class
    ];
    
    protected function namesector(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->upper($value),
            set: fn ($value) => str()->upper(trim($value)),
        );
    }
    
    /*relation a Sector belongs to a Company*/
     public function company()
    {
        return $this->belongsTo(Company::class);
    }
}
