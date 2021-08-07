<?php

use Illuminate\Support\Facades\Route;
use Psy\CodeCleaner\IssetPass;
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

//view(home(폴더).index(파일))
// 실제로 홈 디렉토리에있는 인덱스 파일을 읽어 출력 할 수 있다..
// Route::get('/', function () {
//     return view('home.index');
// })->name('home.index');

// Route::get('/contact', function () {
//     return view('home.contact');
// })->name('home.contact');

// 매개변수가 없고 추가로 작업 할게 없는 페이지들은 정적메소드인 view()를 사용해 주는 것도 좋다.
Route::view('/','home.index')
->name('home.index');

Route::view('/contact','home.contact')
->name('home.contact');

$posts = [
    1 => [
        'title' => 'Intro to Laravel',
        'content' => 'This is a short intro to Laravel',
        'is_new' => true,
        'has_comments' => true
    ],
    2 => [
        'title' => 'Intro to PHP',
        'content' => 'This is a short intro to PHP',
        'is_new' => false,
    ],
    3 => [
        'title' => 'Intro to Golang',
        'content' => 'This is a short intro to Golang',
        'is_new' => false,
    ]
];

Route::get('/posts', function() use($posts){
    return view('posts.index', ['posts' => $posts]);
});

Route::get('/posts/{id}', function ($id) use($posts){
    abort_if(!isset($posts[$id]), 404);

    return view('posts.show', ['post' => $posts[$id]]);
})->name('posts.show');

// {} 매개변수(파라미터) 로 값을  함수의 ($value)  인자로  넘겨주면  variable routng설정이 가능함
Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . 'days ago';
})->name('posts.recent.index');