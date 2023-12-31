<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\PostController;

Route::get('/', [PostController::class,'index'])->name('posts.index');

Route::get('posts/{post}', [PostController::class, 'show'])->name('posts.show'); 
 
Route::get('category/{category}', [PostController::class, 'category'])->name('posts.category');
/* Route::middleware(['auth:sanctum', 'verified'])->get('/', [PostController::class, 'index'])->name('post.show'); 
 */

Route::get('tag/{tag}', [PostController::class,'tag'])->name('posts.tag'); 