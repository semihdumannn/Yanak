<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $guarded = [];

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }


}
