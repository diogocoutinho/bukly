<?php

use App\Http\Controllers\Hotel\HotelController;
use App\Http\Controllers\Hotel\Room\RoomController;
use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

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
    Route::resource('hotels', HotelController::class);
    Route::resource('hotels.rooms', RoomController::class);
});
Route::post('/set-error-message', function (Request $request) {
    session()->flash('cep_error', $request->message);
    return response()->json(['status' => 'success']);
});

require __DIR__.'/auth.php';
