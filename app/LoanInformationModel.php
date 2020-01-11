<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class LoanInformationModel extends Model
{
    public $table = 'loan_info';
    protected $primaryKey = 'loan_info_id';
    protected $guraded = ['loan_info_id'];
    public $fillable = [
        'loan_info_name',
        'loan_info_designation',
        'loan_info_phone',
        'loan_info_status'
    ];
}
