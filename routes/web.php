<?php

use Illuminate\Foundation\Application;
use App\Http\Controllers\Api\SurveyController;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;

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
    return Inertia::render('Auth/Login', [
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

Route::group([
    'middleware' => ['auth', 'verified'],
], function() {

    Route::get('/dashboard', function () {
        return Inertia::render('Dashboard');
    })->middleware(['auth', 'verified'])->name('dashboard');

    Route::get('/users', function () {
        if (in_array('Admin', auth()->user()->roles->pluck('name')->toArray())) {
            return Inertia::render('Users', [
                'users' => User::all(),
            ]);
        }
    })->middleware(['auth', 'verified'])->name('users');

    /**
     * API routes
     */
    Route::prefix('api')->group(function() {
        Route::post('survey', [SurveyController::class, 'insert']);
    });

});

require __DIR__.'/auth.php';
