<?php

use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AgentController;
use App\Http\Controllers\PropertyTypeController;
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
});

Route::get('/dashboard', function () {
    return view('dashboard');
})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
});

require __DIR__.'/auth.php';

Route::middleware(['auth', 'role:admin'])->group(function()
{
    Route::get('/admin/dashboard', [AdminController::class, 'admin_dashboard'])->name('admin_dashboard');
    Route::get('/admin/logout', [AdminController::class, 'admin_logout'])->name('admin.logout');
    Route::get('/admin/profile', [AdminController::class, 'admin_profile'])->name('admin_profile');

    //Property routes
    Route::get('/admin/all/property', [PropertyTypeController::class, 'admin_all_property'])
            ->name('admin.all.property');
    Route::get('/admin/add/property', [PropertyTypeController::class, 'admin_add_property'])
            ->name('admin.add.property');
    Route::post('/admin/store/property', [PropertyTypeController::class, 'admin_store_property'])
            ->name('admin.store.property');

    Route::get('/admin/edit/{id}/property', [PropertyTypeController::class, 'admin_edit_property'])
            ->name('admin.edit.property');
    Route::post('/admin/update/{id}/property', [PropertyTypeController::class, 'admin_update_property'])
            ->name('admin.update.property');

    Route::get('/admin/delete/{id}/property', [PropertyTypeController::class, 'admin_delete_property'])
            ->name('admin.delete.property');

    // Amenity routes        
    Route::get('/admin/all/amenity', [PropertyTypeController::class, 'admin_all_amenity'])
            ->name('admin.all.amenity');

    Route::get('/admin/add/amenity', [PropertyTypeController::class, 'admin_add_amenity'])
            ->name('admin.add.amenity');
    Route::post('/admin/store/amenity', [PropertyTypeController::class, 'admin_store_amenity'])
            ->name('admin.store.amenity');

    Route::get('/admin/edit/{id}/amenity', [PropertyTypeController::class, 'admin_edit_amenity'])
            ->name('admin.edit.amenity');
    Route::post('/admin/update/{id}/amenity', [PropertyTypeController::class, 'admin_update_amenity'])
            ->name('admin.update.amenity');

    Route::get('/admin/delete/{id}/amenity', [PropertyTypeController::class, 'admin_delete_amenity'])
            ->name('admin.delete.property');


    Route::get('/admin/import/excel', [PropertyTypeController::class, 'admin_import_excel'])
            ->name('admin.import.excel');
    Route::get('/admin/export/excel', [PropertyTypeController::class, 'admin_export_excel'])
            ->name('admin.export.excel');


});//End admin middleware route



Route::middleware(['auth','role:agent'])->group(function()
{
    Route::get('/agent/dashboard', [AgentController::class, 'agent_dashboard'])->name('agent_dashboard');
});//End agent middleware route



