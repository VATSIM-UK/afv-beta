<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * Allow all attributes to be mass assigned.
     *
     * @var array
     */
    protected $guarded = [];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'remember_token',
    ];

    public function approval()
    {
        return $this->hasOne(Approval::class);
    }

    public function getHasRequestAttribute()
    {
        return ! is_null($this->approval);
    }

    public function getFullNameAttribute()
    {
        try{
            return $this->name_first.' '.$this->name_last;
        } catch (Exception $e){
            return "Unknown";
        }
    }

    public function getApprovedAttribute()
    {
        return optional($this->approval()->first())->approved;
    }

    public function getPendingAttribute()
    {
        return $this->has_request && ! $this->approved;
    }
}
