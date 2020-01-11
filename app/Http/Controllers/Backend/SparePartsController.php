<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SparePartsModel;
use Illuminate\Support\Facades\Input;
use Carbon\Carbon;
use App\CarBrandModel;

class SparePartsController extends Controller
{
    /*
     * promotion list
     */
    public function show()
    {
        $dataList = SparePartsModel::leftJoin('car_brands', 'spare_parts.spare_parts_brand', 'car_brands.car_brands_id')->get();
        return view('backend.spareParts.list', compact('dataList'));
    }

    /*
     * add new promotions
     */
    public function add()
    {
        $carBrandList = CarBrandModel::where('car_brands_status', 'Active')->get();
        return view('backend.spareParts.add', compact('carBrandList'));
    }

    /*
     * promotion store
     */
    public function store()
    {
        $spare_parts_brand = Input::get('spare_parts_brand');
        $spare_parts_model = Input::get('spare_parts_model');
        $spare_parts_name = Input::get('spare_parts_name');
        $spare_parts_stock = Input::get('spare_parts_stock');
        $spare_parts_image = Input::get('spare_parts_image');
        $spare_parts_price = Input::get('spare_parts_price');
        $spare_parts_status = Input::get('spare_parts_status');

        $errors = array();
        /*
         * checking brand name empty or not
         */
        if (empty($spare_parts_brand) || $spare_parts_brand == '') {
            $errors['spare_parts_brand'] = "Brand name required";
        }
        /*
         * checking brand model name empty or not
         */
        if (empty($spare_parts_model) || $spare_parts_model == '') {
            $errors['spare_parts_model'] = "Model name required";
        }
        /*
         * checking parts name empty or not
         */
        if (empty($spare_parts_name) || $spare_parts_name == '') {
            $errors['spare_parts_name'] = "Parts name required";
        }
        /*
        * check spare parts exists or not
        */
        $sparePartsExists = SparePartsModel::where('spare_parts_name', $spare_parts_name)->exists();
        if ($sparePartsExists) {
            $errors['spare_parts_name'] = "Model name already exists";
        }
        /*
         * checking parts stock empty or not
         */
        if (empty($spare_parts_stock) || $spare_parts_stock == '') {
            $errors['spare_parts_stock'] = "Parts stock required";
        }
        /*
         * checking parts image link empty or not
         */
        if (empty($spare_parts_image) || $spare_parts_image == '') {
            $errors['spare_parts_image'] = "Parts image link required";
        }
        /*
         * checking parts price empty or not
         */
        if (empty($spare_parts_price) || $spare_parts_price == '') {
            $errors['spare_parts_price'] = "Parts price required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = new SparePartsModel();
            $data->spare_parts_brand = $spare_parts_brand;
            $data->spare_parts_model = $spare_parts_model;
            $data->spare_parts_name = $spare_parts_name;
            $data->spare_parts_stock = $spare_parts_stock;
            $data->spare_parts_image = $spare_parts_image;
            $data->spare_parts_price = $spare_parts_price;
            $data->spare_parts_status = $spare_parts_status;
            $data->created_at = Carbon::now();
            if ($data->save()) {
                $notification = array(
                    'message' => 'Spare parts added successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/spare-parts/list')->with($notification);
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
     * edit promotions
     */

    public function edit($id)
    {
        $data = SparePartsModel::where('spare_parts_id', $id)->first();
        $carBrandList = CarBrandModel::where('car_brands_status', 'Active')->get();
        return view('backend.spareParts.edit', compact('data', 'carBrandList'));
    }

    /*
     * update promotions
     */

    public function update()
    {
        $spare_parts_id = Input::get('spare_parts_id');
        $spare_parts_brand = Input::get('spare_parts_brand');
        $spare_parts_model = Input::get('spare_parts_model');
        $spare_parts_name = Input::get('spare_parts_name');
        $spare_parts_stock = Input::get('spare_parts_stock');
        $spare_parts_image = Input::get('spare_parts_image');
        $spare_parts_price = Input::get('spare_parts_price');
        $spare_parts_status = Input::get('spare_parts_status');

        $errors = array();
        /*
         * checking brand name empty or not
         */
        if (empty($spare_parts_brand) || $spare_parts_brand == '') {
            $errors['spare_parts_brand'] = "Brand name required";
        }
        /*
         * checking brand model name empty or not
         */
        if (empty($spare_parts_model) || $spare_parts_model == '') {
            $errors['spare_parts_model'] = "Model name required";
        }
        /*
         * checking parts name empty or not
         */
        if (empty($spare_parts_name) || $spare_parts_name == '') {
            $errors['spare_parts_name'] = "Parts name required";
        }

        /*
         * check spare parts exists or not
         */
        $sparePartsExists = SparePartsModel::where('spare_parts_name', $spare_parts_name)->where('spare_parts_id', '<>', $spare_parts_id)->exists();
        if ($sparePartsExists) {
            $errors['spare_parts_name'] = "Model name already exists";
        }
        /*
         * checking parts stock empty or not
         */
        if (empty($spare_parts_stock) || $spare_parts_stock == '') {
            $errors['spare_parts_stock'] = "Parts stock required";
        }
        /*
         * checking parts image link empty or not
         */
        if (empty($spare_parts_image) || $spare_parts_image == '') {
            $errors['spare_parts_image'] = "Parts image link required";
        }
        /*
         * checking parts price empty or not
         */
        if (empty($spare_parts_price) || $spare_parts_price == '') {
            $errors['spare_parts_price'] = "Parts price required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = SparePartsModel::where('spare_parts_id', $spare_parts_id)->first();
            $data->spare_parts_brand = $spare_parts_brand;
            $data->spare_parts_model = $spare_parts_model;
            $data->spare_parts_name = $spare_parts_name;
            $data->spare_parts_stock = $spare_parts_stock;
            $data->spare_parts_image = $spare_parts_image;
            $data->spare_parts_price = $spare_parts_price;
            $data->spare_parts_status = $spare_parts_status;
            if ($data->save()) {
                $notification = array(
                    'message' => 'Spare parts updated successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/spare-parts/list')->with($notification);
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
     * active promotion
     */
    public function active()
    {
        $spare_parts_id = Input::get('spare_parts_id');
        $data = SparePartsModel::where('spare_parts_id', $spare_parts_id)->first();
        $data->spare_parts_status = 'Active';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully active the spare parts.',
                'alert-type' => 'success'
            );
            return redirect('portal/spare-parts/list')->with($notification);
        }
    }

    /*
     * inactive promotion
     */
    public function inActive()
    {
        $spare_parts_id = Input::get('spare_parts_id');
        $data = SparePartsModel::where('spare_parts_id', $spare_parts_id)->first();
        $data->spare_parts_status = 'Inactive';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the spare parts.',
                'alert-type' => 'success'
            );
            return redirect('portal/spare-parts/list')->with($notification);
        }
    }

}
