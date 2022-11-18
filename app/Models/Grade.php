<?php

namespace App\Models;

use App\Enums\AvailableStatus;
use App\Traits\Checkcompany;
use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Grade extends Model
{
    use HasFactory;
    use Checkcompany;
    protected $fillable = ['companie_id','namegrade','status'];
    
    protected $casts = [
        'status' => AvailableStatus::class
    ];
    
    protected function namegrade(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->upper($value),
            set: fn ($value) => str()->upper(trim($value)),
        );
    }
    
    /*relation a Grade belongs to a Company*/
    public function grade()
    {
        return $this->belongsTo(Company::class);
    }
    
    /*show all active Grade the belongs to a company*/
    public static function listGrade()
    {
        return (new static)::where('companie_id', self::mycompanyid())
            ->whereNotNull('companie_id')
            ->where('status',AvailableStatus::Activo)
            ->orderBy('namegrade')
            ->get();
    }
}
