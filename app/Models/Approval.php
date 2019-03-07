<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

class Approval extends Model
{
    protected $guarded = [];
    public $timestamps = false;
    protected $dates = ['approved_at' => 'timestamp'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function setAsApproved()
    {
        $this->approved_at = now();
        $this->save();

        return $this;
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
