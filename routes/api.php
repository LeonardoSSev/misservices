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

Route::post('auth/login', 'AuthenticationController@check_login');
Route::get('auth/refresh', 'AuthenticationController@refresh_token');

Route::group(['middleware' => 'jwt.auth:api'], function(){
	Route::get('/auth/teste', function(){
		$user = JWTAuth::parseToken()->authenticate();
		return [
			'teste' => 'testado', 
			'dsad'  => $user
		];
	});
	Route::group(['prefix' => 'user'], function(){
		Route::get('/list/{id}', 'UserController@show');
	});

});



/*Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});*/




