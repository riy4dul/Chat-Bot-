<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Carbon\Carbon;
use App\LoanInformationModel;
use Illuminate\Support\Facades\Input;

class LoanInformationController extends Controller
{
    /*
     * loan information list
     */
    public function show()
    {
        $dataList = LoanInformationModel::all();
        return view('backend.LoanInformation.list', compact('dataList'));
    }

    /*
     * add new promotion
     */

    public function add()
    {
        return view('backend.LoanInformation.add');
    }

    /*
     * store promotions
     */
    public function store()
    {
        $loan_info_name = Input::get('loan_info_name');
        $loan_info_designation = Input::get('loan_info_designation');
        $loan_info_phone = Input::get('loan_info_phone');
        $loan_info_status = Input::get('loan_info_status');

        $errors = array();
        /*
         * checking name empty or not
         */
        if (empty($loan_info_name) || $loan_info_name == '') {
            $errors['loan_info_name'] = "Name required";
        }
        /*
         * checking designation empty or not
         */
        if (empty($loan_info_designation) || $loan_info_designation == '') {
            $errors['loan_info_designation'] = "Designation required";
        }
        /*
         * checking phone number empty or not
         */
        if (empty($loan_info_phone) || $loan_info_phone == '') {
            $errors['loan_info_phone'] = "Phone number required";
        }

        if (!empty($loan_info_phone)) {
            if (strlen($loan_info_phone) >= 14) {
                $errors['loan_info_phone'] = "Phone number must be less then 13 digit";
            }
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = new LoanInformationModel();
            $data->loan_info_name = $loan_info_name;
            $data->loan_info_designation = $loan_info_designation;
            $data->loan_info_phone = $loan_info_phone;
            $data->loan_info_status = $loan_info_status;
            $data->created_at = Carbon::now();
            if ($data->save()) {
                $notification = array(
                    'message' => 'Loan Information added successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/loan-info/list')->with($notification);
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
     * edit loan info
     */
    public function edit($id)
    {
        $data = LoanInformationModel::where('loan_info_id', $id)->first();
        return view('backend.LoanInformation.edit', compact('data'));
    }

    /*
     * update loan info
     */
    public function update()
    {
        $loan_info_id = Input::get('loan_info_id');
        $loan_info_name = Input::get('loan_info_name');
        $loan_info_designation = Input::get('loan_info_designation');
        $loan_info_phone = Input::get('loan_info_phone');
        $loan_info_status = Input::get('loan_info_status');

        $errors = array();
        /*
         * checking name empty or not
         */
        if (empty($loan_info_name) || $loan_info_name == '') {
            $errors['loan_info_name'] = "Name required";
        }
        /*
         * checking designation empty or not
         */
        if (empty($loan_info_designation) || $loan_info_designation == '') {
            $errors['loan_info_designation'] = "Designation required";
        }
        /*
         * checking phone number empty or not
         */
        if (empty($loan_info_phone) || $loan_info_phone == '') {
            $errors['loan_info_phone'] = "Phone number required";
        }

        if (!empty($loan_info_phone)) {
            if (strlen($loan_info_phone) >= 14) {
                $errors['loan_info_phone'] = "Phone number must be less then 13 digit";
            }
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            $data = LoanInformationModel::where('loan_info_id', $loan_info_id)->first();
            $data->loan_info_name = $loan_info_name;
            $data->loan_info_designation = $loan_info_designation;
            $data->loan_info_phone = $loan_info_phone;
            $data->loan_info_status = $loan_info_status;
            if ($data->save()) {
                $notification = array(
                    'message' => 'Loan Information updated successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/loan-info/list')->with($notification);
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
    * active loan info
    */
    public function active()
    {
        $loan_info_id = Input::get('loan_info_id');
        $data = LoanInformationModel::where('loan_info_id', $loan_info_id)->first();
        $data->loan_info_status = 'Active';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully active the loan information.',
                'alert-type' => 'success'
            );
            return redirect('portal/loan-info/list')->with($notification);
        }
    }

    /*
     * inactive loan info
     */
    public function inActive()
    {
        $loan_info_id = Input::get('loan_info_id');
        $data = LoanInformationModel::where('loan_info_id', $loan_info_id)->first();
        $data->loan_info_status = 'Inactive';
        if ($data->save()) {
            $notification = array(
                'message' => 'Successfully inactive the loan information.',
                'alert-type' => 'success'
            );
            return redirect('portal/loan-info/list')->with($notification);
        }
    }
}
