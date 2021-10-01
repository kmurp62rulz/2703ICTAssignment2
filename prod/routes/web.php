<?php

use App\Http\Controllers\ProductController;
use App\Http\Controllers\ReviewsController;
use Illuminate\Support\Facades\Route;
use App\Models\Product;
use App\Models\User;

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

Route::get('/', [ProductController::class, 'index']);

route::get('/test', function(){
    $user = User::find(1);
    $name = 'iPad';
    $prods = $user->products()->whereRaw('name like ?', array("%$name%"))->get();
    dd($prods);
});

route::get('/logoutcheck', function(){
    return view('products.logoutcheck');
});

Route::get('/product/{id}/show_reviews', [ProductController::class, 'show_reviews']);

Route::resource('product', ProductController::class);

Route::get('/reviews/{id}/show', [ReviewsController::class, 'show']);

//Route::post('/reviews/{id}/edit', [ReviewsController::class, 'edit']);


Route::resource('reviews', ReviewsController::class);

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth'])->name('dashboard');

require __DIR__.'/auth.php';
