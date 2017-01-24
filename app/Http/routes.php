<?php

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

Route::get('/', 'PostController@index');
/*
Route::get('/auth', function() {
	//força entrada login do usuario
	//$user = \App\User::find(2);
	//Auth::login($user);
	//if(Auth::check()){
	//	return 'Validado!';
	//}
	
	if(Auth::attempt(['email'=>'evandro@evandro.com', 'password'=>123456])){
		return 'Validado!';
	} else {
		return 'Falhou!';
	}
	
});
*/

// Pode ser trocado tudo isso por Route::controllers([..
//Route::get('auth/login', 'Auth\AuthController@getLogin');
//Route::post('auth/login', 'Auth\AuthController@postLogin');
//Route::get('auth/logout', 'Auth\AuthController@getLogout');
Route::controllers([
		'auth' => 'Auth\AuthController',
		'password' => 'Auth\PasswordController',
]);


/*
Route::get('/auth/logout', function () {
	Auth::logout();
});
*/

Route::group(['prefix'=>'admin', 'middleware'=>'auth'], function(){	
	Route::group(['prefix'=>'posts'], function(){
		
		Route::get('', ['as' => 'admin.posts.index', 'uses'=>'PostAdminController@index']);		
		Route::get('create', ['as' => 'admin.posts.create', 'uses'=>'PostAdminController@create']);	
		Route::post('store', ['as' => 'admin.posts.store', 'uses'=>'PostAdminController@store']);	
		Route::get('edit/{id}', ['as' => 'admin.posts.edit', 'uses'=>'PostAdminController@edit']);		
		Route::put('update/{id}', ['as' => 'admin.posts.update', 'uses'=>'PostAdminController@update']);		
		Route::get('destroy/{id}', ['as' => 'admin.posts.destroy', 'uses'=>'PostAdminController@destroy']);
		
	});		
});

