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

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');


Route::resource('admin-dashboard','AdminHomeController',['names'=>[

    'index'=>'admin.dashboard.index',
    'create'=>'admin.dashboard.create',
    'store'=>'admin.dashboard.store',
    'edit'=>'admin.dashboard.edit'


]]);




Route::resource('public-pre-enlistment','EnlistmentController')->except('create');

Route::get('public/enlistment-form','EnlistmentController@create')->name('public.enlistment.create');
