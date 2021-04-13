<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class ContactForm extends Model
{
    protected $guarded = [];

   //protected $dateFormat = 'datetime:d-m-Y';

    protected $casts = [
        'log' => 'array',
    ];

    public function getCreatedAtAttribute($date)
    {
        return Carbon::make($date)->diffForHumans();
    }

    public function scopeStatus($query, $status = 1)
    {
        return $query->where('status', $status);
    }

    public function scopeType($query, $type = 1)
    {
        return $query->where('type', $type);
    }

    public function typeName()
    {
        return $this->attributes['type'] == 1 ? 'İletişim Formu' : 'E-Bülten Formu';
    }

    public function format()
    {
        return ['name' => $this->attributes['name'],
            'type' => $this->attributes['type'],
            'type_name' => $this->typeName($this->attributes['type']),
            'email' => $this->attributes['email'],
            'message' => $this->attributes['message'],
            'status' => $this->attributes['status'],
            'log' => $this->attributes['log']
        ];
    }


}
