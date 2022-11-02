<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\PostController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Frontend\FrontendController;

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

Route::get('/', [FrontendController::class, 'index']);
Route::get('/posts', [FrontendController::class, 'posts']);
Route::get('/posts/{post_slug}', [FrontendController::class, 'viewpost']);

Route::get('/posts/author/{author}', [FrontendController::class, 'author']);
Route::get('/posts/category/{category_slug}', [FrontendController::class, 'category']);

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Create Slug
Route::get('/check_slug', [PostController::class, 'checkSlug']);
Route::prefix('admin')->middleware(['auth', 'admin'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
    Route::get('/category', App\Http\Livewire\Admin\Category\Index::class);

    // Routes Post Controller
    Route::controller(PostController::class)->group(function(){
        Route::get('/post', 'index');
        Route::get('/post/create', 'create');
        Route::post('/post', 'store');
        Route::get('/post/{post}/view', 'view');
        Route::get('/post/{post}/edit', 'edit');
        Route::put('/post/{post_id}', 'update');
        Route::get('/post/{post_id}/delete', 'destroy');
    });

});
