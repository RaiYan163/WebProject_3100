<?php

use App\Http\Controllers\AdminPostController;
use App\Http\Controllers\NewsletterController;
use App\Http\Controllers\PostCommentsController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RegisterController;
use App\Http\Controllers\SessionsController;
use App\Models\Post;
use App\Models\Category;
use App\Models\User;
use App\services\Newsletter;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Route;
use Illuminate\Validation\ValidationException;
use Spatie\YamlFrontMatter\YamlFrontMatter;

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





Route::get('/', [PostController::class, 'index'])->name('home');


Route:: get('posts/{post:slug}', [PostController::class, 'show']);
Route::post('/posts/{post:slug}/comments', [PostCommentsController::class, 'store']);
Route::delete('/posts/{post:slug}/{comment:id}', [PostCommentsController::class, 'destroy']);
Route::post('newsletter', NewsletterController::class);

//Route:: get('categories/{category:slug}', function(Category $category){
//    return view('posts.index', [
//        'posts' => $category->posts->paginate(10),
//        'currentCategory' => $category,
//        'categories'=>Category::all()
//    ]);
//})->name('category');

//Route:: get('authors/{author:username}', function(User $author){
//   // dd($author);
//    return view('posts.index', [
//        'posts' => $author->posts,
//        //'categories'=>Category::all()
//    ]);
//});

Route::get('register', [RegisterController::class, 'create'])->middleware('guest');
Route::post('register', [RegisterController::class, 'store'])->middleware('guest');


Route::get('login', [SessionsController::class, 'create'])->middleware('guest');
Route::post('sessions', [SessionsController::class, 'store'])->middleware('guest');

Route::post('logout', [SessionsController::class, 'destroy'])->middleware('auth')->name('login');



Route::post('admin/posts', [AdminPostController::class, 'store'])->middleware('can:admin');
Route::get('admin/posts/create', [AdminPostController::class, 'create'])->middleware('can:admin');
Route::get('admin/posts', [AdminPostController::class, 'index'])->middleware('can:admin');
Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit'])->middleware('can:admin');
Route::patch('admin/posts/{post}', [AdminPostController::class, 'update'])->middleware('can:admin');
Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy'])->middleware('can:admin');


//Route::post('admin/posts', [AdminPostController::class, 'store']);
//Route::get('admin/posts/create', [AdminPostController::class, 'create']);
//Route::get('admin/posts', [AdminPostController::class, 'index']);
//Route::get('admin/posts/{post}/edit', [AdminPostController::class, 'edit']);
//Route::patch('admin/posts/{post}', [AdminPostController::class, 'update']);
//Route::delete('admin/posts/{post}', [AdminPostController::class, 'destroy']);















