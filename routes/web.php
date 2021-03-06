<?php
use App\Http\Controllers\PostController;
use App\Http\Controllers\HomeController;
use Illuminate\Http\Request;
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
Route::get('/',[HomeController::class, 'home'])
->name('home.index');

Route::get('/contact',[HomeController::class, 'contact'])
->name('home.contact');

Route::get('/single', \App\Http\Controllers\AboutController::class);



//2개만 사용하겠다
Route::resource('posts', \App\Http\Controllers\PostController::class)->only(['index','show']);

//2개만 사용하지 않겠다
//Route::resource('posts', \App\Http\Controllers\PostController::class)->except(['index','show']);


//
//// 수정
//Route::get('/posts', function() use($posts){
////    dd(request()->all());
////    dd((int)request()->query('page', 1));
//    dd((int)request()->input('page', 1));
//    return view('posts.index', ['posts' => $posts]);
//});
//
//Route::get('/posts/{id}', function ($id) use($posts){
//    abort_if(!isset($posts[$id]), 404);
//
//    return view('posts.show', ['post' => $posts[$id]]);
//})->name('posts.show');

// {} 매개변수(파라미터) 로 값을  함수의 ($value)  인자로  넘겨주면  variable routng설정이 가능함
Route::get('/recent-posts/{days_ago?}', function ($daysAgo = 20) {
    return 'Posts from ' . $daysAgo . 'days ago';
})->name('posts.recent.index')->middleware('auth');


//  fun URL 그룹화
//Route::prefix('/fun')->name('fun.')->group(function() use($posts) {
//
//    Route::get('responses', function() use($posts){
//        return response($posts, 201)
//            ->header('Content-Type', 'application/json')
//            ->cookie('MY_COOKIE', 'kim bin', 3600);
//    })->name('responses');
//
//    Route::get('redirect', function () {
//        return redirect('/contact');
//    })->name('redirect');
//
//    Route::get('back', function () {
//        return back();
//    })->name('back');
//
//    Route::get('name-route', function () {
//        return redirect()->route('posts.show', ['id' => 1]);
//    })->name('name-route');
//
//    Route::get('away', function () {
//        return redirect()->away('https://google.com');
//    })->name('away');
//
//    Route::get('json', function () use($posts){
//        return response()->json($posts);
//    })->name('json');
//
//    Route::get('download', function () use($posts){
//        return response()->download(public_path('/daniel.jpg'), 'face.jpg');
//    })->name('download');
//});

