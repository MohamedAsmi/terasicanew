<?php

use App\Chat;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\HomeController;
use Illuminate\Support\Facades\Auth;
use App\Http\Controllers\Auth\LoginController;

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
    return view('user.home');
    // return view('auth.login');
});


Auth::routes(['verify' => true]);
Route::get('/home', function () { 
    return view('user.home');
});

////////////////////////////////////////////////////////////////////////////////////////////////////
Route::get('/chats', 'SuperAdmin\ChatsController@index');//viestit
Route::post('/storeChat', 'SuperAdmin\ChatsController@store')->name("store.Chat");
Route::get('/chatmap/{id}', 'SuperAdmin\ChatsController@list')->name("store.Chat");



// Route::get('/charts', function () {
//     return view('dashboard.charts');
// })->name('home');
// Route::get('superadmin/home', [HomeController::class, 'superadminHome'])->name('superadmin.home')->middleware('is_superadmin');
// Route::get('admin/home', [HomeController::class, 'adminHome'])->name('admin.home')->middleware('is_admin');

//   Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
//     Route::get('email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
//     Route::post('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');

Route::get('email/resend', 'Auth\VerificationController@resend')->name('verification.resend');
Route::get('email/verify', 'Auth\VerificationController@show')->name('verification.notice');
Route::get('/email/verify/{id}', 'Auth\VerificationController@verify')->name('verification.verify');
////////////////////////////////////////////////////////////////////////////////////////
Route::get('login/google', 'auth\LoginController@googleLogin')->name('login.google');
Route::get('login/google/callback', 'auth\LoginController@googleCallback');
//////////////////////////////////google login/////////////////////////////////////////

////////////////////////////////////////////////////////////////////////////////////////
Route::get('login/facebook', 'auth\LoginController@facebookLogin')->name('login.facebook');
Route::get('login/facebook/callback', 'auth\LoginController@facebookCallback');
//////////////////////////////////facebook login/////////////////////////////////////////

///////////////////////////////////////////////////////////////////////////////////////////////////

Route::group(['middleware' => 'auth', 'middleware'=>'verified'], function () {
    
    Route::get('/Super-Admin-Profile', 'SuperAdmin\ControlPanelController@index')->name('superadmin');


    Route::get('/Orders', 'SuperAdmin\OrderController@index');
    Route::get('/Reservations', 'SuperAdmin\ReservationController@index');
    Route::get('/Campaigns', 'SuperAdmin\CampaignController@index');
    Route::get('/Products', 'SuperAdmin\ProductController@index');
    Route::get('/Employees','SuperAdmin\EmployeeController@index');
    Route::get('/Analytics', 'SuperAdmin\AnalyticController@index');
    Route::get('/earn', 'SuperAdmin\EarnController@index');
    Route::get('/tablemap', 'SuperAdmin\TableMapController@index');


    Route::get('/tem', function(){
        return view('emailTamplate');
    });

    // datatable
    Route::get('/tablemap', 'SuperAdmin\ReservationController@list')->name('reservation.list');

    // Employee List
    Route::get('/employeetablemap', 'SuperAdmin\EmployeeController@list')->name('employee.list');
    Route::get('/employee/delete/{id}','SuperAdmin\EmployeeController@destroy')->name('delete.employee');

    //add employee 
    Route::post('/employee/store','SuperAdmin\EmployeeController@store')->name('store.employee');

    Route::put('/tablemap', 'SuperAdmin\ReservationController@list')->name('reservation.edit');
    Route::put('/tablemapdelete', 'SuperAdmin\ReservationController@delete')->name('reservation.delete');

    //edit employee 
    Route::post('/employee/edit','SuperAdmin\EmployeeController@edit')->name('edit.employee');

    Route::get('/edit_design_file', function () {
        return view('superadmin.edit_design_file');
    });
    
    
   

    


    
    ////////////////////////// settings ///////////////////////////////////////////////////

    Route::get('/qr-koodit', function () {
        return view('superadmin.settings.qr-koodit');
    });

    Route::get('/terassisi-somet', function () {
        return view('superadmin.settings.terassisi-somet');
    });

    Route::get('/avainsanat', function () {
        return view('superadmin.settings.avainsanat');
    });

    Route::get('/widgetti', function () {
        return view('superadmin.settings.widgetti');
    });

    Route::get('/facebook-pixels', function () {
        return view('superadmin.settings.facebook-pixels');
    });

    Route::get('/google-analytics', function () {
        return view('superadmin.settings.google-analytics');
    });

    Route::get('/tyuntekijaroolit', function () {
        return view('superadmin.settings.tyuntekijaroolit');
    });
    Route::get('/malit', function () {
        return view('superadmin.settings.malit');
    });
    Route::get('/kolloko', function () {
        return view('superadmin.settings.kolloko');
    });
    
    Route::get('/time_monitorings', function () {
        return view('superadmin.settings.time_monitorings');
    });
    Route::get('/teams', function () {
        return view('superadmin.settings.teams');
    });





    Route::get('/profile', function () {
        return view('profile.home');
    });//Hallintapaneeli
    
    Route::get('/todo', function () {
        return view('dashboard.todo');
    });//order view

    

   
    
    
    
    

  
    


    //////////////////////////////////////////////////
    Route::get('/addnewcategory', function () {
        return view('dashboard.add_new_category');
    });
    Route::get('/editnewcategory', function () {
        return view('dashboard.add_new_category_edit');
    });
    Route::get('/summary-checkout', function () {
        return view('user_view.summary-checkout');
    });
    

    Route::get('/chart', function () {
        return view('dashboard.charts');
    });
    
    
   
    Route::get('/order_semmary', function () {
        return view('dashboard.order_summery_client');
    });
    Route::get('/order_semmary_merchain', function () {
        return view('dashboard.order_summery_merchain');
    });
    
  

 
    

    
});
///////////////////////////////////////Super Admin Route/////////////////////////////////////////////////



