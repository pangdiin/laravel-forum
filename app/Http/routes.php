<?php


Route::get('/',[
	'as' => 'home',
	'uses'=>'PagesController@home'
	]);

Route::group(['prefix'=>'auth'], function() {

	Route::get('register',[
			'as'=>'get_register',
			'uses'=>'UserController@getRegister'
			]);

	Route::post('register',[
		'as'=>'post_register',
		'uses'=>'UserController@postRegister'
		]);

	Route::get('login',[
		'as'=>'get_login',
		'uses'=>'UserController@getLogin'
		]);

	Route::post('login',[
		'as'=>'post_login',
		'uses'=>'UserController@postLogin'
		]);

	Route::get('logout',[
		'as'=>'get_logout',
		'uses'=>'UserController@getLogout'
		]);
});


Route::group(['prefix'=>'question'], function() {

	Route::get('post',[
		'as'=>'get_post',
		'uses'=>'ForumController@getPost'
		]);

	Route::post('post',[
		'as'=>'post_question',
		'uses'=>'ForumController@postQuestion'
		]);

	Route::delete('delete/{id}',[
		'as'=>'delete_question',
		'uses'=>'ForumController@deleteQuestion'
		]);

	Route::delete('delete-reply/{id}',[
		'as'=>'delete_reply',
		'uses'=>'ForumController@deleteReply'
		]);

	Route::get('{slug}',[
		'as'=>'view_post',
		'uses'=>'ForumController@viewPost'
		]);

	Route::post('reply',[
		'as'=>'save_reply',
		'uses'=>'ForumController@saveReply'
		]);
});


