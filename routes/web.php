<?php

Route::group(['namespace' => 'Shervs336\SuggestionBox\Http\Controllers', 'middleware' => ['web']], function(){
  Route::resource('suggestions', 'SuggestionController');
});
