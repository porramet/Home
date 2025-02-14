<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\BookingController;
use App\Http\Controllers\Booking_dbController;
use App\Http\Controllers\Auth\RegisterController;
use App\Http\Controllers\Auth\LoginController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\ManageRoomsController;
use App\Http\Controllers\BookingHistoryController;
use App\Http\Controllers\CalendarController;
use App\Http\Controllers\ManageUsersController;
use App\Http\Controllers\ManageBuildingsController;

// Existing routes...
Route::get('/', function () {
    return view('index');
});

// หน้า จองห้อง
Route::get('/booking', [BookingController::class, 'index'])->name('booking');

// หน้า คำแนะนำการใช้งาน
Route::get('/how-to-use', function () {
    return view('how_to_use');
});

// หน้า เมนูการใช้งาน
Route::get('/usage', function () {
    return view('usage');
});

// หน้า ติดต่อเรา
Route::get('/contact', function () {
    return view('contact');
});
// Admin routes
Route::middleware(['auth', 'can:admin-only'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    
    Route::get('/manage-rooms', [ManageRoomsController::class, 'index'])->name('manage_rooms.index');
    Route::post('/manage-rooms', [ManageRoomsController::class, 'store'])->name('manage_rooms.store'); // New route for adding a room
    Route::get('/manage-rooms/{buildingId}/rooms', [ManageRoomsController::class, 'showRooms'])->name('manage_rooms.show'); // New route
    Route::get('/rooms/{id}', [ManageRoomsController::class, 'showRoomDetails'])->name('manage_rooms.details'); // New route for room details
    Route::get('/rooms/{id}/edit', [ManageRoomsController::class, 'editRoom'])->name('manage_rooms.edit');
    Route::delete('/rooms/{id}', [ManageRoomsController::class, 'deleteRoom'])->name('manage_rooms.delete');
    Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage_users');
    Route::get('/booking_db', [Booking_dbController::class, 'index'])->name('booking_db');
    Route::get('/booking-history', [BookingHistoryController::class, 'index'])->name('booking_history');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');

    // New routes for managing buildings
    Route::get('/manage-buildings', [ManageBuildingsController::class, 'index'])->name('manage.buildings');
    Route::post('/manage-buildings', [ManageBuildingsController::class, 'store'])->name('manage.buildings.store');
    Route::resource('manage/buildings', ManageBuildingsController::class);
});

// Existing routes continue...
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration routes
Route::get('/register', function () {
    return view('register');
})->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Profile routes
Route::get('/profile', function () {
    return view('profile');
})->middleware('auth');

// Route for the dashboard
Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard')->middleware(['auth', 'can:admin-only']);

// Admin routes
Route::middleware(['auth', 'can:admin-only'])->group(function () {
    Route::get('/admin/dashboard', function () {
        return view('admin.dashboard');
    })->name('admin.dashboard');
    Route::get('/manage-rooms', [ManageRoomsController::class, 'index'])->name('manage_rooms');
    Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage_users');
    Route::get('/booking_db', [Booking_dbController::class, 'index'])->name('booking_db');
    Route::get('/booking-history', [BookingHistoryController::class, 'index'])->name('booking_history');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
});

// Profile update routes
Route::post('/profile/update', [RegisterController::class, 'update'])->name('profile.update')->middleware('auth');

// Change password routes
Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');

Route::post('/booking', [BookingController::class, 'create'])->name('booking.create');
