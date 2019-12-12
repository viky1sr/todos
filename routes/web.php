<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::get('/', function () {
    return view('welcome');
});

Route::get('todos', "TodosController@index");

Route::get('todos/{todo}', "TodosController@show");
Route::get('create-todo', "TodosController@createTodo");
Route::post('store-todo', 'TodosController@storeTodo');
Route::get('todos/{todo}/edit', "TodosController@edit");
Route::post('todos/{todo}/update-todo', 'TodosController@update');
Route::get('todos/{todo}/complete', 'TodosController@complete');
Route::get('todos/{todo}/delete-todo', 'TodosController@destroy');
Route::get('todo/delete-all', 'TodosController@destroyAll')->name('delete.all');
