<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Approval extends Model
{
    protected $guarded = [];
    public $timestamps = false;

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function scopeApproved(Builder $query)
    {
        return $query->whereNotNull('approved_at');
    }

    public function scopePending(Builder $query)
    {
        return $query->whereNull('approved_at');
    }
}
