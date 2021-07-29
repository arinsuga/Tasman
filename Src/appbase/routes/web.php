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

    Route::get('/', function () {
        
        //return view('bo.index');
        return redirect()->route('home.index');

    })->name('bo');

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



}); //end 'middleware'=>'lang'


//event
//Route::resource('contact-form', 'ContactFormController');

//Default laravel welcome route
Route::get('/welcome', function () {
    return view('welcome');
});

//Default laravel home route
Route::get('/home', 'HomeController@index')->name('home');

//Default laravel auth route
Auth::routes();

