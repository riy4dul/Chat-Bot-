<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class SalesCenterModel extends Model
{
    public $table = 'sales_center';
    protected $primaryKey = 'sales_center_id';
    protected $guraded = ['sales_center_id'];
    public $fillable = [
        'sales_center_address',
        'sales_center_city',
        'sales_center_phone',
        'sales_center_working_hours',
        'sales_center_working_days',
        'sales_center_status',
        ];
}
