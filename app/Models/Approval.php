<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Approval extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
