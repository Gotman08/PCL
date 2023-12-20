<?php

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
})->name('welcome');

Route::get('/Login', function () {
    return view('auth.login');
})->name('Login');

Route::get('Contact', function () {
    return view('Contact');
})->name('Contact');

Route::get('/application', function () {
    return view('application');
})->name('application');


Route::get('/description', function () {
    return view('description');
})->name('description');

Route::get('/user', function () {
    return view('user');
})->middleware('admin')->name('user');

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

Route::get('/Register', function () {
    return view('auth.register');
})->name('Register');

// Auth routes
Route::get('/login', [AuthenticatedSessionController::class, 'create'])
                ->middleware('guest')
                ->name('login');

Route::post('/login', [AuthenticatedSessionController::class, 'store'])
                ->middleware('guest');

Route::get('/register', [RegisteredUserController::class, 'create'])
                ->middleware('guest')
                ->name('Register');

Route::post('/register', [RegisteredUserController::class, 'store'])
                ->middleware('guest');

Route::post('/logout', [AuthenticatedSessionController::class, 'destroy'])
                ->middleware('auth')
                ->name('logout');


require __DIR__.'/auth.php';