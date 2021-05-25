<?php

use App\Http\Controllers\AuthController;
use App\Http\Controllers\PostController;
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

Route::resource('/', PostController::class);

Route::post('/sortBy', [PostController::class, 'updateSortOrder'])->name("auth_sort_by_handle");

Route::get('/imports', [PostController::class, 'dumpImport']);

Route::get("/article/{id}", [PostController::class, 'show'])->name("show_article");

Route::get("/user/{id}", [PostController::class, 'showUserArticles'])->name("show_user_articles");

Route::get('/auth/sign_up', [AuthController::class, 'showSignUp'])->name("auth_sign_up_show");

Route::post('/auth/sign_up', [AuthController::class, 'handleSignUp'])->name("auth_sign_up_handle");

Route::get("/auth/sign_in", [AuthController::class, 'showSignIn'])->name("auth_sign_in_show");

Route::post("/auth/sign_in", [AuthController::class, 'handleSignIn'])->name("auth_sign_in_handle");

Route::get("/auth/sign_out", [AuthController::class, 'handleSignOut'])->name("auth_sign_out_handle");

