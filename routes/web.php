<?php

use App\Http\Controllers\Admin\AdminController;
use App\Http\Controllers\ProfileController;
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

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';


// Admin Group
    /* prefix -> admin will included before every URL, 
    group -> is used to group all the routes with prefix of admin*/

Route::prefix('admin')->group(function(){

    // Admin Login Route
    Route::match(['get', 'post'], '/login', [AdminController::class,'login']);
    Route::group(['middleware'=>['admin']], function(){

        // Admin DashBoard Route
        Route::get('/dashboard',[AdminController::class,'dashboard']);
        ROute::match(['get','post'],'update-password',[AdminController::class,'updatePassword']);
        ROute::match(['get','post'],'update-details',[AdminController::class,'updateDetails']);
        ROute::post('check-admin-password',[AdminController::class,'CheckAdminPassword']);
        // Admin Logout Route
        Route::get('/logout',[AdminController::class,'logout']);
    });
});

