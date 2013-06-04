<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the Closure to execute when that URI is requested.
|
*/

Route::get('/', array('as' => 'new_snippet', 'uses' => 'SnippetController@getIndex'));

Route::get('list-snippets', array('as' => 'list_snippets', 'uses' => 'SnippetController@getList'));

Route::get('view/{id}', array('as' => 'view_snippet', 'uses' => 'SnippetController@getView'), function($id){})->where('id', '[0-9]+');

Route::get('fork/{id}', array('as' => 'fork_snippet', 'uses' => 'SnippetController@getFork'), function($id){})->where('id', '[0-9]+');

Route::post('save_snippet', array( 'before' => 'csrf', 'as' => 'save_snippet', 'uses' => 'SnippetController@postSaveSnippet'));