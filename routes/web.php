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

Route::group(['prefix' => 'admin', 'middleware' => 'admin'], function()
{
    CRUD::resource('gempabumi', 'Admin\GempabumiCrudController');
    CRUD::resource('summary', 'Admin\SummaryCrudController');
    CRUD::resource('komponenh', 'Admin\KomponenhCrudController');
    CRUD::resource('cgplus', 'Admin\CgplusCrudController');
    CRUD::resource('cgminus', 'Admin\CgminusCrudController');
    CRUD::resource('spm', 'Admin\SpmCrudController');
    CRUD::resource('hujan', 'Admin\HujanCrudController');
    CRUD::resource('komponend', 'Admin\KomponendCrudController');
    CRUD::resource('komponeni', 'Admin\KomponeniCrudController');
    CRUD::resource('komponenz', 'Admin\KomponenzCrudController');
    Route::get('/import/gempabumi', function(){
        return view('gempabumi.importgempa');
    });
    Route::post('/import/gempabumi/excel', [
            'as' => 'import.gempabumi',
            'uses' => 'Admin\GempabumiCrudController@importExcel'
        ]);
  
});
