<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CarBrandModel;
use App\BrandModel;
use App\SparePartsModel;
use App\SparePartsOrderModel;

class DashboardController extends Controller
{
    //dashboard page
    public function index(){
        $carBrandCount = CarBrandModel::where('car_brands_status', 'Active')->count();
        $brandModelCount = BrandModel::where('brand_status', 'Active')->count();
        $sparePartsCount = SparePartsModel::where('spare_parts_status', 'Active')->count();
       return view('backend.dashboard',compact('carBrandCount','brandModelCount','sparePartsCount'));
    }
}
