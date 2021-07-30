<?php

/*
|--------------------------------------------------------------------------
| BO Routes
|--------------------------------------------------------------------------
|
| Here is where you can register BO routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

/** route group without prefix */
Route::group(['middleware'=>'lang'],function ()
{
    
    //Change Language
    Route::get('changelang/{lang}', function($lang){

        $setLang = 'en';
        if ( ($lang == null) || ($lang == '') ) {
            $setLang = 'en';
        } elseif ($lang == 'en') {
            $setLang = 'id';
        } else {
            $setLang = 'en';
        }

        \Session::put('lang',$setLang);

        return redirect()->back();
    })->name('change.lang');

    //Home
//    Route::resource('home', 'Home\HomeController');
    Route::get('/', 'Home\HomeController@index')->name('home.index');
    //activity
    Route::resource('activity', 'Activity\ActivityController');

    //404 - Not Found
    Route::fallback(function () {

        abort(404, 'Not Found.');
        // return '<h1>Not Found</h1>';
    });

}); //end route group 'middleware'=>'lang'


/** route prefix admin */
Route::prefix('admin')->group(function () {

    Route::get('/', function () {
        
        //return view('bo.index');
        return '<H1>ADMIN PAGE</H1>';

    })->name('admin');

    //All
    Route::resource('all', 'All\AllController');
    //UserAuth
    Route::get('AuthAdmin/login','AuthAdmin\UserController@showLoginForm')->name('AuthAdmin.login');
    Route::post('AuthAdmin/login','AuthAdmin\UserController@login');
    Route::post('AuthAdmin/logout','AuthAdmin\UserController@logout')->name('AuthAdmin.logout');
    //UserAdmin
    Route::get('UserAdmin/{UserAdmin}/delete','UserAdmin\UserController@delete')->name('UserAdmin.delete');
    Route::resource('UserAdmin', 'UserAdmin\UserController');
    //User
    Route::resource('user', 'User\UserController');
    //Home
    Route::resource('home', 'Home\HomeController');
    //productsubtype
    Route::resource('productsubtype', 'Productsubtype\ProductsubtypeController');
    //product
    Route::resource('product', 'Product\ProductController');
    //event
    Route::resource('event', 'Event\EventController');
    //news
    Route::resource('news', 'News\NewsController');

    //404 - Not Found
    Route::fallback(function () {

        abort(404, 'Not Found.');
        // return '<h1>Not Found</h1>';
    });

}); //end route prefix bo
