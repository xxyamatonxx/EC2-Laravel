<?php

use Illuminate\Support\Facades\Route;

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

// Route::get('/', function () {
//     return view('welcome');
// });

//投稿一覧&フォーム表示
    Route::get('/', 'PostController@showPosts')->name('view');
//新規投稿保存
    Route::post('/', 'PostController@saveData')->name('save');
//詳細ページ
    Route::get('/post/{id}', 'PostController@detail')->name('detail');
//削除機能
    Route::post('/delete/{id}', 'PostController@delete')->name('delete');
//編集機能
    Route::get('/edit/{id}', 'PostController@edit')->name('edit');
    Route::post('/edit/{id}', 'PostController@updata')->name('updata');

//コメント表示
// Route::get('/add/comment', 'CommentController@showComment')->name('showComment');
//コメント追加
    Route::post('/comment', 'CommentController@add')->name('addComment');


