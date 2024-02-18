<?php

use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;
use App\Http\Controllers\auth\RegisterController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\auth\LoginController;
use App\Http\Controllers\auth\LogoutController;


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
})->name('home');

Route::get('/test-database', function () {
    try {
        DB::connection()->getPdo();
        print_r("Connected successfully to: " . DB::connection()->getDatabaseName());
    } catch (\Exception $e) {
        die("Could not connect to the database.  Please check your configuration. Error:" . $e);
    }
});

Route::get('/fetchUser', [LoginController::class, 'fetchUserFromDB']);

Route::get('/dashboard',[DashboardController::class, 'index'])-> name('dashboard');
Route::get('/register',[RegisterController::class, 'index'])-> name('register');
Route::post('/register',[RegisterController::class, 'store']);

Route::get('/login',[LoginController::class, 'index'])-> name('login');
Route::post('/login',[LoginController::class, 'store']);

Route::post('/logout',[LogoutController::class, 'store'])-> name('logout');



