<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Profile extends Model
{
    protected $guarded = [];#use

    public $timestamps = false;

    public function user()
    {
        return $this->hasOne(User::class);
    }


}
