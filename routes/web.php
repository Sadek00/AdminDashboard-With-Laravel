<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;

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

// Route::get('/dashboard', function () {
//     return view('dashboard');
// })->middleware(['auth', 'verified'])->name('dashboard');

// Route::middleware('auth')->group(function () {
//     Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
//     Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
//     Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
// });

Route::get('dashboard', [DashboardController::class,'dashboard'])->name('dashboard');
//Category Route
Route::get('add-category', [CategoryController::class,'addcategory'])->name('addcategory');
Route::post('post-category', [CategoryController::class,'postcategory'])->name('postcategory');
Route::get('view-category', [CategoryController::class,'viewcategory'])->name('viewcategory');
Route::get('delete-category/{id}', [CategoryController::class,'deletecategory'])->name('deletecategory');
Route::get('edit-category/{id}', [CategoryController::class,'editcategory'])->name('editcategory');
Route::post('update-category', [CategoryController::class,'updatecategory'])->name('updatecategory');
Route::get('trashed-category', [CategoryController::class,'trashedcategory'])->name('trashedcategory');
Route::get('restore-category/{id}', [CategoryController::class,'RestoreCategory'])->name('RestoreCategory');
Route::get('permanent-delete-category/{id}', [CategoryController::class,'PermanentdeleteCategory'])->name('PermanentdeleteCategory');


require __DIR__.'/auth.php';
