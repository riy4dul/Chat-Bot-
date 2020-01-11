<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Input;
use App\User;

class LoginController extends Controller
{
    //to view login page
    public function show()
    {
        return view('backend.login');
    }

    //login to dashboard
    public function login()
    {
        $email = Input::get('email');
        $password = Input::get('password');

        $errors = array();

        /*
         * check email empty or not
         */
        if (empty($email) || $email == '') {
            $errors['email'] = "Email address required";
        }
        /*
         * check password empty or not
         */
        if (empty($password) || $password == '') {
            $errors['password'] = "Password required";
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            if (Auth::attempt(['email' => $email, 'password' => $password])) {
                if (Auth::user()->status === "Active") {
                    if (Auth::user()->type == "Super Admin") {
                        return redirect('/portal/dashboard');
                    } else if (Auth::user()->type == "Admin") {
                        return redirect('/portal/dashboard');
                    }
                } else {
                    Auth::logout();
                    $notification = array(
                        'message' => 'Sorry your account is still not active. Please contact the system admin.',
                        'alert-type' => 'error'
                    );
                    return redirect()->back()->with($notification);
                }
            } else {
                $notification = array(
                    'message' => 'Wrong email address or password. Re-enter the email address or password.',
                    'alert-type' => 'error'
                );
                return redirect()->back()->with($notification);
            }
        }
    }

    /*
    * logout
    */

    public function logout()
    {
        Auth::logout();
        $notification = array(
            'message' => 'Successfully logged out',
            'alert-type' => 'success'
        );
        return redirect('/getLogin')->with($notification);
    }
}
