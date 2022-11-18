<?php

namespace App\Models;

use App\Enums\AvailableStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Checkcompany;

class Sector extends Model
{
   use Checkcompany;
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
    
    /*show all active Sector the belongs to a company*/
    public static function listSector()
    {
        return (new static)::where('companie_id', self::mycompanyid())
            ->whereNotNull('companie_id')
            ->where('status',AvailableStatus::Activo)
            ->orderBy('namesector')
            ->get();
    }
    
    
}
