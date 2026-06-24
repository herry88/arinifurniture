<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    protected $fillable = [
        'user_id', 'shipping_address_id', 'invoice_number', 
        'total_price', 'shipping_cost', 'grand_total', 
        'courier', 'courier_service', 'receipt_number', 
        'order_status', 'payment_status', 'payment_type', 'payment_url'
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }

    public function shippingAddress()
    {
        return $this->belongsTo(ShippingAddress::class);
    }

    /**
     * Accessor: alias shipping_cost as shipping_price for view compatibility.
     */
    public function getShippingPriceAttribute()
    {
        return $this->shipping_cost;
    }
}
