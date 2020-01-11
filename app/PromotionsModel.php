<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class PromotionsModel extends Model
{
    public $table = 'promotion';
    protected $primaryKey = 'promotion_id';
    protected $guraded = ['promotion_id'];
    public $fillable = [
        'promotion_description',
        'promotion_status'
    ];
}
