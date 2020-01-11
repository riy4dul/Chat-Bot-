<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\BrandModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;
use App\CarBrandModel;


class BrandController extends Controller
{
    //brand list function
    public function show()
    {
        $dataList = BrandModel::leftJoin('car_brands', 'brands.brand_name', 'car_brands.car_brands_id')
            ->get();
        return view('backend.brand.list', compact('dataList'));
    }

    // brand add function
    public function add()
    {
        $carBrandList = CarBrandModel::where('car_brands_status', 'Active')->get();
        return view('backend.brand.add', compact('carBrandList'));
    }

    // store brand
    public function store()
    {
        $brand_name = Input::get('brand_name');
        $brand_model = Input::get('brand_model');
        $brand_price = Input::get('brand_price');
        $brand_image_link = Input::get('brand_image_link');
        $brand_description = Input::get('brand_description');
        $brand_specifications = Input::get('brand_specifications');
        $brand_status = Input::get('brand_status');
        $brand_latest_cars = Input::get('brand_latest_cars');
        $brand_top_seller_cars = Input::get('brand_top_seller_cars');
        $brand_gallery_cars = Input::get('brand_gallery_cars');

        $errors = array();

        /*
         * check brand name empty or not
         */
        if (empty($brand_name) || $brand_name == '') {
            $errors['brand_name'] = "Name required";
        }
        /*
         * check model name empty or not
         */
        if (empty($brand_model) || $brand_model == '') {
            $errors['brand_model'] = "Model name required";
        }

        /*
         * check model name exists or not
         */
        $brandModelExists = BrandModel::where('brand_model', $brand_model)->exists();
        if ($brandModelExists) {
            $errors['brand_model'] = "Model name already exists";
        }
        /*
         * check price empty or not
         */
        if (empty($brand_price) || $brand_price == '') {
            $errors['brand_price'] = "Price required";
        }
        /*
         * check brand image link empty or not
         */
        if (empty($brand_image_link) || $brand_image_link == '') {
            $errors['brand_image_link'] = "Image link required";
        }
        /*
         * check brand description empty or not
         */
        if (empty($brand_description) || $brand_description == '') {
            $errors['brand_description'] = "Description required";
        }
        /*
         * check brand specification empty or not
         */
        if (empty($brand_specifications) || $brand_specifications == '') {
            $errors['brand_specifications'] = "Specification (Website URL or Facebook URL) required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $dataList = new BrandModel();
            $dataList->brand_name = $brand_name;
            $dataList->brand_model = $brand_model;
            $dataList->brand_price = $brand_price;
            $dataList->brand_image_link = $brand_image_link;
            $dataList->brand_description = $brand_description;
            $dataList->brand_status = $brand_status;
            $dataList->brand_latest_cars = $brand_latest_cars;
            $dataList->brand_top_seller_cars = $brand_top_seller_cars;
            $dataList->brand_gallery_cars = $brand_gallery_cars;
            $dataList->brand_specifications = $brand_specifications;
            $dataList->created_at = Carbon::now();

            if ($dataList->save()) {
                $notification = array(
                    'message' => 'Brand added successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/brand/list')->with($notification);
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
  * edit car brand
  */

    public function edit($id)
    {
        $idExists = BrandModel::where('brand_id', $id)->exists();
        $carBrandList = CarBrandModel::where('car_brands_status', 'Active')->get();
        if ($idExists) {
            $data = BrandModel::where('brand_id', $id)->first();
            return view('backend.brand.edit', compact('data', 'carBrandList'));
        } else {
            $notification = array(
                'message' => 'Sorry !!! Something went wrong, please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }

    /*
     * update car brand
     */
    public function update()
    {
        $brand_id = Input::get('brand_id');
        $brand_name = Input::get('brand_name');
        $brand_model = Input::get('brand_model');
        $brand_price = Input::get('brand_price');
        $brand_image_link = Input::get('brand_image_link');
        $brand_description = Input::get('brand_description');
        $brand_specifications = Input::get('brand_specifications');
        $brand_status = Input::get('brand_status');
        $brand_latest_cars = Input::get('brand_latest_cars');
        $brand_top_seller_cars = Input::get('brand_top_seller_cars');
        $brand_gallery_cars = Input::get('brand_gallery_cars');

        $errors = array();

        /*
         * check brand name empty or not
         */
        if (empty($brand_name) || $brand_name == '') {
            $errors['brand_name'] = "Name required";
        }
        /*
         * check model name empty or not
         */
        if (empty($brand_model) || $brand_model == '') {
            $errors['brand_model'] = "Model name required";
        }
        /*
         * check model exists or not
         */
        $brandModelExists = BrandModel::where('brand_model', $brand_model)->where('brand_id', '<>', $brand_id)->exists();
        if ($brandModelExists) {
            $errors['brand_model'] = "Model name already exists";
        }
        /*
         * check price empty or not
         */
        if (empty($brand_price) || $brand_price == '') {
            $errors['brand_price'] = "Price required";
        }
        /*
         * check brand image link empty or not
         */
        if (empty($brand_image_link) || $brand_image_link == '') {
            $errors['brand_image_link'] = "Image link required";
        }
        /*
         * check brand description empty or not
         */
        if (empty($brand_description) || $brand_description == '') {
            $errors['brand_description'] = "Description required";
        }
        /*
         * check brand specification empty or not
         */
        if (empty($brand_specifications) || $brand_specifications == '') {
            $errors['brand_specifications'] = "Specification (Website URL or Facebook URL) required";
        }
        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $dataList = BrandModel::where('brand_id', $brand_id)->first();
            $dataList->brand_name = $brand_name;
            $dataList->brand_model = $brand_model;
            $dataList->brand_price = $brand_price;
            $dataList->brand_image_link = $brand_image_link;
            $dataList->brand_description = $brand_description;
            $dataList->brand_status = $brand_status;
            $dataList->brand_latest_cars = $brand_latest_cars;
            $dataList->brand_top_seller_cars = $brand_top_seller_cars;
            $dataList->brand_gallery_cars = $brand_gallery_cars;
            $dataList->brand_specifications = $brand_specifications;

            if ($dataList->save()) {
                $notification = array(
                    'message' => 'Brand updated successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/brand/list')->with($notification);
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
     * inactive car model
     */
    public function inActive()
    {
        $brand_id = Input::get('brand_id');
        $data = BrandModel::where('brand_id', $brand_id)->first();
        $data->brand_status = 'Inactive';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the car model.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    /*
   * active car model
   */
    public function active()
    {
        $brand_id = Input::get('brand_id');
        $data = BrandModel::where('brand_id', $brand_id)->first();
        $data->brand_status = 'Active';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the car model.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }
}
