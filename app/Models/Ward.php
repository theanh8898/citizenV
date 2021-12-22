<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Ward extends Model
{

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'code',
        'name',
        'district_id'
    ];

}
