<?php

use App\Http\Controllers\VisitController;
use App\Models\Visit;
use App\Providers\RouteServiceProvider;
use Carbon\Carbon;
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
    return redirect(RouteServiceProvider::HOME);
});

Route::middleware(['auth:sanctum', 'verified'])->get('/dashboard', function () {
    $visits = Visit::whereDate('created_at', Carbon::today())
        ->count();

    return Inertia::render('Dashboard', [
        'visits' => $visits,
    ]);
})->name('dashboard');

Route::resource('visits', VisitController::class);
