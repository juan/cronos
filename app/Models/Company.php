<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected function companyname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->upper($value),
            set: fn ($value) => str()->upper(trim($value)),
        );
    }
    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->lower($value),
            set: fn ($value) => str()->lower(trim($value)),
        );
    }
    protected function web(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->lower($value),
            set: fn ($value) => str()->lower(trim($value)),
        );
    }
    protected function cuit(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => trim($value),
        );
    }
    
    protected $fillable=['companyname','cuit','address',
                         'number','phone','zipcode','email',
                         'web'];
    
    /*relation a Company can have multiple sectors*/
    public function sectors()
    {
        return $this->hasMany(Sector::class);
    }
}
