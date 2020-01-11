<?php

namespace App\Http\Controllers\Backend\SystemSetting;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\CarBrandModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class BrandController extends Controller
{
    /*
     * show all car brand list
     */
    public function show()
    {
        $dataList = CarBrandModel::get();
        return view('backend.systemSetting.brand.list', compact('dataList'));
    }

    /*
     * add new car brand
     */
    public function add()
    {
        return view('backend.systemSetting.brand.add');
    }

    /*
   * car brand name store
   */
    public function store()
    {
        $car_brands_name = Input::get('car_brands_name');
        $car_brands_status = Input::get('car_brands_status');

        $errors = array();
        /*
         * checking car brand name empty or not
         */
        if (empty($car_brands_name) || $car_brands_name == '') {
            $errors['car_brands_name'] = "Name required";
        }

        /*
        * check brand exists or not
        */
        $brandExists = CarBrandModel::where('car_brands_name', $car_brands_name)->exists();
        if ($brandExists) {
            $errors['car_brands_name'] = "Name already exists";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = new CarBrandModel();
            $data->car_brands_name = $car_brands_name;
            $data->car_brands_status = $car_brands_status;
            $data->created_at = Carbon::now();
            if ($data->save()) {
                $notification = array(
                    'message' => 'Car brand name added successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/systemSetting/brand/list')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Sorry !!! Something went wrong, please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /*
     * edit car brand name
     */

    public function edit($id)
    {
        $data = CarBrandModel::where('car_brands_id', $id)->first();
        return view('backend.systemSetting.brand.edit', compact('data'));
    }

    /*
     * update car brand name
     */

    public function update()
    {
        $car_brands_id = Input::get('car_brands_id');
        $car_brands_name = Input::get('car_brands_name');
        $car_brands_status = Input::get('car_brands_status');

        $errors = array();
        /*
         * checking car brand name empty or not
         */
        if (empty($car_brands_name) || $car_brands_name == '') {
            $errors['car_brands_name'] = "Name required";
        }
        /*
        * check brand exists or not
        */
        $brandExists = CarBrandModel::where('car_brands_name', $car_brands_name)->where('car_brands_id','<>',$car_brands_id)->exists();
        if ($brandExists) {
            $errors['car_brands_name'] = "Name already exists";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = CarBrandModel::where('car_brands_id', $car_brands_id)->first();
            $data->car_brands_name = $car_brands_name;
            $data->car_brands_status = $car_brands_status;
            if ($data->save()) {
                $notification = array(
                    'message' => 'Car brand updated successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/systemSetting/brand/list')->with($notification);
            } else {
                $notification = array(
                    'message' => 'Sorry !!! Something went wrong, please try again.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /*
     * active car brand name
     */
    public function active()
    {
        $car_brands_id = Input::get('car_brands_id');
        $data = CarBrandModel::where('car_brands_id', $car_brands_id)->first();
        $data->car_brands_status = 'Active';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully active the car brand.',
                'alert-type' => 'success'
            );
            return redirect('portal/systemSetting/brand/list')->with($notification);
        }
    }

    /*
     * inactive car brand name
     */
    public function inActive()
    {
        $car_brands_id = Input::get('car_brands_id');
        $data = CarBrandModel::where('car_brands_id', $car_brands_id)->first();
        $data->car_brands_status = 'Inactive';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the car brand.',
                'alert-type' => 'success'
            );
            return redirect('portal/systemSetting/brand/list')->with($notification);
        }
    }

}
