<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\SparePartsOrderModel;
use App\DeliveryModel;

class SparePartsModel extends Model
{

    public $table = 'spare_parts';
    protected $primaryKey = 'spare_parts_id';
    protected $guraded = ['spare_parts_id'];
    public $fillable = [
        'spare_parts_brand',
        'spare_parts_model',
        'spare_parts_name',
        'spare_parts_stock',
        'spare_parts_image',
        'spare_parts_price',
        'spare_parts_status',
    ];

    public function SparePartsOrder()
    {
        return $this->hasMany('App\SparePartsOrderModel');
    }

    public function Delivery()
    {
        return $this->hasOne('App\DeliveryModel');
    }


}
