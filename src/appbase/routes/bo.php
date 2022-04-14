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

    //Tes
    Route::resource('ddd', 'All\DddController');

    //activity dashboard
    Route::resource('dashboard', 'Dashboard\DashboardController');
    //activity
    Route::resource('activity', 'Activity\ActivityController');

    //support
    Route::resource('support', 'Support\SupportController');
    Route::get('support-report-detail', 'Support\SupportController@reportDetail')->name('support.report.detail');

    Route::get('support/{close}/close', 'Support\SupportController@close')->name('support.close');
    Route::put('support/{close}/close', 'Support\SupportController@updateClose')->name('support.update.close');

    Route::get('support/{cancel}/cancel', 'Support\SupportController@cancel')->name('support.cancel');
    Route::put('support/{cancel}/cancel', 'Support\SupportController@updateCancel')->name('support.update.cancel');

    Route::get('support/{pending}/pending', 'Support\SupportController@pending')->name('support.pending');
    Route::put('support/{pending}/pending', 'Support\SupportController@updatePending')->name('support.update.pending');



    //maintenance
    Route::resource('maintenance', 'Maintenance\MaintenanceController');
    Route::get('maintenance/{close}/close', 'Maintenance\MaintenanceController@close')->name('maintenance.close');
    Route::put('maintenance/{close}/close', 'Maintenance\MaintenanceController@updateClose')->name('maintenance.update.close');

    Route::get('maintenance/{cancel}/cancel', 'Maintenance\MaintenanceController@cancel')->name('maintenance.cancel');
    Route::put('maintenance/{cancel}/cancel', 'Maintenance\MaintenanceController@updateCancel')->name('maintenance.update.cancel');

    Route::get('maintenance/{pending}/pending', 'Maintenance\MaintenanceController@pending')->name('maintenance.pending');
    Route::put('maintenance/{pending}/pending', 'Maintenance\MaintenanceController@updatePending')->name('maintenance.update.pending');

    //project
    Route::resource('project', 'Project\ProjectController');
    Route::get('project/{close}/close', 'Project\ProjectController@close')->name('project.close');
    Route::put('project/{close}/close', 'Project\ProjectController@updateClose')->name('project.update.close');

    Route::get('project/{cancel}/cancel', 'Project\ProjectController@cancel')->name('project.cancel');
    Route::put('project/{cancel}/cancel', 'Project\ProjectController@updateCancel')->name('project.update.cancel');

    Route::get('project/{pending}/pending', 'Project\ProjectController@pending')->name('project.pending');
    Route::put('project/{pending}/pending', 'Project\ProjectController@updatePending')->name('project.update.pending');

    //master
    Route::resource('mastercategory', 'Mastercategory\MastercategoryController');
    
    Route::resource('mastersubcategory', 'Mastersubcategory\MastersubcategoryController');
    Route::get('subcategory/{tasktype}', 'mastersubcategory\mastersubcategoryController@getJson')->name('subcategory.json');

    Route::resource('masteritem', 'Masteritem\MasteritemController');
    Route::get('item/{tasktype}/{tasksubtype1}', 'Masteritem\MasteritemController@getJson')->name('item.json');

    Route::resource('masterobjectmaintenance', 'Masterobjectmaintenance\MasterobjectmaintenanceController');
    Route::resource('masterproject', 'Masterproject\MasterprojectController');

    //employee
    Route::resource('employee', 'Employee\EmployeeController');

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
