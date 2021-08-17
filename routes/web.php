<?php

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
    return view('welcome');
});

Auth::routes();

Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');

// Route::group(['middleware' => 'isAdmin'], function () {
//     Route::get('/admin', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin_home');
// });

// need to be admin
Route::middleware('App\Http\Middleware\isAdmin')->group(function () {
    Route::get('/admin', [App\Http\Controllers\AdminController::class, 'adminDashboard'])->name('admin_home');
});

// need to be logged in
Route::middleware('App\Http\Middleware\Authenticate')->group(function () {
    Route::get('/home', [App\Http\Controllers\HomeController::class, 'index'])->name('home');
    Route::get('/profil', [App\Http\Controllers\UserController::class, 'profil'])->name('profil');
    Route::get('/character/create/{step}/{idChara?}', [App\Http\Controllers\CharacterController::class, 'create'])->name('chara.create');
    Route::post('/character/store/{step}/{idChara?}', [App\Http\Controllers\CharacterController::class, 'store'])->name('chara.store');
    Route::post('/character/create/building/{idChara}', [App\Http\Controllers\CharacterController::class, 'building'])->name('chara.building');
    Route::get('/character/show/{idChara}', [App\Http\Controllers\CharacterController::class, 'show'])->name('chara.show');
    Route::get('/character/destroy/{idChara}', [App\Http\Controllers\CharacterController::class, 'destroy'])->name('chara.destroy');

    Route::post('/character/store/building/feature_choice/{idChara}', [App\Http\Controllers\CharacterController::class, 'buildingFeatureChoiceStore'])->name('chara.building.feature_choice.store');
    Route::post('/character/store/building/level/{idChara}', [App\Http\Controllers\CharacterController::class, 'buildingLevelStore'])->name('chara.building.level.store');
    Route::post('/character/store/building/subclass/{idChara}', [App\Http\Controllers\CharacterController::class, 'buildingSubClassStore'])->name('chara.building.subclass.store');
    Route::post('/character/store/building/hitdice/{idChara}', [App\Http\Controllers\CharacterController::class, 'buildingHitDiceStore'])->name('chara.building.hitdice.store');

    Route::post('/character/store/fastbuilding/{idChara}', [App\Http\Controllers\CharacterController::class, 'fastBuildingLevelStore'])->name('chara.fastbuilding.level.store');

});

Auth::routes();

Route::get('/class/{id}/showsubclasses', [App\Http\Controllers\DndClassController::class, 'showSubClass'])->name('show.subClass');
Route::get('/class/{id}/showsubclassesbylevel/{level}', [App\Http\Controllers\DndClassController::class, 'showSubClassLevelN'])->name('show.subClassLevelN');
Route::get('/class/{id}/showarchetype', [App\Http\Controllers\DndClassController::class, 'showArchetype'])->name('show.archetype');

Route::get('/race/{id}/showsubraces', [App\Http\Controllers\RaceController::class, 'showSubraces'])->name('show.subrace');

Route::get('/test/{id}/', [App\Http\Controllers\CharacterController::class, 'test'])->name('test');
