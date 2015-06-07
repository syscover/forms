<?php
/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can any all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get(config('pulsar.appName') . '/forms/forms/init/form/{id}',                            ['as'=>'initFormsForm',         'uses'=>'Syscover\Forms\Controllers\Forms@initForm']);
Route::post(config('pulsar.appName') . '/forms/records/record/form',                            ['as'=>'recordFormsRecord',     'uses'=>'Syscover\Forms\Controllers\Records@recordForm']);


Route::group(['middleware' => ['auth.pulsar','permission.pulsar','locale.pulsar']], function() {

    /*
    |--------------------------------------------------------------------------
    | RECORDS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/forms/records/{ref}/{offset?}',                          ['as'=>'FormsRecord',                   'uses'=>'Syscover\Forms\Controllers\Records@index',                      'resource' => 'forms-record',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/forms/records/json/data/{ref}',                          ['as'=>'jsonDataFormsRecord',           'uses'=>'Syscover\Forms\Controllers\Records@jsonData',                   'resource' => 'forms-record',        'action' => 'access']);

    //Route::get(config('pulsar.appName') . '/forms/records/create/{ref}/{offset}',                    ['as'=>'createFormsRecord',             'uses'=>'Syscover\Forms\Controllers\Records@createRecord',               'resource' => 'forms-record',        'action' => 'create']);
    //Route::post(config('pulsar.appName') . '/forms/records/store/{ref}/{offset}',                    ['as'=>'storeFormsRecord',              'uses'=>'Syscover\Forms\Controllers\Records@storeRecord',                'resource' => 'forms-record',        'action' => 'create']);
    //Route::get(config('pulsar.appName') . '/forms/records/{ref}/{id}/edit/{offset}',                 ['as'=>'editFormsRecord',               'uses'=>'Syscover\Forms\Controllers\Records@editRecord',                 'resource' => 'forms-record',        'action' => 'access']);
    //Route::put(config('pulsar.appName') . '/forms/records/update/{ref}/{id}/{offset}',               ['as'=>'updateFormsRecord',             'uses'=>'Syscover\Forms\Controllers\Records@updateRecord',               'resource' => 'forms-record',        'action' => 'edit']);

    Route::get(config('pulsar.appName') . '/forms/records/delete/{id}/{ref}/{offset}',               ['as'=>'deleteFormsRecord',             'uses'=>'Syscover\Forms\Controllers\Records@deleteRecord',               'resource' => 'forms-record',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/forms/records/delete/select/records/{ref}',           ['as'=>'deleteSelectFormsRecord',       'uses'=>'Syscover\Forms\Controllers\Records@deleteRecordsSelect',        'resource' => 'forms-record',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | FORMS
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/forms/forms/{offset?}',                          ['as'=>'FormsForm',                   'uses'=>'Syscover\Forms\Controllers\Forms@index',                      'resource' => 'forms-form',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/forms/forms/json/data',                          ['as'=>'jsonDataFormsForm',           'uses'=>'Syscover\Forms\Controllers\Forms@jsonData',                   'resource' => 'forms-form',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/forms/forms/create/{offset}',                    ['as'=>'createFormsForm',             'uses'=>'Syscover\Forms\Controllers\Forms@createRecord',               'resource' => 'forms-form',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/forms/forms/store/{offset}',                    ['as'=>'storeFormsForm',              'uses'=>'Syscover\Forms\Controllers\Forms@storeRecord',                'resource' => 'forms-form',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/forms/forms/{id}/edit/{offset}',                 ['as'=>'editFormsForm',               'uses'=>'Syscover\Forms\Controllers\Forms@editRecord',                 'resource' => 'forms-form',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/forms/forms/update/{id}/{offset}',               ['as'=>'updateFormsForm',             'uses'=>'Syscover\Forms\Controllers\Forms@updateRecord',               'resource' => 'forms-form',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/forms/forms/delete/{id}/{offset}',               ['as'=>'deleteFormsForm',             'uses'=>'Syscover\Forms\Controllers\Forms@deleteRecord',               'resource' => 'forms-form',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/forms/forms/delete/select/records',           ['as'=>'deleteSelectFormsForm',       'uses'=>'Syscover\Forms\Controllers\Forms@deleteRecordsSelect',        'resource' => 'forms-form',        'action' => 'delete']);


    /*
    |--------------------------------------------------------------------------
    | STATES
    |--------------------------------------------------------------------------
    */
    Route::any(config('pulsar.appName') . '/forms/states/{offset?}',                          ['as'=>'FormsState',                   'uses'=>'Syscover\Forms\Controllers\States@index',                      'resource' => 'forms-state',        'action' => 'access']);
    Route::any(config('pulsar.appName') . '/forms/states/json/data',                          ['as'=>'jsonDataFormsState',           'uses'=>'Syscover\Forms\Controllers\States@jsonData',                   'resource' => 'forms-state',        'action' => 'access']);
    Route::get(config('pulsar.appName') . '/forms/states/create/{offset}',                    ['as'=>'createFormsState',             'uses'=>'Syscover\Forms\Controllers\States@createRecord',               'resource' => 'forms-state',        'action' => 'create']);
    Route::post(config('pulsar.appName') . '/forms/states/store/{offset}',                    ['as'=>'storeFormsState',              'uses'=>'Syscover\Forms\Controllers\States@storeRecord',                'resource' => 'forms-state',        'action' => 'create']);
    Route::get(config('pulsar.appName') . '/forms/states/{id}/edit/{offset}',                 ['as'=>'editFormsState',               'uses'=>'Syscover\Forms\Controllers\States@editRecord',                 'resource' => 'forms-state',        'action' => 'access']);
    Route::put(config('pulsar.appName') . '/forms/states/update/{id}/{offset}',               ['as'=>'updateFormsState',             'uses'=>'Syscover\Forms\Controllers\States@updateRecord',               'resource' => 'forms-state',        'action' => 'edit']);
    Route::get(config('pulsar.appName') . '/forms/states/delete/{id}/{offset}',               ['as'=>'deleteFormsState',             'uses'=>'Syscover\Forms\Controllers\States@deleteRecord',               'resource' => 'forms-state',        'action' => 'delete']);
    Route::delete(config('pulsar.appName') . '/forms/states/delete/select/records',           ['as'=>'deleteSelectFormsState',       'uses'=>'Syscover\Forms\Controllers\States@deleteRecordsSelect',        'resource' => 'forms-state',        'action' => 'delete']);

});