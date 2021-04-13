<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $guarded =[];

    public function scopeStatus($query,$status = 1)
    {
        return $query->where('status',$status);
    }

    public function scopeLocation($query,$location='1')
    {
        return $query->where('location',$location);
    }

    public function page()
    {
        return $this->belongsTo(Page::class);
    }

}
