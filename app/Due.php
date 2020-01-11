<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Due extends Model
{
    public $table = 'dues';
    protected $primaryKey = 'id';
    public $fillable = [
        'deliveryman_id',
        'user_id',
        'order_id',
        'due',
    ];
	
	public function deliveryMan()
	{
		return $this->hasMany('App\DeliveryMan');
	}
	public function order()
	{
		return $this->haOne('App\Order');
	}
}
