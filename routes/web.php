<?php

use App\Http\Controllers\ProfileController;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\CategoryController;
use App\Http\Controllers\SubcategoryController;
use App\Http\Controllers\ProductsController;

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

/**
 * All Category Route Here.
 */
Route::get('add-category', [CategoryController::class,'addcategory'])->name('addcategory');
Route::post('post-category', [CategoryController::class,'postcategory'])->name('postcategory');
Route::get('view-category', [CategoryController::class,'viewcategory'])->name('viewcategory');
Route::get('delete-category/{id}', [CategoryController::class,'deletecategory'])->name('deletecategory');
Route::get('edit-category/{id}', [CategoryController::class,'editcategory'])->name('editcategory');
Route::post('update-category', [CategoryController::class,'updatecategory'])->name('updatecategory');
Route::get('trashed-category', [CategoryController::class,'trashedcategory'])->name('trashedcategory');
Route::get('restore-category/{id}', [CategoryController::class,'RestoreCategory'])->name('RestoreCategory');
Route::get('permanent-delete-category/{id}', [CategoryController::class,'PermanentdeleteCategory'])->name('PermanentdeleteCategory');

/**
 * All Subcategory route here.
 */
Route::get('view-subcategory', [SubcategoryController::class,'ViewCategory'])->name('ViewCategory');
Route::get('add-subcategory', [SubcategoryController::class,'AddSubcategory'])->name('AddSubcategory');
Route::post('post-subcategory', [SubcategoryController::class,'PostSubcategory'])->name('PostSubcategory');
Route::get('edit-subcategory/{iq}', [SubcategoryController::class,'EditSubcategory'])->name('EditSubcategory');
Route::post('update-subcategory', [SubcategoryController::class,'UpdateSubcategory'])->name('UpdateSubcategory');
Route::get('delete-subcategory/{id}', [SubcategoryController::class,'DeleteSubcategory'])->name('DeleteSubcategory');
Route::post('all-delete-subcategory', [SubcategoryController::class,'AllDeleteSubcategory'])->name('AllDeleteSubcategory');
Route::get('trashed-subcategory', [SubcategoryController::class,'TrashedSubcategory'])->name('TrashedSubcategory');
Route::get('restore-subcategory/{iq}', [SubcategoryController::class,'RestoreSubcategory'])->name('RestoreSubcategory');
Route::get('permanent-delete-subcategory/{iq}', [SubcategoryController::class,'PermanentDeleteSubcategory'])->name('PermanentDeleteSubcategory');

/**
 * All Products route here.
 */
Route::get('view-products', [ProductsController::class,'ProductsView'])->name('ProductsView');  
Route::get('add-products', [ProductsController::class,'AddProducts'])->name('AddProducts');  
Route::post('post-products', [ProductsController::class,'PostProducts'])->name('PostProducts');  



require __DIR__.'/auth.php';
