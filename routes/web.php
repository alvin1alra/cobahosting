<?php

use App\Http\Controllers\ReservationsController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\OrderController;
use Illuminate\Foundation\Application;
use Illuminate\Support\Facades\Route;
use Inertia\Inertia;
use SebastianBergmann\CodeCoverage\Report\Html\Dashboard;

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
//home route, for showcase, contacts, or other things
Route::get('/', [HomeController::class, 'show']);
//reservation route,order
Route::get('/order{index}', [OrderController::class, 'show']);
//oder input
Route::post('/ordering', [OrderController::class, 'insert']);

Route::get('/reservations', function() {return inertia::render('Reservations', []);})->name('reservations');

//route admin,where admin able to access all reservationa
Route::get('/spots', function () {return Inertia::render('spots', []); })->name('spots');
//route admin,where admin able to access all reservationa
Route::get('/settings', function () {return Inertia::render('settings', []); })->name('settings');

route::get('booking', function(){
    return Inertia::render('welcome',[
        'canLogin' => Route::has('login'),
        'canRegister' => Route::has('register'),
        'laravelVersion' => Application::VERSION,
        'phpVersion' => PHP_VERSION,
    ]);
});

//authenticating route
Route::middleware([
    'auth:sanctum',
    config('jetstream.auth_session'),
    'verified',
])->group(function () {
    //ruter dashboard
    Route::get('/dashboard', 
     [DashboardController::class, 'show']
    )->name('dashboard');

    //router reservation
    Route::get('/reservations', 
    [ReservationsController::class, 'show']
   )->name('reservations');

   //router update
   Route::post('/update_reservation', 
   [ReservationsController::class, 'update']
  )->name('update_reservation');

   //router delete
   Route::post('/delete_reservation', 
   [ReservationsController::class, 'delete']
  )->name('delete_reservation');
});  
