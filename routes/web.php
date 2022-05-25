<?php

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
})->name('home');
Route::get('/charts', function () {
    return view('dashboard.charts');
});
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
Route::group(['middleware' => 'is_superadmin','middleware' => 'verified' ], function () {

    ////////////////////////// settings ///////////////////////////////////////////////////
    Route::get('/setting', function () {
        return view('dashboard.setting');
    })->name('superadmin');
  
    Route::get('/time_monitorings', function () {
        return view('dashboard.time_monitorings');
    });
    Route::get('/kolloko', function () {
        return view('dashboard.kolloko');
    });
    Route::get('/malit', function () {
        return view('dashboard.malit');
    });
    Route::get('/edit_design_file', function () {
        return view('dashboard.edit_design_file');
    });
    Route::get('/earn', function () {
        return view('dashboard.earn');
    });

  
    Route::get('/qr-koodit', function () {
        return view('dashboard.settings.qr-koodit');
    });

    Route::get('/terassisi-somet', function () {
        return view('dashboard.settings.terassisi-somet');
    });

    Route::get('/avainsanat', function () {
        return view('dashboard.settings.avainsanat');
    });

    Route::get('/widgetti', function () {
        return view('dashboard.settings.widgetti');
    });

    Route::get('/facebook-pixels', function () {
        return view('dashboard.settings.facebook-pixels');
    });

    Route::get('/google-analytics', function () {
        return view('dashboard.settings.google-analytics');
    });

    // Route::get('/widgetit', function () {
    //     return view('dashboard.settings.widgetit');
    // });

    Route::get('/tyuntekijaroolit', function () {
        return view('dashboard.settings.tyuntekijaroolit');
    });
    Route::get('/teams', function () {
        return view('dashboard.teams');
    });



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
    Route::get('/charts', function () {
        return view('dashboard.charts');
    })->name('superadmin');

    Route::get('/chart', function () {
        return view('dashboard.charts');
    });
    Route::get('/chats', function () {
        return view('dashboard.chats');
    });
    Route::get('/datatable', function () {
        return view('dashboard.datatable');
    });
    Route::get('/datatable2', function () {
        return view('dashboard.datatable2');
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

    Route::get('/vierailijat', function () {
        return view('dashboard.Vierailijat');
    });

    Route::get('/tablemap', function () {
        return view('dashboard.tablemap');
    });

    Route::get('/product', function () {
        return view('dashboard.product');
    });

    Route::get('/staff', function () {
        return view('dashboard.Staff');
    });

    Route::get('/kampjet', function () {
        return view('dashboard.kampjet');
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
    Route::get('/chats', function () {
        return view('dashboard.chats');
    });
    Route::get('/datatable', function () {
        return view('dashboard.datatable');
    });
    Route::get('/datatable2', function () {
        return view('dashboard.datatable2');
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

    Route::get('/vierailijat', function () {
        return view('dashboard.Vierailijat');
    });

    Route::get('/tablemap', function () {
        return view('dashboard.tablemap');
    });

    Route::get('/product', function () {
        return view('dashboard.product');
    });

    Route::get('/staff', function () {
        return view('dashboard.Staff');
    });

    Route::get('/kampjet', function () {
        return view('dashboard.kampjet');
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

    Route::get('/profile', function () {
        return view('profile.home');
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