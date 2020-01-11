<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\SparePartsOrderModel;
use App\Payment;
use App\Due;
use Carbon\Carbon;

use App\Http\Controllers\Controller;

class PaymentController extends Controller
{
    
    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function getPayment($spare_parts_orders_id)
    {

        $order = SparePartsOrderModel::where('spare_parts_orders_id',$spare_parts_orders_id)->first();
        return view('backend.payment.add',compact('order'));
  
              
    }


    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function duePayments()
    {
        $dataList = SparePartsOrderModel::where('confirmation', '<>', 'rejected')
										->leftJoin('deliveries','spare_parts_orders.spare_parts_orders_id','=', 'deliveries.order_id')
										->leftJoin('payments','spare_parts_orders.spare_parts_orders_id','=', 'payments.spare_part_order_id')
										->get();
			//return $dataList;
            return view('backend.payment.due', compact('dataList'));
			
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function setPayment(Request $request, $id)
    {
        $this->validate($request,[
                'cash_received' => 'required|integer',
                'due_price' => 'required|integer',
            ]);

        /*
         * check product_id not Changed
         */
        $incomming_product_id = $request->product_id;
        $stored_product_id = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_product_id_g = $stored_product_id->spare_parts_id;
        if($incomming_product_id != $stored_product_id_g){
            return $this->errors();
        }

        /*
         * check product_name not Changed
         */
        $incomming_product_name = $request->product_name;
        $stored_product_name = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_product_name_g = $stored_product_name->SpareParts->spare_parts_name;
        if($incomming_product_name != $stored_product_name_g){
            return $this->errors();
        }

        // /*
        //  * check order_id not Changed
        //  */
        // $incomming_order_id = $request->order_id;
        // $stored_order_id = SparePartsOrderModel::where('spare_parts_orders_id', $id)->first();
        // $stored_order_id_g = $stored_order_id->spare_parts_orders_id;
        // if($incomming_order_id != $stored_order_id_g){
        //     //return $this->errors();
        //     return "order_id not match";
        // }

        /*
         * check delivered by not Changed
         */
        $incomming_delivered_by = $request->delivered_by;
        $stored_delivered_by = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_delivered_by_g = $stored_delivered_by->Delivery->delivery_by;
        if($incomming_delivered_by != $stored_delivered_by_g){
            return $this->errors();
        }

        /*
         * check delivery_fee not Changed
         */
        $incomming_delivery_fee = $request->delivery_fee;
        $stored_delivery_fee = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_delivery_fee_g = $stored_delivery_fee->Delivery->delivery_fee;
        if($incomming_delivery_fee != $stored_delivery_fee_g){
            return $this->errors();
        }

         /*
         * check payment_method not Changed
         */
        $incomming_payment_method = $request->payment_method;
        $stored_payment_method = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_payment_method_g = $stored_payment_method->Delivery->payment_method;
        if($incomming_payment_method != $stored_payment_method_g){
            return $this->errors();
        }

         /*
         * check product_price not Changed
         */
        $incomming_product_price = $request->product_price;
        $stored_product_price = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_product_price_g = $stored_product_price->SpareParts->spare_parts_price;
        if($incomming_product_price != $stored_product_price_g){
            return $this->errors();
        }

         /*
         * check total_amount not Changed
         */
        $incomming_total_amount = $request->total_amount;
        $stored_total_amount = SparePartsOrderModel::where('spare_parts_orders_id', $request->order_id)->first();
        $stored_total_amount_g = $stored_total_amount->SpareParts->spare_parts_price + $stored_total_amount->Delivery->delivery_fee;
        if($incomming_total_amount != $stored_total_amount_g){
            return $this->errors();
        }else{
                $delivery = new Payment();
                $delivery->spare_part_id = $request->product_id;
                $delivery->product_name = $request->product_name;
                $delivery->spare_part_order_id = $request->order_id;
                $delivery->delivered_by = $request->delivered_by;
                $delivery->delivery_fee = $request->delivery_fee;
                $delivery->approved_by = $request->confirmed_by;
                $delivery->payment_method = $request->payment_method;
                $delivery->product_price = $request->product_price;
                $delivery->total_price = $request->total_amount;
                $delivery->due_price = $request->due_price;
                $delivery->cash_received = $request->cash_received;
                $delivery->created_at = Carbon::now();
                if ($delivery->save()) {
                        $spare_parts_orders_id = $request->order_id;
                        $spareOrder = SparePartsOrderModel::where('spare_parts_orders_id', $spare_parts_orders_id)->first();
                        $spareOrder->delivery = 'delivered';
                        $spareOrder->save();

                        $notification = array(
                            'message' => 'Payment Added successfully.',
                            'alert-type' => 'success'
                        );
                    return redirect('portal/spare_parts_order/list')->with($notification);
                } 
        }
    }

    public function errors(){
        $notification = array(
                    'message' => 'Sorry !!! Something went wrong, please try again.',
                    'alert-type' => 'error'
                );
        return redirect()->back()->with($notification);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
