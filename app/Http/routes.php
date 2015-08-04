<?php

use App\Button;
use App\RDA\RDA;
use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () 
{

	$buttons = Button::orderBy('order')->get();

	$marginLeft =  (100 - ($buttons->count() * 7))/ $buttons->count();

    return view('buttons')->with(['buttons'=>$buttons,'marginLeft'=>$marginLeft ]);
});


Route::get('triggerVideo', ['as'=>'triggerVideo',function(Request $request)
{
	$button = Button::find($request->input('button'));

	$RDA = new RDA(config('RDA.user'),config('RDA.password'),config('RDA.server'));

	$RDA->setBulletinTags($button->tag);

	$RDA->setWeekdays();

	$RDA->UpdatePage();

	sleep($button->length+3);

	$RDA->setWeekdays('');

	$RDA->UpdatePage();

	return $RDA->getLastError();

}]);

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::resource('/','ButtonController@index');
	Route::resource('button','ButtonController');
	Route::resource('users','UserController');
});


Route::get('auth/login', 'Auth\AuthController@getLogin');
Route::post('auth/login', 'Auth\AuthController@postLogin');
Route::get('auth/logout', 'Auth\AuthController@getLogout');

// Password reset link request routes...
Route::get('password/email', 'Auth\PasswordController@getEmail');
Route::post('password/email', 'Auth\PasswordController@postEmail');

// Password reset routes...
Route::get('password/reset/{token}', 'Auth\PasswordController@getReset');
Route::post('password/reset', 'Auth\PasswordController@postReset');