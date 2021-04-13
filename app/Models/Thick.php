<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Thick extends Model
{
    protected $fillable = ['value','status'];


    public function scopeStatus($query,$status=1)
    {
        return $query->where('status',$status);
    }

    public function options()
    {
        return $this->hasMany(Option::class);
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class,'thick','id');
    }

}
