<?php

namespace App\Models;

use App\Enums\AvailableStatus;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Traits\Checkcompany;

class Document extends Model
{
    use HasFactory;
    use Checkcompany;
    protected $fillable = ['companie_id','namedocument','descripcion','status'];
    
    protected $casts = [
        'status' => AvailableStatus::class
    ];
    
    protected function namedocument(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->upper($value),
            set: fn ($value) => str()->upper(trim($value)),
        );
    }
    
    protected function descripcion(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str()->ucfirst(strtolower(trim($value))),
        );
    }
    
    /*show all active Documents the belongs to a company*/
    public static function listDocument()
    {
        return (new static)::where('companie_id', self::mycompanyid())
            ->whereNotNull('companie_id')
            ->where('status',AvailableStatus::Activo)
            ->orderBy('namedocument')
            ->get();
    }
}
