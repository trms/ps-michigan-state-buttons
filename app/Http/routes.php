<?php

namespace Http;

use App\Button;
use App\ButtonBar;
use App\RDA\RDA;
use Illuminate\Http\Request;
use \Route;

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




Route::get('triggerVideo', ['as'=>'triggerVideo',function(Request $request)
{
	$button = Button::find($request->input('buttonId'));

	$RDA = new RDA(config('RDA.user'),config('RDA.password'),config('RDA.server'));

	$RDA->setBulletinGuids($button->bulletin_GUID);

	$RDA->setWeekdays();

	$RDA->isExclusiveAlert(true);

	$RDA->UpdatePage();

	return $RDA->getLastError();

}]);

Route::get('cancelVideos',['as'=>'cancelVideos',function(Request $request)
{
	$buttonBar = ButtonBar::find($request->input('buttonBarId'));

	$RDA = new RDA(config('RDA.user'),config('RDA.password'),config('RDA.server'));

	$RDA->setBulletinGuids($buttonBar->bulletins());

	$RDA->setWeekdays('');

	$RDA->UpdatePage();

	return $RDA->getLastError();

}]);

Route::group(['prefix'=>'admin','middleware'=>'auth'],function(){
	Route::get('/',['uses'=>'ButtonBarController@index','as'=>'admin.index']);
	Route::resource('buttonBar','ButtonBarController');
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



Route::get('/{title?}', function ($title=null) 
{

	$buttonBar = $title
		? ButtonBar::where('title','=',$title)->first()
		: ButtonBar::first();

	if(!$buttonBar) return 'There is no bulletin bar with that title';

	$marginLeft =  (100 - ($buttonBar->buttons->count() * 15))/ $buttonBar->buttons->count();

    return view('buttons')->with(['buttonBar'=>$buttonBar,'marginLeft'=>$marginLeft ]);
});