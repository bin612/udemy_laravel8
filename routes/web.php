<?php

use Illuminate\Support\Facades\Route;
use Whoops\Run;

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
})->name('home.index');

//이름은 같게 성정해주는 것 이 제알 좋다
Route::get('/contact', function () {
    return "Contact";
})->name('home.contact');

Route::get('/posts/{id}', function ($id) {
    return 'Blog post '. $id;
})->name('posts.show');

// {} 매개변수(파라미터) 로 값을  함수의 ($value)  인자로  넘겨주면  variable routng설정이 가능함
Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . 'days ago';
})->name('posts.recent.index');