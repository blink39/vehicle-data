<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class MasterBrand extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $table = 'master_brand';

    protected $fillable = [
        'master_vehicle_id',
        'name',
        'parent_id'
    ];
    
    public $timestamps = false;
}
