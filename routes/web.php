<?php

use Illuminate\Support\Facades\Route;

// ===================================
// ========= PUBLIC ROUTE ============
// ===================================
Route::get('/', 'App\Http\Controllers\ViewController@landing')->name('landing');


// ===================================
// ===== AUTHENTICATION ROUTES =======
// ===================================
// LOGIN PAGE ROUTE
Route::get('/login', 'App\Http\Controllers\ViewController@login')->name('login');
// REGISTER PAGE ROUTE
Route::get('/register', 'App\Http\Controllers\ViewController@register')->name('register');
// LOGIN POST
Route::post('/login', 'App\Http\Controllers\AuthController@loginPost')->name('login.post');
// REGISTER POST
Route::post('/register', 'App\Http\Controllers\AuthController@registerPost')->name('register.post');
// LOGOUT
Route::get('/logout', 'App\Http\Controllers\AuthController@logout')->name('logout');


// ====================================
// ========== USER REQUESTS ===========
// ====================================
// user
Route::get('/user', 'App\Http\Controllers\ViewController@user')->name('user');

// Views
// Route::get('/admin', 'App\Http\Controllers\ViewController@adminDashboard')->name('admin-dashboard');
Route::get('/admin/genre', 'App\Http\Controllers\ViewController@adminGenre')->name('admin.genre');
// Route::get('/admin/project/rr', 'App\Http\Controllers\ViewController@adminRR')->name('admin-rr');
// Route::get('/admin/project/ra', 'App\Http\Controllers\ViewController@adminRA')->name('admin-ra');
// Route::get('/admin/project/rtp', 'App\Http\Controllers\ViewController@adminRTP')->name('admin-rtp');
// Route::get('/admin/project/all', 'App\Http\Controllers\ViewController@adminAll')->name('admin-all');

// ====================================
// ========== ADMIN REQUESTS ==========
// ====================================
// ADMIN LOGIN
Route::get('/admin', 'App\Http\Controllers\ViewController@adminDashboard')->name('admin');
// PROCESS PROFILE
Route::get('/admin/pp', 'App\Http\Controllers\Admin\ProcessProfileController@view')->name('admin.pp');
Route::post('/admin/pp/create', 'App\Http\Controllers\Admin\ProcessProfileController@create')->name('admin.pp.create');
// THREAT PROFILE
Route::get('/admin/tp', 'App\Http\Controllers\Admin\ThreatProfileController@view')->name('admin.tp');
Route::post('/admin/tp/create', 'App\Http\Controllers\Admin\ThreatProfileController@create')->name('admin.tp.create');
// VULNERABILITY PROFILE
Route::get('/admin/vp', 'App\Http\Controllers\Admin\VulnProfileController@view')->name('admin.vp');
Route::post('/admin/vp/create', 'App\Http\Controllers\Admin\VulnProfileController@create')->name('admin.vp.create');
// PROJECTS
Route::get('/admin/project', 'App\Http\Controllers\ViewController@adminProject')->name('admin-project');
// USER MANAGEMENT
Route::get('/admin/user-management', 'App\Http\Controllers\Admin\UserManagementController@view')->name('user-management');