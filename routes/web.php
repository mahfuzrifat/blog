<?php

 
Route::get('/','HomeController@index')->name('home');

 Auth::routes();

Route::post('/subscriber', 'SubscriberController@store')->name('subscriber.store');
Route::get('post-details/{id}','PostController@view')->name('post.details');
Route::get('posts','PostController@all')->name('all.post');
Route::get('category/{id}','PostController@postByCategory')->name('category.posts');
Route::get('tag/{id}','PostController@postByTag')->name('tag.posts');
Route::get('/search','SearchController@search')->name('search');
Route::get('/{user_name}','AuthorController@profile')->name('author.profile');

Route::group(['middleware' => 'auth'], function () {
    Route::get('favorite/{post}/add','FavoriteController@add')->name('post.favorite');
    Route::post('comment/{post}','CommentController@store')->name('comment.store');
});

Route::group(['as'=>'admin.','prefix' => 'admin','namespace'=>'Admin','middleware'=>['auth','admin']], function() {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    //======== tag route ====================================================//
    Route::get('tag','TagController@index')->name('tag.index');
    Route::get('tag/create','TagController@create')->name('tag.create');
    Route::post('tag','TagController@store')->name('tag.store');
    Route::get('tag/{id}/edit','TagController@edit')->name('tag.edit');
    Route::get('tag/{id}','TagController@destroy')->name('tag.destroy');
    Route::post('tag/{id}','TagController@update')->name('tag.update');
    //======== Category route ===============================================//
    Route::get('category','CategoryController@index')->name('category.index');
    Route::get('category/create','CategoryController@create')->name('category.create');
    Route::post('category','CategoryController@store')->name('category.store');
    Route::get('category/{id}','CategoryController@destroy')->name('category.destroy');
    Route::get('category/{id}/edit','CategoryController@edit')->name('category.edit');
    Route::post('category/{id}','CategoryController@update')->name('category.update');
    //======== Post Route ===================================================//
    Route::get('post','PostController@index')->name('post.index');
    Route::get('post/create','PostController@create')->name('post.create');
    Route::post('post','PostController@store')->name('post.store');
    Route::get('post/{id}/edit','PostController@edit')->name('post.edit');
    Route::post('post/{id}','PostController@update')->name('post.update');
    Route::get('post/{id}','PostController@destroy')->name('post.destroy');
    Route::get('post/show/{id}','PostController@show')->name('post.show');
    Route::get('pending/post','PostController@pending')->name('pending.post');
    Route::get('approve/{id}/post','PostController@approve')->name('post.approve');
    //======== Subscribers route ===========================================//
    Route::get('subscriber','SubscriberController@index')->name('subscriber.index');
    Route::get('subscriber/{id}','SubscriberController@destroy')->name('subscriber.destroy');
    //======== Settings route ==============================================//
    Route::get('settings','SettingsController@index')->name('settings.index');
    Route::post('settings/{id}','SettingsController@update')->name('settings.update');
    Route::post('update','SettingsController@updatePassword')->name('password.update');
    //======== Favorite route ================================================//
    Route::get('favorite','FavoriteController@index')->name('favorite.index');
    //========= Comment Route ================================================//
    Route::get('comment','CommentController@index')->name('comment.index');
    Route::get('comments/{id}','CommentController@destroy')->name('comment.destroy');
    //========= Author route =================================================//
    Route::get('authors','AuthorController@index')->name('author.index');
    Route::get('author/{id}','AuthorController@destroy')->name('author.destroy');
});

Route::group(['as'=>'author.','prefix' => 'author','namespace'=>'Author','middleware'=>['auth','author']], function() {
    Route::get('dashboard','DashboardController@index')->name('dashboard');
    //======== Post Route ===================================================//
    Route::get('post','PostController@index')->name('post.index');
    Route::get('post/create','PostController@create')->name('post.create');
    Route::post('post','PostController@store')->name('post.store');
    Route::get('post/{id}/edit','PostController@edit')->name('post.edit');
    Route::post('post/{id}','PostController@update')->name('post.update');
    Route::get('post/{id}','PostController@destroy')->name('post.destroy');
    Route::get('post/show/{id}','PostController@show')->name('post.show');
    //======== Settings route ==============================================//
    Route::get('settings','SettingsController@index')->name('settings.index');
    Route::post('settings/{id}','SettingsController@update')->name('settings.update');
    Route::post('update','SettingsController@updatePassword')->name('password.update');
    //======== Favorite route ================================================//
    Route::get('favorite','FavoriteController@index')->name('favorite.index');
   //========= Comment Route ================================================//
    Route::get('comment','CommentController@index')->name('comment.index');
    Route::get('comments/{id}','CommentController@destroy')->name('comment.destroy');

});
View::composer('layouts.frontend.partial.footer', function ($view) {
  $categories = App\Category::all();
  $view->with('categories',$categories);
});
