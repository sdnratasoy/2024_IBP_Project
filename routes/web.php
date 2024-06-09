<?php

use App\Http\Controllers\AuthManager;
use Illuminate\Auth\AuthManager as AuthAuthManager;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\DashboardController;
use App\Http\Controllers\MessageController;


Route::get('/', function () {
    return view('welcome');
})->name('home');


Route::get('/login',[AuthManager::class,'login'])->name('login');
Route::post('/login',[AuthManager::class,'loginPost'])->name('login.post');
Route::get('/registration',[AuthManager::class,'registration'])->name('registration');
Route::post('/registration',[AuthManager::class,'registrationPost'])->name('registration.post');
Route::get('/logout',[AuthManager::class,'logout'])->name('logout');

Route::middleware(['role:admin'])->group(function () {
    Route::get('/admin', [AdminController::class, 'index']);
    Route::get('/admin/users', [AdminController::class, 'listUsers'])->name('admin.users');
    Route::get('/admin/users/{user}/edit', [AdminController::class, 'edit'])->name('admin.edit');
    Route::delete('/admin/users/{user}', [AdminController::class, 'delete'])->name('admin.delete');
    Route::patch('/admin/users/{user}', [AdminController::class, 'update'])->name('admin.update');
    Route::post('/admin/users/addUser', [AdminController::class, 'addUser'])->name('admin.addUser');
    Route::get('/admin/users/create', [AdminController::class, 'create'])->name('admin.create');
    Route::get('/admin/users/search', [AdminController::class, 'search'])->name('admin.search');

    // Product Routes
    Route::get('/admin/products', [AdminController::class, 'listProducts'])->name('admin.products');
    Route::get('/admin/products/create', [AdminController::class, 'createProduct'])->name('admin.products.create');
    Route::post('/admin/products', [AdminController::class, 'storeProduct'])->name('admin.products.store');
    Route::get('/admin/products/{product}/edit', [AdminController::class, 'editProduct'])->name('admin.products.edit');
    Route::patch('/admin/products/{product}', [AdminController::class, 'updateProduct'])->name('admin.products.update');
    Route::delete('/admin/products/{product}', [AdminController::class, 'deleteProduct'])->name('admin.products.delete');
    Route::get('/admin/products/searchProducts', [AdminController::class, 'searchProducts'])->name('admin.products.searchProducts');

    // Duyuru Routes
    Route::get('/admin/announcements', [AdminController::class, 'listAnnouncements'])->name('admin.announcements');
    Route::get('/admin/announcements/create', [AdminController::class, 'createAnnouncement'])->name('admin.announcements.create');
    Route::post('/admin/announcements', [AdminController::class, 'storeAnnouncement'])->name('admin.announcements.store');
    Route::get('/admin/announcements/{announcement}/edit', [AdminController::class, 'editAnnouncement'])->name('admin.announcements.edit');
    Route::patch('/admin/announcements/{announcement}', [AdminController::class, 'updateAnnouncement'])->name('admin.announcements.update');
    Route::delete('/admin/announcements/{announcement}', [AdminController::class, 'deleteAnnouncement'])->name('admin.announcements.delete');
    Route::get('/admin/announcements/searchAnnouncements', [AdminController::class, 'searchAnnouncements'])->name('admin.announcements.searchAnnouncements');
});

Route::middleware(['role:customer'])->group(function () {
    Route::get('/dashboard', [DashboardController::class, 'index']);
});

Route::middleware(['auth'])->group(function () {
    Route::get('/profile', [AuthManager::class, 'profile'])->name('profile');
    Route::post('/profile/update-password', [AuthManager::class, 'updatePassword'])->name('update-password');
    Route::get('/messages', [MessageController::class, 'index'])->name('messages.index');
    Route::get('/messages/create', [MessageController::class, 'create'])->name('messages.create');
    Route::post('/messages', [MessageController::class, 'store'])->name('messages.store');
    Route::get('/messages/{user}', [MessageController::class, 'show'])->name('messages.show');
    Route::post('/messages/{user}', [MessageController::class, 'storeMessage'])->name('messages.storeMessage');
});