<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use App\SparePartsModel;
use App\DeliveryModel;
class SparePartsOrderModel extends Model
{
    public $table = 'spare_parts_orders';
    protected $primaryKey = 'spare_parts_orders_id';
    protected $guraded = ['spare_parts_orders_id'];
    public $fillable = [
    'spare_parts_id',
    'name',
    'address',
    'phone',
    'confirmation',
    'delivery',
    ];

    public function SpareParts()
        {
         return $this->belongsTo('App\SparePartsModel', 'spare_parts_id');
        }

    public function Delivery()
       {
         return $this->hasOne('App\DeliveryModel' , 'order_id');
       }

}