<?php

//use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::group(['middleware' => 'cors'], function(){
    Route::post('login', 'Api\AuthController@login');
    Route::post('refresh_token', 'Api\AuthController@refresh');

    Route::post('users', 'Api\UsersController@store');

    Route::group(['middleware' => ['jwt.auth', 'tenant']], function(){
        Route::post('logout', 'Api\AuthController@logout');
        Route::resource('categories', 'Api\CategoriesController', ['except' => ['create', 'edit']]);
        Route::get('bill_pays/total', 'Api\BillPaysController@calculateTotal');
        Route::resource('bill_pays', 'Api\BillPaysController', ['except' => ['create', 'edit']]);
        Route::resource('reservas', 'Api\ReservasController', ['except' => ['create', 'edit']]);
        Route::resource('inadimplentes', 'Api\InadimplentesController', ['except' => ['create', 'edit']]);
        Route::resource('areas_comuns', 'Api\AreaComumsController', ['except' => ['create', 'edit']]);
        Route::resource('tipo_areas', 'Api\TipoAreasController', ['except' => ['create', 'edit']]);
        Route::resource('area_pais', 'Api\AreaPaisController', ['except' => ['create', 'edit']]);
    });

});

