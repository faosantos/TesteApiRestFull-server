<?php

// use Illuminate\Http\Request;
// use Symfony\Component\HttpKernel\Fragment\RoutableFragmentRenderer;

use Illuminate\Http\Request;
use Carbon\Traits\Rounding;



Route::post('login', 'Api\UserController@login');
Route::post('register', 'Api\UserController@register');

Route::group(['middleware' => 'auth:api'], function(){
  Route::patch('setLocation', 'Api\UserController@setLocation');
  Route::patch('setFavorite', 'Api\UserController@setFavorite');
  
  Route::post('uploadImage', 'Api\UserController@uploadImage');
  Route::post('setExpoToken', 'Api\UserController@setExpoToken');
  Route::post('editData', 'Api\UserController@editData');
  
  Route::delete('deleteImage', 'Api\UserController@deleteImage');

  Route::get('apiTokenCheck', 'Api\UserController@apiTokenCheck');
  Route::get('localFeed', 'Api\FeedController@getLocal');
  Route::get('searchFeed', 'Api\FeedController@getSearch');
  Route::get('/favoritesFeed', 'Api\FeedController@getFavorites');
  Route::get('/fav/add/{id}', 'Api\FavoriteController@addFavorite');
  Route::get('/fav/remove/{id}', 'Api\FavoriteController@rmFavorite');
  Route::get('/block/add/{id}', 'Api\BlockController@blockUser');
  Route::get('/block/remove/{id}', 'Api\BlockController@unblockUser');
});




//Parte original
// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

// Route::get('/test', function(){
//      'Sucesso';
// });
