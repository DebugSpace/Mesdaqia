<?php

use Illuminate\Http\Request;

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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

Route::post('register','Api\AuthController@register');
Route::post('login','Api\AuthController@login');
Route::post('logout','Api\AuthController@logout');
Route::get('updateAccountApi', 'Api\CommonController@UpdateAccount');
Route::post('addcarApi', 'Api\CommonController@addcar');
Route::post('addjeweleryApi','Api\CommonController@addjewelry');
Route::post('addpropertyApi','Api\CommonController@addproperty');
Route::post('CarSearch','Api\CommonController@CarSearch');//1
Route::post('CarSearchByPrice','Api\CommonController@CarSearchByPrice');//2
Route::post('CarSearchByModel','Api\CommonController@CarSearchByModel');//3
Route::post('CarSearchByStatus','Api\CommonController@CarSearchByStatus');//4
Route::post('addhighvalueApi','Api\CommonController@addhighvalue');
Route::post('addaddvichlesApi','Api\CommonController@addvichles');
Route::get('getcarApi', 'Api\CommonController@listCars');
Route::get('getMazadApi', 'Api\CommonController@ListMazadat');
Route::get('getJewelryApi', 'Api\CommonController@listjewelery');
Route::get('getpropApi', 'Api\CommonController@listproperty');
Route::get('getVichleApi', 'Api\CommonController@listvichle');
Route::get('getHighValueApi', 'Api\CommonController@listhighvalue');
Route::get('getCategoryApi', 'Api\CommonController@listCategory');
Route::group(['middleware' => 'auth:api'], function(){
Route::post('details', 'Api\CommonController@details');
});
Route::post('JewelrySearch','Api\CommonController@JewelrySearch'); /// from here 5
Route::post('JewelrySearchByPrice','Api\CommonController@JewelrySearchByPrice');//6
Route::post('JewelrySearchByMatrial','Api\CommonController@JewelrySearchByMatrial');//7
Route::post('JewelrySearchByGender','Api\CommonController@JewelrySearchByGender');//8
Route::post('HVSearch','Api\CommonController@HVSearch');//9
Route::post('HVSearchByPrice','Api\CommonController@HVSearchByPrice');//10
Route::post('HVSearchByname','Api\CommonController@HVSearchByname');//11
Route::post('PropertySearch','Api\CommonController@PropertySearch');//12
Route::post('PropertySearchByCity','Api\CommonController@PropertySearchByCity');//13
Route::post('PropertySearchByRental','Api\CommonController@PropertySearchByRental');//14
Route::post('PropertySearchByType','Api\CommonController@PropertySearchByType');//15
Route::post('PropertySearchByFurnished','Api\CommonController@PropertySearchByFurnished');//16
Route::post('PropertySearchByPrice','Api\CommonController@PropertySearchByPrice');//17
Route::post('PropertySearchBySize','Api\CommonController@PropertySearchBySize');//18
Route::post('VichleSearch','Api\CommonController@VichleSearch');//19
Route::post('VichleSearchByPrice','Api\CommonController@VichleSearchByPrice');//20
Route::post('VichleSearchByModel','Api\CommonController@VichleSearchByModel');//21
Route::post('VichleSearchByStatus','Api\CommonController@VichleSearchByStatus');//22
Route::post('Search','Api\CommonController@Search');

Route::group(['middleware' => ['auth:api','scope:user']],function(){

});