<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\{
    BookingController,
    Booking_dbController,
    Auth\RegisterController,
    Auth\LoginController,
    UserController,
    DashboardController,
    ManageRoomsController,
    BookingHistoryController,
    CalendarController,
    ManageUsersController,
    ManageBuildingsController
};

// Public routes
Route::get('/', function () {
    return view('index');
});

Route::get('/booking', [BookingController::class, 'index'])->name('booking');
Route::get('/how-to-use', function () { return view('how_to_use'); });
Route::get('/usage', function () { return view('usage'); });
Route::get('/contact', function () { return view('contact'); });

// Authentication routes
Route::get('/login', [LoginController::class, 'showLoginForm'])->name('login');
Route::post('/login', [LoginController::class, 'login'])->name('login.post');
Route::post('/logout', [LoginController::class, 'logout'])->name('logout');

// Registration routes
Route::get('/register', function () { return view('register'); })->name('register');
Route::post('/register', [RegisterController::class, 'register'])->name('register.post');

// Admin routes
Route::middleware(['auth', 'can:admin-only'])->group(function () {
    // Dashboard
    Route::get('/admin/dashboard', function () { return view('admin.dashboard'); })->name('admin.dashboard');
    Route::get('/dashboard', [DashboardController::class, 'index'])->name('dashboard');
    
    // Room management
    Route::get('/manage-rooms', [ManageRoomsController::class, 'index'])->name('manage_rooms.index');
    Route::get('/manage-rooms/{buildingId}/rooms', [ManageRoomsController::class, 'showRooms'])->name('manage_rooms.show');
    Route::post('/rooms', [ManageRoomsController::class, 'store'])->name('manage_rooms.store');
    Route::get('/rooms/{id}', [ManageRoomsController::class, 'showRoomDetails'])->name('manage_rooms.details');
    Route::get('/rooms/{id}/edit', [ManageRoomsController::class, 'editRoom'])->name('manage_rooms.edit');
    Route::delete('/rooms/{id}', [ManageRoomsController::class, 'deleteRoom'])->name('manage_rooms.delete');
    
    // Other admin routes
    Route::get('/manage-users', [ManageUsersController::class, 'index'])->name('manage_users');
    Route::get('/booking_db', [Booking_dbController::class, 'index'])->name('booking_db');
    Route::get('/booking-history', [BookingHistoryController::class, 'index'])->name('booking_history');
    Route::get('/calendar', [CalendarController::class, 'index'])->name('calendar');
    
    // Building management
    Route::get('/manage-buildings', [ManageBuildingsController::class, 'index'])->name('manage.buildings');
    Route::post('/manage-buildings', [ManageBuildingsController::class, 'store'])->name('manage.buildings.store');
    Route::resource('manage/buildings', ManageBuildingsController::class);
});

// Profile routes
Route::middleware('auth')->group(function () {
    Route::get('/profile', function () { return view('profile'); });
    Route::post('/profile/update', [RegisterController::class, 'update'])->name('profile.update');
    Route::post('/user/change-password', [UserController::class, 'changePassword'])->name('user.changePassword');
});

// Booking routes
Route::post('/booking', [BookingController::class, 'create'])->name('booking.create');
