<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CarBrandModel extends Model
{
    public $table = 'car_brands';
    protected $primaryKey = 'car_brands_id';
    protected $guraded = ['car_brands_id'];
    public $fillable = [
        'car_brands_name',
        'car_brands_status',
    ];
}
