<?php
use Illuminate\Support\Facades\Route;

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
// your api is integerated but if you want reintegrate no problem
// to configure jwt-auth visit this link https://jwt-auth.readthedocs.io/en/docs/

Route::group(['middleware' => ['ApiLang', 'cors'], 'prefix' => 'v1', 'namespace' => 'Api\V1'], function () {

	Route::get('/', function () {

	});
	// Insert your Api Here Start //
	Route::group(['middleware' => 'guest'], function () {
		Route::post('login', 'Auth\AuthAndLogin@login')->name('api.login');
		Route::post('register', 'Auth\Register@register')->name('api.register');
	});

	Route::group(['middleware' => 'auth:api'], function () {
		Route::get('account', 'Auth\AuthAndLogin@account')->name('api.account');
		Route::post('logout', 'Auth\AuthAndLogin@logout')->name('api.logout');
		Route::post('refresh', 'Auth\AuthAndLogin@refresh')->name('api.refresh');
		Route::post('me', 'Auth\AuthAndLogin@me')->name('api.me');
		Route::post('change/password', 'Auth\AuthAndLogin@change_password')->name('api.change_password');
		//Auth-Api-Start//
		Route::apiResource("products","ProductsApi", ["as" => "api.products"]); 
			Route::post("products/multi_delete","ProductsApi@multi_delete"); 
			Route::apiResource("sliders","SlidersApi", ["as" => "api.sliders"]); 
			Route::post("sliders/multi_delete","SlidersApi@multi_delete"); 
			Route::apiResource("blogs","BlogsApi", ["as" => "api.blogs"]); 
			Route::post("blogs/multi_delete","BlogsApi@multi_delete"); 
			Route::apiResource("about","AboutApi", ["as" => "api.about"]); 
			Route::post("about/multi_delete","AboutApi@multi_delete"); 
			Route::apiResource("abouts","AboutsApi", ["as" => "api.abouts"]); 
			Route::post("abouts/multi_delete","AboutsApi@multi_delete"); 
			Route::post("abouts/upload/multi","AboutsApi@multi_upload"); 
			Route::post("abouts/delete/file","AboutsApi@delete_file"); 
			Route::apiResource("softs","SoftsApi", ["as" => "api.softs"]); 
			Route::post("softs/multi_delete","SoftsApi@multi_delete"); 
			Route::post("softs/upload/multi","SoftsApi@multi_upload"); 
			Route::post("softs/delete/file","SoftsApi@delete_file"); 
			Route::apiResource("services","ServicesApi", ["as" => "api.services"]); 
			Route::post("services/multi_delete","ServicesApi@multi_delete"); 
			Route::apiResource("clients","ClientsApi", ["as" => "api.clients"]); 
			Route::post("clients/multi_delete","ClientsApi@multi_delete"); 
			Route::apiResource("statistics","StatisticsApi", ["as" => "api.statistics"]); 
			Route::post("statistics/multi_delete","StatisticsApi@multi_delete"); 
			Route::apiResource("contacts","ContactsApi", ["as" => "api.contacts"]); 
			Route::post("contacts/multi_delete","ContactsApi@multi_delete"); 
			//Auth-Api-End//
	});
	// Insert your Api Here End //
});