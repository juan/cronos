<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    use HasFactory;
    
    protected $fillable=[
        'user_id','ip','query_type','form_name','method','http_estatus',
        'message','duration_ms'
    ];

}