//////////////////////////////////////////////////////////////////////////////////////////////////
Route::group(['middleware' => 'is_admin' ,'middleware' => 'verified'], function () {

    Route::get('/addnewcategory', function () {
        return view('dashboard.add_new_category');
    });
    Route::get('/editnewcategory', function () {
        return view('dashboard.add_new_category_edit');
    });
    Route::get('/summary-checkout', function () {
        return view('user_view.summary-checkout');
    });
    Route::get('/charts', function () {
        return view('dashboard.charts');
    })->name('adminHome');

    Route::get('/chart', function () {
        return view('dashboard.charts');
    });

  
   
    Route::get('/order_semmary', function () {
        return view('dashboard.order_summery_client');
    });
    Route::get('/order_semmary_merchain', function () {
        return view('dashboard.order_summery_merchain');
    });
    Route::get('/todo', function () {
        return view('dashboard.todo');
    });

   




  
});
//////////////////////////////////////Admin Route/////////////////////////////////////////////


//////////////////////////////////////User Route////////////////////////////////////////////////////
Route::group(['middleware' => 'is_user' ,'middleware' => 'verified'], function () {
    Route::get('/home2', function () {
        return view('user.home2');
        // return view('user_view.home');
    })->name('userhome');
    Route::get('/home3', function () {
        return view('user.home3');
        // return view('user_view.home');
    });
    Route::get('/home4', function () {
        return view('user.home4');
        // return view('user_view.home');
    });

   
    Route::get('/frame', function () {
        return view('profile.frame');
        // return view('user_view.home');
    });
    Route::get('/suncoin', function () {
        return view('profile.suncoin');
        // return view('user_view.home');
    });
    Route::get('/add-promo', function () {
        return view('profile.add-promo');
        // return view('user_view.home');
    });

    Route::get('/profile-page-setting', function () {
        return view('profile.profile-page-setting');
        // return view('user_view.home');
    });


    Route::get('/category-page', function () {
        return view('user_view.categorypage');
    });
    // ////////////////////// subscription ///////////////////////////////////////////////
    Route::get('/subscription', function () {
        return view('subscription.index');
    });
    Route::get('/subscription/create-account', function () {
        return view('subscription.index');
    });
    Route::get('/subscription/confirm-information', function () {
        return view('subscription.index');
    });
    Route::get('/subscription/payment-information', function () {
        return view('subscription.index');
    });
    Route::get('/subscription/summary', function () {
        return view('subscription.index');
    });
});
///////////////////////////////////////////////////////////////////////////////////////////////////