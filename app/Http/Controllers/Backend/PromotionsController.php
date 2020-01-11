<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PromotionsModel;
use Carbon\Carbon;
use Illuminate\Support\Facades\Input;

class PromotionsController extends Controller
{
    /*
     * promotion list
     */
    public function show()
    {
        $dataList = PromotionsModel::all();
        return view('backend.promotions.list', compact('dataList'));
    }

    /*
     * add new promotions
     */
    public function add()
    {
        return view('backend.promotions.add');
    }

    /*
     * promotion store
     */
    public function store()
    {
        $promotion_description = Input::get('promotion_description');
        $promotion_status = Input::get('promotion_status');

        $errors = array();
        /*
         * checking promotion description empty or not
         */
        if (empty($promotion_description) || $promotion_description == '') {
            $errors['promotion_description'] = "Description required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = new PromotionsModel();
            $data->promotion_description = $promotion_description;
            $data->promotion_status = $promotion_status;
            $data->created_at = Carbon::now();
            if ($data->save()) {
                $notification = array(
                    'message' => 'Promotions added successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/promotions/list')->with($notification);
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
        $data = PromotionsModel::where('promotion_id', $id)->first();
        return view('backend.promotions.edit', compact('data'));
    }

    /*
     * update promotions
     */

    public function update()
    {
        $promotion_id = Input::get('promotion_id');
        $promotion_description = Input::get('promotion_description');
        $promotion_status = Input::get('promotion_status');

        $errors = array();
        /*
         * checking promotion description empty or not
         */
        if (empty($promotion_description) || $promotion_description == '') {
            $errors['promotion_description'] = "Description required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = PromotionsModel::where('promotion_id', $promotion_id)->first();
            $data->promotion_description = $promotion_description;
            $data->promotion_status = $promotion_status;
            if ($data->save()) {
                $notification = array(
                    'message' => 'Promotions updated successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/promotions/list')->with($notification);
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
        $promotion_id = Input::get('promotion_id');
        $data = PromotionsModel::where('promotion_id', $promotion_id)->first();
        $data->promotion_status = 'Active';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully active the promotions.',
                'alert-type' => 'success'
            );
            return redirect('portal/promotions/list')->with($notification);
        }
    }

    /*
     * inactive promotion
     */
    public function inActive()
    {
        $promotion_id = Input::get('promotion_id');
        $data = PromotionsModel::where('promotion_id', $promotion_id)->first();
        $data->promotion_status = 'Inactive';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the promotions.',
                'alert-type' => 'success'
            );
            return redirect('portal/promotions/list')->with($notification);
        }
    }

}
