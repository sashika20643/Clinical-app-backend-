<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ContactController;


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
    return redirect(route('dashboard'));
});
Route::match(['get', 'post'], '/register', function () {
    return redirect('/login');
});

Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
    'isAdmin'
])->prefix('dashboard')->group(function () {



    Route::get('/', [DashboardController::class, 'index'])->name('dashboard');
    Route::get('/filter/{c_id}/{status}/{date}', [DashboardController::class, 'filter'])->name('filter');
    Route::get('/changeState/{c_id}', [DashboardController::class, 'changeState'])->name('changeState');


    Route::get('/users', [DashboardController::class, 'usersview'])->name('usersview');
    Route::get('/contactview', [ContactController::class, 'contactview'])->name('contactview');




});
