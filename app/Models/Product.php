<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $guarded = [];


    public function scopeStatus($query,$status=1)
    {
        return $query->where('status',$status);
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class);
    }
    public function options()
    {
        return $this->hasMany(Option::class);
    }
}
