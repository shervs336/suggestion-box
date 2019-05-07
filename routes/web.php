<?php

Route::group(['namespace' => 'Shervs336\SuggestionBox\Http\Controllers', 'middleware' => ['web']], function(){
  Route::resource('suggestions', 'SuggestionController');
  Route::post('comments/{suggestion}', 'CommentController@store')->name('comments.store');
  Route::delete('comments/{suggestion}/{comment}', 'CommentController@destroy')->name('comments.destroy');
});
