<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Citizen extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id_card',
        'full_name',
        'dob',
        'gender',
        'native_address_id',
        'native_address',
        'permanent_address_id',
        'permanent_address',
        'temp_address_id',
        'temp_address',
        'religion',
        'edu_level',
        'occupation',
        'created_user_id',
    ];

}
