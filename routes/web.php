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
// Ajax 的简单 数据交互 分析
Route::view('/test/index','test.ajax'); //显示视图
Route::get('/test/hello','TestController@hello')->name('hello');

// Ajax 的 实际例子
Route::get('/test/light','TestController@showlight'); // 显示灯泡页面
Route::get('/test/change','TestController@changelight')->name('change');
