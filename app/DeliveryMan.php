<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class DeliveryMan extends Model
{
    public $table = 'deliverymen';
    protected $primaryKey = 'id';
    public $fillable = [
        'name',
        'phone',
        'address',
        'image',
        'national_id',
    ];
	
	public function due()
	{
		return $this->belongsTo('App\Order');
	}
}
