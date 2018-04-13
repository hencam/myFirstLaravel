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

use App\Post;
use App\Comment;

Route::get('/', function () {
    $posts = Post::where('status', 1)->join('Users', 'users.id', '=', 'posts.user_id')->orderBy('posts.created_at', 'desc')->paginate(30);
    $comments = Comment::where('comments.status', 1)->join('Posts', 'comments.post_id', '=', 'posts.id')->where('posts.status', 1)->join('Users', 'users.id', '=', 'comments.user_id')->orderBy('comments.created_at', 'desc')->groupBy('comments.post_id')->take(20)->get();
    return view('welcome')->with(array('posts' => $posts, 'comments' => $comments));
});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');
