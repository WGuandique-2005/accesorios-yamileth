<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\ProductController;
use App\Http\Controllers\OrderController;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\ReviewController;
use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\ReviewController as AdminReviewController;
use App\Http\Controllers\Admin\AnalyticsController;
use App\Http\Controllers\Admin\ProductController as AdminProductController;
use App\Http\Controllers\Admin\OrderController as AdminOrderController;
use App\Http\Controllers\Admin\ClientController as AdminClientController;

// Public routes
Route::get('/', [WelcomeController::class, 'index']);
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);
});
Route::post('/logout', [AuthController::class, 'logout'])->name('logout');

// Authenticated routes
Route::middleware('auth')->group(function () {
    Route::get('/home', [HomeController::class, 'index'])->name('home');
    Route::get('/productos/{id}', [ProductController::class, 'show'])->name('productos.show');
    Route::get('/encargos/crear', [OrderController::class, 'create'])->name('encargos.create');
    Route::post('/encargos', [OrderController::class, 'store'])->name('encargos.store');
    Route::get('/mis-encargos', [OrderController::class, 'myOrders'])->name('mis-encargos');
    Route::post('/reseñas', [ReviewController::class, 'store'])->name('resenas.store');
    Route::get('/perfil', [ProfileController::class, 'show'])->name('perfil.show');
    Route::post('/perfil', [ProfileController::class, 'update'])->name('perfil.update');
    Route::delete('/perfil', [ProfileController::class, 'destroy'])->name('perfil.destroy');
});

// Admin routes
Route::middleware(['auth', 'admin'])->group(function () {
    Route::get('/admin/dashboard', [DashboardController::class, 'index'])->name('admin.dashboard');
    Route::get('/admin/resenas', [AdminReviewController::class, 'index'])->name('admin.resenas.index');
    Route::get('/admin/analitica', [AnalyticsController::class, 'index'])->name('admin.analitica');
    Route::get('/admin/inventario', [AdminProductController::class, 'index'])->name('admin.inventario.index');
    Route::get('/admin/inventario/crear', [AdminProductController::class, 'create'])->name('admin.inventario.create');
    Route::post('/admin/inventario', [AdminProductController::class, 'store'])->name('admin.inventario.store');
    Route::get('/admin/inventario/{id}/editar', [AdminProductController::class, 'edit'])->name('admin.inventario.edit');
    Route::put('/admin/inventario/{id}', [AdminProductController::class, 'update'])->name('admin.inventario.update');
    Route::delete('/admin/inventario/{id}', [AdminProductController::class, 'destroy'])->name('admin.inventario.destroy');
    Route::patch('/admin/inventario/{id}/toggle', [AdminProductController::class, 'toggle'])->name('admin.inventario.toggle');

    Route::get('/admin/pedidos', [AdminOrderController::class, 'index'])->name('admin.pedidos.index');
    Route::get('/admin/pedidos/{id}', [AdminOrderController::class, 'show'])->name('admin.pedidos.show');
    Route::patch('/admin/pedidos/{id}/estado', [AdminOrderController::class, 'updateEstado'])->name('admin.pedidos.estado');

    Route::get('/admin/clientes', [AdminClientController::class, 'index'])->name('admin.clientes.index');
    Route::get('/admin/clientes/{id}', [AdminClientController::class, 'show'])->name('admin.clientes.show');
    Route::delete('/admin/clientes/{id}', [AdminClientController::class, 'destroy'])->name('admin.clientes.destroy');
});
