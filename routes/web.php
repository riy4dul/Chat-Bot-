<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::match(['get', 'post'], '/botman', 'BotManController@handle');
Route::get('/botman/tinker', 'BotManController@tinker');
//Uzzal


Route::group(['namespace' => 'Backend'], function () {
    //login route
    Route::get('getLogin', 'LoginController@show');
    Route::post('login', 'LoginController@login');
    Route::group(['middleware' => 'auth'], function () {
        //logout
        Route::get('logout', 'LoginController@logout');
        Route::group(['middleware' => 'Admin'], function () {
            // dashboard route
            Route::get('portal/dashboard', 'DashboardController@index');
            //Profile Setting routes
            Route::get('portal/profile', 'ProfileSettingController@index');
            Route::get('portal/profile/editProfile', 'ProfileSettingController@editProfile');
            Route::post('portal/profile/update', 'ProfileSettingController@updateProfile');
            Route::get('portal/profile/editPassword', 'ProfileSettingController@editPassword');
            Route::post('portal/profile/updatePassword', 'ProfileSettingController@updatePassword');
            Route::post('portal/profile/picture-update', 'ProfileSettingController@pictureUpdate');
            //Brand routes
            Route::get('portal/brand/list', 'BrandController@show');
            Route::get('portal/brand/add', 'BrandController@add');
            Route::post('portal/brand/store', 'BrandController@store');
            Route::get('portal/brand/edit/{id}', 'BrandController@edit');
            Route::post('portal/brand/update', 'BrandController@update');
            Route::post('portal/brand/inActive', 'BrandController@inActive');
            Route::post('portal/brand/active', 'BrandController@active');
            //promotions routes
            Route::get('portal/promotions/list', 'PromotionsController@show');
            Route::get('portal/promotions/add', 'PromotionsController@add');
            Route::post('portal/promotions/store', 'PromotionsController@store');
            Route::get('portal/promotions/edit/{id}', 'PromotionsController@edit');
            Route::post('portal/promotions/update', 'PromotionsController@update');
            Route::post('portal/promotions/inActive', 'PromotionsController@inActive');
            Route::post('portal/promotions/active', 'PromotionsController@active');
            //promotions routes
            Route::get('portal/loan-info/list', 'LoanInformationController@show');
            Route::get('portal/loan-info/add', 'LoanInformationController@add');
            Route::post('portal/loan-info/store', 'LoanInformationController@store');
            Route::get('portal/loan-info/edit/{id}', 'LoanInformationController@edit');
            Route::post('portal/loan-info/update', 'LoanInformationController@update');
            Route::post('portal/loan-info/inActive', 'LoanInformationController@inActive');
            Route::post('portal/loan-info/active', 'LoanInformationController@active');
            //sales center address routes
            Route::get('portal/sales-center/list', 'SalesCenterAddressController@show');
            Route::get('portal/sales-center/add', 'SalesCenterAddressController@add');
            Route::post('portal/sales-center/store', 'SalesCenterAddressController@store');
            Route::get('portal/sales-center/edit/{id}', 'SalesCenterAddressController@edit');
            Route::post('portal/sales-center/update', 'SalesCenterAddressController@update');
            Route::post('portal/sales-center/inActive', 'SalesCenterAddressController@inActive');
            Route::post('portal/sales-center/active', 'SalesCenterAddressController@active');
            //sales center address routes
            Route::get('portal/spare-parts/list', 'SparePartsController@show');
            Route::get('portal/spare-parts/add', 'SparePartsController@add');
            Route::post('portal/spare-parts/store', 'SparePartsController@store');
            Route::get('portal/spare-parts/edit/{id}', 'SparePartsController@edit');
            Route::post('portal/spare-parts/update', 'SparePartsController@update');
            Route::post('portal/spare-parts/inActive', 'SparePartsController@inActive');
            Route::post('portal/spare-parts/active', 'SparePartsController@active');
             //Spare parts order
            Route::get('portal/spare_parts_order/list', 'SparePartsOrderController@show');
            Route::post('portal/spare_parts_orders/inActive', 'SparePartsOrderController@inActive');
            Route::post('portal/spare_parts_orders/active', 'SparePartsOrderController@active');
            Route::post('portal/spare_parts_orders/rejected', 'SparePartsOrderController@rejected');

            //delivery 
            Route::get('portal/delivery/list', 'DeliveryController@index');
            Route::get('portal/request/delivery/{id}', 'DeliveryController@requestDelivery');
            Route::post('portal/request/delivery/add', 'DeliveryController@requestDeliveryAdd');
            Route::get('portal/request/delivery/proceed/{id}', 'DeliveryController@deliveryProceed');

            //Payment
			
			Route::get('portal/payment/due', 'PaymentController@duePayments');
            /* Route::get('portal/payment/{id}', 'PaymentController@getPayment');
            Route::get('portal/payment', 'PaymentController@getPayment'); */
            

            Route::get('portal/request/delivery/payment/{id}', 'PaymentController@getPayment');
            Route::post('portal/request/delivery/payment/{id}', 'PaymentController@setPayment');

            //spare part Order Count
            Route::get('portal/sparePartOrderCount','SparePartsOrderController@sparePartOrderCount');

            Route::group(['namespace' => 'SystemSetting'], function () {
                Route::get('portal/systemSetting/brand/list', 'BrandController@show');
                Route::get('portal/systemSetting/brand/add', 'BrandController@add');
                Route::post('portal/systemSetting/brand/store', 'BrandController@store');
                Route::get('portal/systemSetting/brand/edit/{id}', 'BrandController@edit');
                Route::post('portal/systemSetting/brand/update', 'BrandController@update');
                Route::post('portal/systemSetting/brand/inActive', 'BrandController@inActive');
                Route::post('portal/systemSetting/brand/active', 'BrandController@active');
            });
        });

    });
});



