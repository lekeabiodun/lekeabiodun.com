<?php

use App\Http\Controllers\BlogController;
use App\Models\Blog;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/

// Route::get('/', function () {
//     return view('pages.home');
// });

Route::get('/', function(){
    $posts = Blog::getAllBlog();
    return view('pages.home', [
        'posts' => $posts,
    ]);
});
Route::view('about', 'pages.about');
Route::view('uses', 'pages.uses');
Route::get('blog', [BlogController::class, 'index']);
Route::get('blog/{post}', [BlogController::class, 'show']);
