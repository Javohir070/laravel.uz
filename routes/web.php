<?php

use App\Http\Controllers\AnnoucementController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\NewsController;
use Illuminate\Support\Facades\Route;

use App\Http\Controllers\RoleController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ResponsibleController;
use App\Http\Controllers\XodimlarController;

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

// Route::get('/', [SiteController::class, 'index'])->name('frontend.home');
// Route::get('/views/{id}/{page:slug}', [SiteController::class, 'views'])->name('views');

// Route::get('/login', function () {
//     return view('login'); // login.blade.php faylini ko'rsatadi
// });

Route::get('/end-point', [HomeController::class,'endPoint']);
Route::get('/redirect-to-one-id', [UserController::class, 'redirectToOneId'])->name('redirectToOneId');
Route::get('/', [HomeController::class,'index'])->middleware('auth')->name('home.index');

Route::middleware('auth')->group(function () {
    Route::resources([
        'xodimlar' => XodimlarController::class,
        'news' => NewsController::class,
        'annoucement' => AnnoucementController::class,
        'responsible' => ResponsibleController::class,
    ]);
});





Route::group(['middleware' => ['role:super-admin|admin']], function() {
    Route::get('/searchxodimlar', [XodimlarController::class, 'searchxodimlar'])->name('searchxodimlar');
    Route::get('/searchuser', [UserController::class, 'searchuser'])->name('searchuser');
    Route::get('/searchxodim', [XodimlarController::class, 'searchEmployees'])->name('searchxodim');
    Route::resource('permissions', PermissionController::class);
    Route::get('permissions/{permissionId}/delete', [PermissionController::class, 'destroy']);
    Route::resource('roles', RoleController::class);
    Route::get('roles/{roleId}/delete', [RoleController::class, 'destroy']);
    Route::get('roles/{roleId}/give-permissions', [RoleController::class, 'addPermissionToRole']);
    Route::put('roles/{roleId}/give-permissions', [RoleController::class, 'givePermissionToRole']);
    Route::resource('users', UserController::class);
    Route::get('users/{userId}/delete', [UserController::class, 'destroy']);

});


Route::middleware('auth')->group(function () {
    Route::post('password/change', [UserController::class, 'changePassword'])->name('password.change');
    Route::get('/export-xodimlar', [XodimlarController::class, 'exporxodimlar']);
    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');
    Route::get('/profileview', [UserController::class, 'profileview'])->name('profileview.index');
    Route::get('/reformat-phones', [XodimlarController::class, 'reformatPhones']);
});
require __DIR__.'/auth.php';
