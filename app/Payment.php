<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Payment extends Model
{
    public $table = 'payments';
    protected $primaryKey = 'id';
    public $fillable = [
        'product_id',
        'product_name',
        'order_id',
        'delivered_by',
        'payment_method',
        'product_price',
        'delivery_fee',
        'total_amount',
        'confirmed_by',
        'cash_received'
    ];
}
