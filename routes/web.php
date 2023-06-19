<?php

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ProjectController;
use App\Http\Controllers\Admin\TypeController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\Admin\TechnologyController;
use App\Http\Controllers\Admin\PublishingController;
use App\Mail\NewLead;
use Illuminate\Support\Facades\Route;
use App\Models\Lead;

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

Route::get('/mailable', function () {
    $lead = Lead::find(1);
    return new NewLead($lead);
});

Route::middleware(['auth', 'verified'])->prefix('admin')->name('admin.')->group(function () {

    Route::get('/', [DashboardController::class, 'index'])->name(('dashboard'));
    Route::resource('projects', ProjectController::class);
    Route::resource('types', TypeController::class);
    Route::resource('technologies', TechnologyController::class);
    Route::resource('publishings', PublishingController::class);
});

require __DIR__ . '/auth.php';
