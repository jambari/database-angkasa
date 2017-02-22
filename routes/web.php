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
    Route::group(['prefix' => 'pengamatan'], function(){
            //GEMPABUMI
        CRUD::resource('gempabumi', 'Admin\GempabumiCrudController');
        //MAGNETBUMI
        CRUD::resource('komponen-h', 'Admin\KomponenhCrudController');
        CRUD::resource('komponen-d', 'Admin\KomponendCrudController');
        CRUD::resource('komponen-i', 'Admin\KomponeniCrudController');
        CRUD::resource('komponen-z', 'Admin\KomponenzCrudController');
        CRUD::resource('komponen-f', 'Admin\KomponenfCrudController');
        CRUD::resource('k-index', 'Admin\KindexCrudController');
        CRUD::resource('prekursor', 'Admin\PrekursorCrudController');
        CRUD::resource('absolut', 'Admin\AbsolutCrudController');
        //LD
        CRUD::resource('summary', 'Admin\SummaryCrudController');
        CRUD::resource('cgplus', 'Admin\CgplusCrudController');
        CRUD::resource('cgminus', 'Admin\CgminusCrudController');
        CRUD::resource('sambaran', 'Admin\CegeCrudController');

        //KU
        CRUD::resource('spm', 'Admin\SpmCrudController');
        CRUD::resource('hujan', 'Admin\HujanCrudController');

        // IMPORT DATA
        // Import data gempabumi
        Route::get('/import/gempabumi', function(){
            return view('gempabumi.importgempa');
        });
        Route::post('/import/gempabumi/excel', [
            'as' => 'import.gempabumi',
            'uses' => 'Admin\GempabumiCrudController@importExcel'
        ]);

        //Import data magnetbumi
        Route::get('/import/magnetbumi', function(){
            return view('magnetbumi.importmagnetbumi');
        });
        Route::post('/import/magnetbumi/excel', [
            'as' => 'import.magnetbumi',
            'uses' => 'MagnetbumiController@importExcel'
        ]);

        //Jadwal SPM
        CRUD::resource('jadwal-spm', 'Admin\JadwalspmCrudController');
        //Jadwal KAH
        CRUD::resource('jadwal-kah', 'Admin\JadwalkahCrudController');
        //CHECK LIST
        CRUD::resource('checklist-accelerograph', 'Admin\ChecklistacceCrudController');
    });
});
