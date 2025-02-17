<?php

use App\Http\Controllers\ClasseController;
use App\Http\Controllers\CourseController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ForgotPasswordController;
use App\Http\Controllers\LoginController;
use App\Http\Controllers\PermissionController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\RoleController;
use App\Http\Controllers\RolePermissionController;
use App\Http\Controllers\UserController;
use Illuminate\Support\Facades\Route;

// Login 
Route::get('/', [LoginController::class, 'index'])->name('login.index');
Route::post('/login', [LoginController::class, 'loginProcess'])->name('login.process');
Route::get('/logout', [LoginController::class, 'destroy'])->name('login.destroy');
Route::get('/create-user-login', [LoginController::class, 'create'])->name('login.create-user');
Route::post('/store-user-login', [LoginController::class, 'store'])->name('login.store-user');

// Recuperar senha
Route::get('/forgot-password', [ForgotPasswordController::class, 'showForgotPassword'])->name('forgot-password.show');
Route::post('/forgot-password', [ForgotPasswordController::class, 'submitForgotPassword'])->name('forgot-password.submit');

Route::get('/reset-password/{token}', [ForgotPasswordController::class, 'showResetPassword'])->name('password.reset');
Route::post('/reset-password', [ForgotPasswordController::class, 'submitResetPassword'])->name('reset-password.submit');


Route::group(['middleware' => 'auth'], function () {

    // Dashboard
    Route::get('/index-dashboard', [DashboardController::class, 'index'])->name('dashboard.index');

    // Perfil
    Route::get('/show-profile', [ProfileController::class, 'show'])->name('profile.show');
    Route::get('/edit-profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::put('/update-profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::get('/edit-profile-password', [ProfileController::class, 'editPassword'])->name('profile.edit-password');
    Route::put('/update-profile-password', [ProfileController::class, 'updatePassword'])->name('profile.update-password');

    // Usuários
    Route::get('/index-user', [UserController::class, 'index'])->name('user.index')->middleware('permission:index-user'); 
    Route::get('/show-user/{user}', [UserController::class, 'show'])->name('user.show')->middleware('permission:show-user'); 
    Route::get('/create-user', [UserController::class, 'create'])->name('user.create')->middleware('permission:create-user'); 
    Route::post('/store-user', [UserController::class, 'store'])->name('user.store')->middleware('permission:create-user'); 
    Route::get('/edit-user/{user}', [UserController::class, 'edit'])->name('user.edit')->middleware('permission:edit-user'); 
    Route::put('/update-user/{user}', [UserController::class, 'update'])->name('user.update')->middleware('permission:edit-user'); 
    Route::get('/edit-user-password/{user}', [UserController::class, 'editPassword'])->name('user.edit-password')->middleware('permission:edit-user-password'); 
    Route::put('/update-user-password/{user}', [UserController::class, 'updatePassword'])->name('user.update-password')->middleware('permission:edit-user-password'); 
    Route::delete('/destroy-user/{user}', [UserController::class, 'destroy'])->name('user.destroy')->middleware('permission:destroy-user'); 
    Route::get('/generate-pdf-user', [UserController::class, 'generatePdf'])->name('user.generate-pdf')->middleware('permission:generate-pdf-user'); 
    Route::get('/generate-csv-user', [UserController::class, 'generateCsv'])->name('user.generate-csv')->middleware('permission:generate-csv-user'); 

    // Cursos
    Route::get('/index-course', [CourseController::class, 'index'])->name('course.index')->middleware('permission:index-course'); 
    Route::get('/show-course/{course}', [CourseController::class, 'show'])->name('course.show')->middleware('permission:show-course');
    Route::get('/create-course', [CourseController::class, 'create'])->name('course.create')->middleware('permission:create-course');
    Route::post('/store-course', [CourseController::class, 'store'])->name('course.store')->middleware('permission:create-course');
    Route::get('/edit-course/{course}', [CourseController::class, 'edit'])->name('course.edit')->middleware('permission:edit-course');
    Route::put('/update-course/{course}', [CourseController::class, 'update'])->name('course.update')->middleware('permission:edit-course');
    Route::delete('/destroy-course/{course}', [CourseController::class, 'destroy'])->name('course.destroy')->middleware('permission:destroy-course');

    // Aulas
    Route::get('/index-classe/{course}', [ClasseController::class, 'index'])->name('classe.index')->middleware('permission:index-classe');
    Route::get('/show-classe/{classe}', [ClasseController::class, 'show'])->name('classe.show')->middleware('permission:show-classe');
    Route::get('/create-classe/{course}', [ClasseController::class, 'create'])->name('classe.create')->middleware('permission:create-classe');
    Route::post('/store-classe', [ClasseController::class, 'store'])->name('classe.store')->middleware('permission:create-classe');
    Route::get('/edit-classe/{classe}', [ClasseController::class, 'edit'])->name('classe.edit')->middleware('permission:edit-classe');
    Route::put('/update-classe/{classe}', [ClasseController::class, 'update'])->name('classe.update')->middleware('permission:edit-classe');
    Route::delete('/destroy-classe/{classe}', [ClasseController::class, 'destroy'])->name('classe.destroy')->middleware('permission:destroy-classe');

    // Papéis
    Route::get('/index-role', [RoleController::class, 'index'])->name('role.index')->middleware('permission:index-role'); 
    Route::get('/create-role', [RoleController::class, 'create'])->name('role.create')->middleware('permission:create-role'); 
    Route::post('/store-role', [RoleController::class, 'store'])->name('role.store')->middleware('permission:create-role'); 
    Route::get('/edit-role/{role}', [RoleController::class, 'edit'])->name('role.edit')->middleware('permission:edit-role'); 
    Route::put('/update-role/{role}', [RoleController::class, 'update'])->name('role.update')->middleware('permission:edit-role'); 
    Route::delete('/destroy-role/{role}', [RoleController::class, 'destroy'])->name('role.destroy')->middleware('permission:destroy-role'); 

    // Permissão do papel
    Route::get('/index-role-permission/{role}', [RolePermissionController::class, 'index'])->name('role-permission.index')->middleware('permission:index-role-permission'); 
    Route::get('/update-role-permission/{role}/{permission}', [RolePermissionController::class, 'update'])->name('role-permission.update')->middleware('permission:update-role-permission');

    // Permissões ou páginas
    Route::get('/index-permission', [PermissionController::class, 'index'])->name('permission.index');
    Route::get('/show-permission/{permission}', [PermissionController::class, 'show'])->name('permission.show');
    Route::get('/create-permission', [PermissionController::class, 'create'])->name('permission.create');
    Route::post('/store-permission', [PermissionController::class, 'store'])->name('permission.store');
    Route::get('/edit-permission/{permission}', [PermissionController::class, 'edit'])->name('permission.edit');
    Route::put('/update-permission/{permission}', [PermissionController::class, 'update'])->name('permission.update');
    Route::delete('/destroy-permission/{permission}', [PermissionController::class, 'destroy'])->name('permission.destroy');

});
