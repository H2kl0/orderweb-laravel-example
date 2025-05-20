<?php

use App\Http\Controllers\CausalController;
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
    return view('test');
})->name('test');


Route::get('/', function () {
    return view('test2');
})->name('test2');

//prefix the use is for not to have the same name of the route
Route::prefix('causal')->group(function () {
    Route::get('/index', [CausalController::class,'index'])->name('causal.index');
    Route::get('/create', [CausalController::class,'create'])->name('causal.create');
    Route::get('/edit/{id}', [CausalController::class,'edit'])->name('causal.edit');
    Route::post('/store', [CausalController::class,'store'])->name('causal.store');
    Route::put('/update/{id}', [CausalController::class,'update'])->name('causal.update');
    Route::get('/delete/{id}', [CausalController::class,'destroy'])->name('causal.destroy');
});

Route::get('/observations/index', function () {
    return view('observations.index');
})->name('observations.index');

Route::get('/observations/create', function () {
    return view('observations.create');
})->name('observations.create');

route::get('/type_activity/create', function () {
    return view('type_activity.create');
})->name('type_activity.create');

Route::get('/type_activity/index', function () {
    return view('type_activity.index');
})->name('type_activity.index');

Route::get('activity/create', function () {
    return view('activity.create');
})->name('activity.create');

Route::get('activity/index', function () {
    return view('activity.index');
})->name('activity.index');

Route::get('order/create', function () {
    return view('order.create');
})->name('order.create');

Route::get('order/index', function () {
    return view('order.index');
})->name('order.index');

Route::get('technician/create', function () {
    return view('technician.create');
})->name('technician.create');

Route::get('technician/index', function () {
    return view('technician.index');
})->name('technician.index');
//edits
Route::get('/type_activity/edit', function () {
    return view('type_activity.edit');
})->name('type_activity.edit');

Route::get('activity/edit', function () {
    return view('activity.edit');
})->name('activity.edit');

Route::get('order/edit', function () {
    return view('order.edit');
})->name('order.edit');

Route::get('technical/edit', function () {
    return view('technical.edit');
})->name('technical.edit');



Route::get('/observations/edit', function () {
    return view('observations.edit');
})->name('observations.index');


