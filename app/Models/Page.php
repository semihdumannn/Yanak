<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Page extends Model
{
    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return Carbon::make($this->attributes['created_at'])->diffForHumans();
    }

    public function scopeStatus($query,$status = 1)
    {
        return $query->where('status',$status);
    }

    public function image()
    {
        return $this->morphOne(Image::class,'imageable');
    }


}
