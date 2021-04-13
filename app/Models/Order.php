<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $guarded = [];

    public function getCreatedAtAttribute()
    {
        return Carbon::make($this->attributes['created_at'])->format('d-m-Y H:i');
    }

    public function getUpdateddAtAttribute()
    {
        return Carbon::make($this->attributes['updated_at'])->format('d-m-Y H:i');
    }

    public function items()
    {
        return $this->hasMany(OrderItem::class, 'order_id', 'id');
    }

//    public function products()
//    {
//        return $this->belongsToMany(Product::class)->withTimestamps();
//    }
}
