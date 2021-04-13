<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class OrderItem extends Model
{
    protected $table = 'order_items';

    protected $guarded = [];

    public function order()
    {
        return $this->belongsTo(Order::class,'order_id','id');
    }

    public function color()
    {
        return $this->belongsTo(Color::class);
    }

    public function thick()
    {
        return $this->belongsTo(Thick::class,'thick','id');
    }

    public function product()
    {
        return $this->belongsTo(Product::class);
    }


}
