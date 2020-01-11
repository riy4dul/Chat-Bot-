<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class BrandModel extends Model
{
    public $table = 'brands';
    protected $primaryKey = 'brand_id';
    protected $guraded = ['brand_id'];
    public $fillable = [
        'brand_name',
        'brand_model',
        'brand_price',
        'brand_image_link',
        'brand_description',
        'brand_status',
        'brand_latest_cars',
        'brand_top_seller_cars',
        'brand_gallery_cars',
        'brand_specifications'
    ];
}
