<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\Storage;
Use App\Category;
Use App\Tag;
Use App\Post;
Use App\Setting;
Use App\Link;
// ------------------------------------------------------------------------------------------------------------
Route::resource('siswas', 'SiswaController');
Route::resource('guru', 'GuruController');
Route::get('siswas/dashboard/siswa', 'SiswaController@dashboard');
Route::get('siswas/export/excel', 'SiswaController@export');
Route::get('siswas/export/pdf', 'SiswaController@exportPdf');
Route::post('siswas/{id}/addNilai', 'SiswaController@addNilai');
Route::delete('/siswas/{siswa_id}/{mapel_id}/hapus', 'SiswaController@hapus');
// ------------------------------------------------------------------------------------------------------------


// ------------------------------------------------------------------------------------------------------------
Route::get('/', 'FrontendController@index')->name('index');
Route::get('single/{slug}', 'FrontendController@single')->name('single');
Route::get('categories/{id}', 'FrontendController@categories')->name('categories');
Route::get('tags/{id}', 'FrontendController@tags')->name('tags');
Route::get('result', function(){
	$post = Post::where('title', 'LIKE', '%'.request('cari').'%')->get();
	return view('result')
		->with('posts', $post)
		->with('categories', Category::take(5)->get())
		->with('title', request('cari'))
		->with('setting', Setting::first())
		->with('tags', Tag::all());
})->name('result');


Route::prefix('admin')
	
	->group(function(){
	Route::resource('posts', 'PostController');
	Route::resource('categories', 'CategoriesController');
	Route::resource('tags', 'TagsController');
	Route::resource('users', 'UsersController');
	Route::resource('profiles', 'ProfilesController');
	//----------------------------------------------------
	Route::get('/dashboard', 'HomeController@index')->name('dashboard');
	Route::get('/getdata', 'HomeController@getData')->name('getdata');
	Route::get('trashed', 'PostController@trashed')->name('kotak');
	Route::delete('delete/permanen/{id}', 'PostController@deletePermanen')->name('delete-permanen');
	Route::get('restore/{id}', 'PostController@restore')->name('restore');
	Route::post('user-admin/{id}', 'UsersController@admin')->name('user-admin');
	Route::get('user-notadmin/{id}', 'UsersController@notadmin')->name('user-not-admin');
	Route::get('user-data', 'UsersController@getdata')->name('user.getdata');
	Route::get('settings', 'SettingController@index')
				->name('settings')
				->middleware(['admin']);
	Route::get('settings/update/{setting}', 'SettingController@update')
				->name('settings-update')
				->middleware(['admin']);
});
// ------------------------------------------------------------------------------------------------------------
Auth::routes(['verify' => true]);


