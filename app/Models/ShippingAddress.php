<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ShippingAddress extends Model
{
    protected $fillable = [
        'user_id',
        'recipient_name',
        'phone_number',
        'province_id',
        'province_name',
        'city_id',
        'city_name',
        'address_detail',
        'postal_code',
        'is_default'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
