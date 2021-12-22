<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class District extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'province_id'
    ];

}
