<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\HomeController;
use App\Http\Controllers\Admin\UnitController;
use App\Http\Controllers\Admin\AreaController;
use App\Http\Controllers\Admin\EquipmentController;
use App\Http\Controllers\Admin\SystemController;
use App\Http\Controllers\Admin\SubsystemController;
use App\Http\Controllers\Admin\ComponentController;


Route::get('admin',[HomeController::class, 'index'])->name('admin.index');

Route::resource('admin/units',UnitController::class)->names('admin.units');
Route::post('admin/units/updateModal',[UnitController::class,'updateModal']);

Route::resource('admin/areas',AreaController::class)->names('admin.areas');
Route::post('admin/areas/updateModal',[AreaController::class,'updateModal']);

Route::resource('admin/equipments',EquipmentController::class)->names('admin.equipments');
Route::post('admin/equipments/updateModal',[EquipmentController::class,'updateModal']);

Route::resource('admin/systems',SystemController::class)->names('admin.systems');
Route::post('admin/systems/updateModal',[SystemController::class,'updateModal']);


Route::resource('admin/subsystems',SubsystemController::class)->names('admin.subsystems');
Route::post('admin/subsystems/updateModal',[SubsystemController::class,'updateModal']);

Route::resource('admin/components',ComponentController::class)->names('admin.components');
Route::post('admin/components/updateModal',[ComponentController::class,'updateModal']);

