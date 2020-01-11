<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\DeliveryModel;
use App\SparePartsModel;
use App\SparePartsOrderModel;

class DeliveryModel extends Model
{
    public $table = 'deliveries';
    protected $primaryKey = 'id';
    public $fillable = [
        'product_id',
        'order_id',
        'delivery_by',
        'created_at',
        'updated_at',
        'payment_method',
        'delivery_date',
        'description',
        'delivery_fee'
    ];

     public function SpareParts()
    {
        return $this->belongsTo('App\SparePartsModel', 'product_id');
    }

    public function SparePartsOrder()
    {
        return $this->belongsTo('App\SparePartsOrderModel' , 'order_id');
    }
}
