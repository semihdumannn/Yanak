<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Option extends Model
{
    protected $guarded = [];


    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function thick()
    {
        return $this->belongsTo(Thick::class);
    }

    public function images()
    {
        return $this->morphMany(Image::class,'imageable');
    }


}
