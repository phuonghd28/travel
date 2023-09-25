<?php

use App\Http\Controllers\ArticleController;
use App\Http\Controllers\ClientController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\TypeController;
use App\Http\Middleware\Authenticate;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteArticleProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/
Route::get('', [ClientController::class, 'home'])->name('home');
Route::get('/articles', [ClientController::class, 'list'])->name('list');
Route::get('/detail/{id}', [ClientController::class, 'detail'])->name('detail');

Route::get('/login', [LoginController::class, 'loginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('loginPost');
Route::get('/logout', [LoginController::class, 'logout'])->name('logout');

Route::prefix('admin')->middleware(['auth', Authenticate::class])->group(function (){
    Route::prefix('types')->group(function () {
        Route::get('create', [TypeController::class, 'create'])->name('createType');
        Route::post('create', [TypeController::class, 'store'])->name('storeType');
        Route::get('', [TypeController::class, 'list'])->name('listType');
        Route::get('edit/{id}', [TypeController::class, 'edit'])->name('editType');
        Route::put('edit/{id}', [TypeController::class, 'save'])->name('saveType');
        Route::get('delete/{id}', [TypeController::class, 'delete'])->name('deleteType');
    });

    Route::prefix('articles')->group(function () {
        Route::get('create', [ArticleController::class, 'create'])->name('createArticle');
        Route::post('create', [ArticleController::class, 'store'])->name('storeArticle');
        Route::get('', [ArticleController::class, 'list'])->name('listArticle');
        Route::get('edit/{id}', [ArticleController::class, 'edit'])->name('editArticle');
        Route::put('edit/{id}', [ArticleController::class, 'save'])->name('saveArticle');
        Route::get('delete/{id}', [ArticleController::class, 'delete'])->name('deleteArticle');
    });

});
