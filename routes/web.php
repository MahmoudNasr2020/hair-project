<?php

use Illuminate\Support\Facades\Route;
use Spatie\Honeypot\ProtectAgainstSpam;

Route::group(['middleware' => 'auth'],

	function () {
		Route::any('logout', 'Auth\LoginController@logout')->name('web.logout');
	});

Route::group(['middleware'=>'SiteStatue'],function(){
	Route::get('/','Frontend\HomeController@index')->name('front.home');
	Route::get('/about','Frontend\AboutController@index')->name('front.about');
	Route::get('/blog','Frontend\BlogController@index')->name('front.blog');
	Route::get('/blog/{id}/{title?}','Frontend\BlogController@show')->name('front.blog.show');
	Route::get('/products','Frontend\ProductController@index')->name('front.products');
	Route::get('/products/{id}/{name?}','Frontend\ProductController@show')->name('front.product.show');
	Route::get('/contact','Frontend\ContactController@index')->name('front.contact');
	Route::post('/contact/store','Frontend\ContactController@store')->name('front.contact.store');
});

Route::get('/siteStatus',function(){
	return view('frontend.pages.status');
})->name('front.status')->middleware('OpenSite');

Route::middleware(ProtectAgainstSpam::class)->group(function () {
	Auth::routes(['verify' => true]);

});
