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

Route::get('/', array('as' => 'new_snippet', 'uses' => 'snippet_controller@get_new'));

Route::get('list-snippets', array('as' => 'list_snippets', 'uses' => 'snippet_controller@get_list'));

Route::get('view/{id}', array('as' => 'view_snippet', 'uses' => 'snippet_controller@get_view'), function($id){})->where('id', '[0-9]+');

Route::get('fork/{id}', array('as' => 'fork_snippet', 'uses' => 'snippet_controller@get_fork'), function($id){})->where('id', '[0-9]+');

Route::post('/', array('as' => 'save_snippet', 'uses' => 'snippet_controller@post_new'));