<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Discord_Account extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'user_id', 'id',
    ];
}
