<?php

namespace App\Models;

use App\Enums\AvailableStatus;
use Carbon\Carbon;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Database\Eloquent\Casts\Attribute;
use App\Traits\Checkcompany;

class User extends Authenticatable implements MustVerifyEmail
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use Checkcompany;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name', 'email','password','resposablearea',
        'companie_id','sector_id','grade_id',
        'lastname','dni','cuil','address',
        'phone','datebirth','numberlegajo',
        'datecompany','status','profile_photo_path'
    ];
    
    /**Accessors & Mutators Attributes**/
    protected function email(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->lower($value),
            set: fn ($value) => str()->lower(trim($value)),
        );
    }
    protected function name(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->upper($value),
            set: fn ($value) => str()->upper(trim($value)),
        );
    }
    protected function lastname(): Attribute
    {
        return Attribute::make(
            get: fn ($value) => str()->upper($value),
            set: fn ($value) => str()->upper(trim($value)),
        );
    }
    protected function dni(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str()->squish($value),
        );
    }
    protected function cuil(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => str()->squish($value),
        );
    }
    protected function datebirth(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  is_null($value) ? '' :  date('d/m/Y', strtotime($value)),
            set: fn ($value) => str()->squish($value),
        );
    }
    protected function datecompany(): Attribute
    {
        return Attribute::make(
            get: fn ($value) =>  is_null($value) ? '' :  date('d/m/Y', strtotime($value)),
            set: fn ($value) => str()->squish($value),
        );
    }
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn ($value) => Hash::make($value),
        );
    }
    /**End Accessors & Mutators Attributes**/
    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'status' => AvailableStatus::class
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */
    protected $appends = [
        'profile_photo_url',
    ];
    
    /*******A user have many menus*******/
    public function menuopcionusers()
    {
        return $this->hasManyThrough(MenuopcionUser::class, MenuOpcion::class);
    }
    
    /*******A user belongs to sector*******/
    public function sector()
    {
        return $this->belongsTo(Sector::class);
    }
    
    /*******A user belongs to grade*******/
    public function grade()
    {
        return $this->belongsTo(Grade::class);
    }
    
    /*******A user belongs to company*******/
    public function companie()
    {
        return $this->belongsTo(Company::class);
    }
    
    /************List of all user using Pagination*************/
    public static function listUser($search,$columnane)
    {
       if(self::mycompanyid()>=1){
        return (new static)::where('companie_id', self::mycompanyid())
            ->whereNotNull('companie_id')
            ->orderBy('name','asc')
            ->when($search ?? false, function ($query) use ($search,$columnane) {
                $query->where($columnane, 'LIKE', '%'. strtoupper($search).'%');
            })
            ->paginate(20);
       }else{
           return [];
       }
    }//end listUser
    
    
    
}
