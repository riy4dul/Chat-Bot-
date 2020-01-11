<?php

namespace App\Http\Controllers\Backend;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\User;
use File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Hash;

class ProfileSettingController extends Controller
{
    //profile page view
    public function index()
    {
        $data = Auth::user();
        return view('backend.profile.index', compact('data'));
    }

    /*
     *  edit profile
     */
    public function editProfile()
    {
        $data = Auth::user();
        return view('backend.profile.editProfile', compact('data'));
    }

    /*
    * store profile
    */

    public function updateProfile(Request $request)
    {
        $name = Input::get('name');
        $email = Input::get('email');
        $phone = Input::get('phone');

        $errors = array();

        /*
         * check name empty or not
         */
        if (empty($name) || $name == '') {
            $errors['name'] = "Name required";
        }
        /*
         * check email empty or not
         */
        if (empty($email) || $email == '') {
            $errors['email'] = "Email address  required";
        }
        /*
         * Check email validation
         */

        if (!empty(Input::get('email'))) {
            if (!filter_var(Input::get('email'), FILTER_VALIDATE_EMAIL) === true) {
                $errors['email'] = "Email address is not valid.";
            }
        }

        /*
         * check email address exists
         */
        $emailExists = User::where('email', $email)->where('id', '<>', Auth::user()->id)->exists();
        if ($emailExists) {
            $errors['email'] = "Email address already exists.";
        }
        /*
         * check phone empty or not
         */
        if (empty($phone) || $phone == '') {
            $errors['phone'] = "Phone number required";
        }
        /*
         * Checking phone number digit length 11 character or not
         */
        if (!empty($phone)) {
            if (strlen($phone) >= 14) {
                $errors['phone'] = "Phone number must be less then 14 Digits long.";
            }
        }
        /*
         * check phone number exists address
         */
        $phoneExists = User::where('phone', $phone)->where('id', '<>', Auth::user()->id)->exists();
        if ($phoneExists) {
            $errors['phone'] = "Phone number already exists.";
        }
        /*
         * for image empty or not
         */
        if (!empty($request->file('image'))) {
            if ($_FILES['image']['name']) {
                $allowed = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $errors['image'] = "Image should be in JPG, JPEG, PNG format";
                }
                if (File::size(Input::file("image")) > 2048000) {
                    $errors['image'] = "Image must be less than 2 MB";
                }
            }
        }

        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors)->with('errorArray', 'Array Error Occured');
        } else {
            $dataList = User::where('id', Auth::user()->id)->first();
            $dataList->name = $name;
            $dataList->email = $email;
            $dataList->phone = $phone;

            $image = $dataList->image;
            if (!empty($image)) {
                if ($_FILES['image']['name']) {
                    $userImage = public_path("backend/img/users_image/{$dataList->image}"); // get previous image from folder
                    if (File::exists($userImage)) { // unlink or remove previous image from folder
                        unlink($userImage);
                    }
                    $image = $request->file('image');
                    $imageName = date('YmdHis') . "OL" . rand(5, 10) . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move(('backend/img/users_image'), $imageName);
                    $dataList->image = $imageName;
                } else {
                    $dataList->image = $dataList->image;
                }
            } else {
                if ($_FILES['image']['name']) {
                    $image = $request->file('image');
                    $imageName = date('YmdHis') . "OL" . rand(5, 10) . '.' . $request->image->getClientOriginalExtension();
                    $request->image->move(('backend/img/users_image'), $imageName);
                    $dataList->image = $imageName;
                }
            }

            if ($dataList->save()) {
                $notification = array(
                    'message' => 'Profile updated successfully.',
                    'alert-type' => 'success'
                );
                return redirect('portal/profile')->with($notification);
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
        * profile edit page view
        */

    public function editPassword()
    {
        return view('backend.profile.editPassword');
    }

    /*
     * update password
     */

    public function updatePassword(Request $request)
    {
        $dataList = Auth::user();
        $old_password = Input::get('old_password');
        $password = Input::get('password');
        $re_password = Input::get('re_password');

        $errors = array();

        /*
         * Check old password is empty or not
         */
        if (empty($old_password) || $old_password == '') {
            $errors['old_password'] = "Old password required";
        }
        if (!empty($old_password)) {
            if (!Hash::check($request->get('old_password'), $dataList->password)) {
                $errors['old_password'] = "Old password does not match";
            }
        }

        /*
         * Check password is empty or not
         */
        if (empty($password) || $password == '') {
            $errors['password'] = "New password required";
        }
        /*
         * Check retype password is empty or not
         */
        if (empty($re_password) || $re_password == '') {
            $errors['re_password'] = "Confirm password required";
        }
        /*
         * Check if password and confirm password matched or not
         */
        if (!empty($password)) {
            if (!empty($re_password)) {
                if ($password != $re_password) {
                    $errors['re_password'] = "Confirm password does not match with new password ";
                }
            }
            /*
             * Check password length
             */

            if (strlen($password) < 6) {
                $errors['password'] = "Password must be longer than 5 characters in length";
            }

            if (strlen($password) > 15) {
                $errors['password'] = "Password must be least 15 characters in length";
            }
        }
        if (count($errors) > 0) {
            return redirect()->back()->withInput()->withErrors($errors);
        } else {
            if (Hash::check($request->get('old_password'), $dataList->password)) {
                if (Hash::check($request->get('password'), $dataList->password)) {
                    $errors['re_password'] = "Sorry !!! This Password Was Used Before.";
                    return redirect()->back()->withInput()->withErrors($errors);
                } else {
                    $dataList->password = bcrypt($password);
                    if ($dataList->save()) {
                        $notification = array(
                            'message' => 'Password updated successfully.',
                            'alert-type' => 'success'
                        );
                        Auth::logout();
                        return redirect('/getLogin')->with($notification);
                    } else {
                        return redirect()->back()->withInput()->with('error', 'Sorry !!! Something went wrong, please try again');
                    }
                }
            } else {
                $errors['old_password'] = "Old password does not match.";
                return redirect()->back()->withInput()->withErrors($errors);
            }
        }
    }

    /*
     * update profile picture
     */
    public function pictureUpdate(Request $request)
    {
        $id = Input::get('id');
        /*
         * for image empty or not
         */
        if (!empty($request->file('image'))) {
            if ($_FILES['image']['name']) {
                $allowed = array('jpg', 'JPG', 'jpeg', 'JPEG', 'png', 'PNG');
                $ext = pathinfo($_FILES['image']['name'], PATHINFO_EXTENSION);
                if (!in_array($ext, $allowed)) {
                    $errors['image'] = "Image should be in JPG, JPEG, PNG format";
                }
                if (File::size(Input::file("image")) > 2048000) {
                    $errors['image'] = "Image must be less than 2 MB";
                }
            }
        }

        $data = User::where('id', $id)->first();
        $image = $data->image;
        if (!empty($image)) {
            if ($_FILES['image']['name']) {
                $userImage = public_path("backend/img/users_image/{$data->image}"); // get previous image from folder
                if (File::exists($userImage)) { // unlink or remove previous image from folder
                    unlink($userImage);
                }
                $image = $request->file('image');
                $imageName = date('YmdHis') . "OL" . rand(5, 10) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(('backend/img/users_image'), $imageName);
                $data->image = $imageName;
            } else {
                $data->image = $data->image;
            }
        } else {
            if ($_FILES['image']['name']) {
                $image = $request->file('image');
                $imageName = date('YmdHis') . "OL" . rand(5, 10) . '.' . $request->image->getClientOriginalExtension();
                $request->image->move(('backend/img/users_image'), $imageName);
                $data->image = $imageName;
            }
        }

        if ($data->save()) {
            $notification = array(
                'message' => 'Profile picture updated successfully.',
                'alert-type' => 'success'
            );
            return redirect('portal/profile')->with($notification);
        } else {
            $notification = array(
                'message' => 'Sorry !!! Something went wrong, please try again.',
                'alert-type' => 'error'
            );
            return redirect()->back()->with($notification);
        }
    }
}
