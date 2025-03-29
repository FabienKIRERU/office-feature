<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Property;
use App\Models\Order;

class OrderItem extends Model {
    use HasFactory;

    protected $fillable = [
        'order_id', 
        'property_id', 
        'quantity', 
        'price_per_item'
    ];

    public function order() {
        return $this->belongsTo(Order::class);
    }

    public function property() {
        return $this->belongsTo(Property::class);
    }
}