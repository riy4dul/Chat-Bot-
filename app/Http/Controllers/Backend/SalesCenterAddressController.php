<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SalesCenterModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class SalesCenterAddressController extends Controller
{
    /*
     * promotion list
     */
    public function show()
    {
        $dataList = SalesCenterModel::all();
        return view('backend.salesCenterAddress.list', compact('dataList'));
    }

    /*
     * add new promotions
     */
    public function add()
    {
        return view('backend.salesCenterAddress.add');
    }

    /*
     * promotion store
     */
    public function store()
    {
        $sales_center_address = Input::get('sales_center_address');
        $sales_center_city = Input::get('sales_center_city');
        $sales_center_phone = Input::get('sales_center_phone');
        $sales_center_working_hours = Input::get('sales_center_working_hours');
        $sales_center_working_days = Input::get('sales_center_working_days');
        $sales_center_status = Input::get('sales_center_status');

        $errors = array();
        /*
         * checking sales center address empty or not
         */
        if (empty($sales_center_address) || $sales_center_address == '') {
            $errors['sales_center_address'] = "Address required";
        }
        /*
         * checking sales center city empty or not
         */
        if (empty($sales_center_city) || $sales_center_city == '') {
            $errors['sales_center_city'] = "City required";
        }
        /*
         * checking sales center phone empty or not
         */
        if (empty($sales_center_phone) || $sales_center_phone == '') {
            $errors['sales_center_phone'] = "Phone number required";
        }

        if(!empty($sales_center_phone)){
            if(strlen($sales_center_phone) >= 13){
                $errors['sales_center_phone'] = "Phone number must be less then 13 digit long";
            }
        }
        /*
         * checking sales center working hours empty or not
         */
        if (empty($sales_center_working_hours) || $sales_center_working_hours == '') {
            $errors['sales_center_working_hours'] = "Working hours required";
        }
        /*
         * checking sales center working days empty or not
         */
        if (empty($sales_center_working_days) || $sales_center_working_days == '') {
            $errors['sales_center_working_days'] = "Working days required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = new SalesCenterModel();
            $data->sales_center_address = $sales_center_address;
            $data->sales_center_city = $sales_center_city;
            $data->sales_center_phone = $sales_center_phone;
            $data->sales_center_working_hours = $sales_center_working_hours;
            $data->sales_center_working_days = $sales_center_working_days;
            $data->sales_center_status = $sales_center_status;
            $data->created_at = Carbon::now();
            if ($data->save()) {
                $notification = array(
                    'message' => 'Sale center address added successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/sales-center/list')->with($notification);
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
        $data = SalesCenterModel::where('sales_center_id', $id)->first();
        return view('backend.salesCenterAddress.edit', compact('data'));
    }

    /*
     * update promotions
     */

    public function update()
    {
        $sales_center_id = Input::get('sales_center_id');
        $sales_center_address = Input::get('sales_center_address');
        $sales_center_city = Input::get('sales_center_city');
        $sales_center_phone = Input::get('sales_center_phone');
        $sales_center_working_hours = Input::get('sales_center_working_hours');
        $sales_center_working_days = Input::get('sales_center_working_days');
        $sales_center_status = Input::get('sales_center_status');

        $errors = array();
        /*
         * checking sales center address empty or not
         */
        if (empty($sales_center_address) || $sales_center_address == '') {
            $errors['sales_center_address'] = "Address required";
        }
        /*
         * checking sales center city empty or not
         */
        if (empty($sales_center_city) || $sales_center_city == '') {
            $errors['sales_center_city'] = "City required";
        }
        /*
         * checking sales center phone empty or not
         */
        if (empty($sales_center_phone) || $sales_center_phone == '') {
            $errors['sales_center_phone'] = "Phone number required";
        }

        if(!empty($sales_center_phone)){
            if(strlen($sales_center_phone) >= 13){
                $errors['sales_center_phone'] = "Phone number must be less then 13 digit long";
            }
        }
        /*
         * checking sales center working hours empty or not
         */
        if (empty($sales_center_working_hours) || $sales_center_working_hours == '') {
            $errors['sales_center_working_hours'] = "Working hours required";
        }
        /*
         * checking sales center working days empty or not
         */
        if (empty($sales_center_working_days) || $sales_center_working_days == '') {
            $errors['sales_center_working_days'] = "Working days required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = SalesCenterModel::where('sales_center_id', $sales_center_id)->first();
            $data->sales_center_address = $sales_center_address;
            $data->sales_center_city = $sales_center_city;
            $data->sales_center_phone = $sales_center_phone;
            $data->sales_center_working_hours = $sales_center_working_hours;
            $data->sales_center_working_days = $sales_center_working_days;
            $data->sales_center_status = $sales_center_status;
            if ($data->save()) {
                $notification = array(
                    'message' => 'Sale center address updates successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/sales-center/list')->with($notification);
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
        $sales_center_id = Input::get('sales_center_id');
        $data = SalesCenterModel::where('sales_center_id', $sales_center_id)->first();
        $data->sales_center_status = 'Active';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully active the sales center address.',
                'alert-type' => 'success'
            );
            return redirect('portal/sales-center/list')->with($notification);
        }
    }

    /*
     * inactive promotion
     */
    public function inActive()
    {
        $sales_center_id = Input::get('sales_center_id');
        $data = SalesCenterModel::where('sales_center_id', $sales_center_id)->first();
        $data->sales_center_status = 'Inactive';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the sales center address.',
                'alert-type' => 'success'
            );
            return redirect('portal/sales-center/list')->with($notification);
        }
    }
}
