<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Currency extends Model
{
    protected $guarded = [];

    public function scopeOrder($query,$order = 'desc')
    {
        return $query->orderBy('order',$order);
    }

    public function scopeStatus($query,$status=1)
    {
        return $query->where('status',$status);
    }

    public function products()
    {
        return $this->hasMany(Product::class);
    }
}
