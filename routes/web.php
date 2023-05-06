<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\MyController;

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
Route::get('/',[\App\Http\Controllers\MyController::class,"home"])->name("homepage");
Route::get('/about',[\App\Http\Controllers\MyController::class,"about"])->name("about");
Route::get('/contact',[\App\Http\Controllers\MyController::class,"contact"])->name("contact");
Route::post('/subscribe',[\App\Http\Controllers\MyController::class,"subscription"])->name("subscribe");
Route::post('/contact',[\App\Http\Controllers\MyController::class,"contact_form"])->name("contact_form");
//Route::get("/myregister",[\App\Http\Controllers\MyController::class,"myregister"])->name("myregister");
//Route::get("/mylogin",[\App\Http\Controllers\MyController::class,"mylogin"])->name("mylogin");
Route::prefix('dashboard')->name('dashboard.')->group(function () {
    Route::get('/', function () {
        return view('Dashboard.index');
    })->name('index');
    // Route::get('/contact', function () {
    //     return view('Dashboard.contact');
    // })->name('contact');
    Route::get('/categories', [\App\Http\Controllers\Categories::class,"cat"])->name("categories");
    Route::get('/addcategories', [\App\Http\Controllers\Categories::class,"addcat"])->name("addcat");
    Route::post("/categories/store",[\App\Http\Controllers\Categories::class,"store"])->name("category.store");
    Route::get('/categories/edit/{category}', [\App\Http\Controllers\Categories::class,"edit"])->name('category.edit');
    Route::get("/delete/{category}",[\App\Http\Controllers\Categories::class,"delete"])->name("category.delete");
    Route::post("/categories/update/{category}",[\App\Http\Controllers\Categories::class,"update"])->name("category.update");
    Route::get("/contact",[\App\Http\Controllers\ContactController::class,"show"])->name("contact");
    Route::get("/subscribtion",[\App\Http\Controllers\SubscriptionController::class,"show"])->name("subscribe");
    Route::get("/posts",[\App\Http\Controllers\PostController::class,"posts"])->name("posts");
    Route::get("/addposts",[\App\Http\Controllers\PostController::class,"addposts"])->name("addposts");
    Route::post("/addposts/store",[\App\Http\Controllers\PostController::class,"store"])->name("posts.store");
    Route::get("/posts/edit/{update_post}",[\App\Http\Controllers\PostController::class,"edit"])->name("posts.edit");
    Route::post("/posts/update/{update_post}",[\App\Http\Controllers\PostController::class,"update"])->name("posts.update");
    Route::get("posts/delete/{update_post}",[\App\Http\Controllers\PostController::class,"delete"])->name("posts.delete");



    // Route::get('/posts', function () {
    //     return view('Dashboard.posts');
    // })->name('posts');
    // Route::get('/subscribe', function () {
    //     return view('Dashboard.subscribe');
    // })->name('subscribe');


})->middleware(['auth', 'verified']);

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
Route::get("/read/{id}",[App\Http\Controllers\MyController::class,"read"])->name("read");
