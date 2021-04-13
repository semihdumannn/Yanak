<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Slider extends Model
{
    protected $fillable = ['name','status','order'];

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }

    public function scopeStatus($query,$status=1)
    {
        return $query->where('status',$status);
    }
}
