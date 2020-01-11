<?php
namespace App\Http\Controllers\Backend;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\DeliveryModel;
use App\SparePartsOrderModel;
class DeliveryController extends Controller
{
    public function index()
    {
         $dataList = DeliveryModel::with('SpareParts')->get();
        return view('backend.delivery.list', compact('dataList'));
    }
    public function requestDelivery($id)
    {
        $data = SparePartsOrderModel::where('spare_parts_orders_id', $id)->first();
        return view('backend.delivery.requestDelivery',compact('id','data'));
        //echo $id;
    }
    public function requestDeliveryAdd(Request $request)
    {
        $this->validate($request,[
                'delivery_by' => 'required',
                'payment_method' => 'required',
                'delivery_date' => 'required',
                'description' => 'required',
                'delivery_fee' => 'required|integer',
            ]);
        $delivery = new DeliveryModel();
        $delivery->delivery_by = $request->delivery_by;
        $delivery->payment_method = $request->payment_method;
        $delivery->product_id = $request->product_id;
        $delivery->order_id = $request->order_id;
        $delivery->delivery_date = $request->delivery_date;
        $delivery->description = $request->description;
        $delivery->delivery_fee = $request->delivery_fee;
        if ($delivery->save()) 
        {
            $notification = array(
            'message' => 'Successfully Requested for Delivery For This Order.',
            'alert-type' => 'success'
            );

            return redirect('portal/delivery/list')->with($notification);;
        }

}
    
public function deliveryProceed($id)
    {
        $datalist = SparePartsOrderModel::where('spare_parts_orders_id', $id)->first();
        $datalist->delivery = 'picked';
        $datalist->save();
        return redirect('portal/spare_parts_order/list');
    }
}