<?php
 
use App\Http\Controllers\Web\AuthController;
use App\Http\Controllers\Web\ProductController;
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
Route::get('/', function () {
    // return response()->json(['message' => 'Hello Worldddd!']);
});

Route::get('login', [AuthController::class, 'formLogin'])->name('form_login');
Route::post('login', [AuthController::class, 'login'])->name('login');
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

Route::group(['prefix' => 'products', 'middleware' => 'check_user', 'as' => 'products.'], function () {
    Route::get('/create', [ProductController::class, 'create'])->name('create');
    Route::get('/', [ProductController::class, 'index'])->name('index');
    Route::get('/edit/{product}', [ProductController::class, 'edit'])->name('edit');
    Route::put('/{product}', [ProductController::class, 'update'])->name('update');
    Route::get('/{product}', [ProductController::class, 'show'])->name('show');
    Route::post('/', [ProductController::class, 'store'])->name('store');
    Route::delete('/{product}', [ProductController::class, 'destroy'])->name('destroy');
});
 