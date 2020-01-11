<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\SparePartsOrderModel;
use Illuminate\Support\Facades\Input;
use App\SparePartsModel;

class SparePartsOrderController extends Controller
{
    public function show()
    {
        $dataList = SparePartsOrderModel::where('confirmation', '<>', 'rejected')->get();

        return view('backend.sparePartsOrder.list', compact('dataList'));
    }

    public function inActive()
    {
        $spare_parts_orders_id = Input::get('spare_parts_orders_id');
        $data = SparePartsOrderModel::where('spare_parts_orders_id', $spare_parts_orders_id)->first();
        $data->confirmation = 'not confirmed';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully UnConfirmed this Order.',
                'alert-type' => 'danger'
            );
            return redirect()->back()->with($notification);
        }
    }

    public function active()
    {
        $spare_parts_orders_id = Input::get('spare_parts_orders_id');
        $data = SparePartsOrderModel::where('spare_parts_orders_id', $spare_parts_orders_id)->first();
        $data->confirmation = 'confirmed';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully Confirmed this Order.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }


    // Function For Reject Order
    public function rejected()
    {
        $spare_parts_orders_id = Input::get('spare_parts_orders_id');
        $data = SparePartsOrderModel::where('spare_parts_orders_id', $spare_parts_orders_id)->first();
        $data->confirmation = 'rejected';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully Rejected this Order.',
                'alert-type' => 'success'
            );
            return redirect()->back()->with($notification);
        }
    }

    // spare part order count
    public function sparePartOrderCount()
    {
        $ordersCount = SparePartsOrderModel::where('confirmation', 'not confirmed')->count();
        return $ordersCount;
    }
}
