<?php

use App\Http\Controllers\ApplicationController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
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
    // return view('welcome');
    return redirect('/dashboard');
});

Auth::routes([
    'reset' => false,
]);

Route::middleware(['auth'])->group(function () {
    Route::get('/dashboard', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::resource('/roles', RoleController::class)->except(['show', 'create', 'edit']);
    Route::resource('/users', UserController::class)->except(['show']);
    Route::resource('/applications', ApplicationController::class)->except(['show']);
    Route::get('/clients', function (Request $request) {
        return view('clients', [
            'clients' => $request->user()->clients
        ]);
    })->name('clients');
});
