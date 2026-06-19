<?php

use Illuminate\Support\Facades\Route;

use App\Http\Controllers\WelcomeController;
use App\Http\Controllers\HomeController;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\Auth\PasswordResetController;
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
use App\Http\Controllers\Admin\InvoiceController as AdminInvoiceController;
use App\Http\Controllers\Admin\ShipmentController as AdminShipmentController;

// Public routes
Route::get('/', [WelcomeController::class, 'index']);
Route::middleware('guest')->group(function () {
    Route::get('/login', [AuthController::class, 'showLogin'])->name('login');
    Route::post('/login', [AuthController::class, 'login']);
    Route::get('/register', [AuthController::class, 'showRegister'])->name('register');
    Route::post('/register', [AuthController::class, 'register']);

    Route::get('/forgot-password', [PasswordResetController::class, 'create'])->name('password.request');
    Route::post('/forgot-password', [PasswordResetController::class, 'store'])->name('password.email');
    Route::get('/reset-password/{token}', [PasswordResetController::class, 'edit'])->name('password.reset');
    Route::post('/reset-password', [PasswordResetController::class, 'update'])->name('password.update');
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
    Route::patch('/admin/pedidos/{id}/envio', [AdminOrderController::class, 'updateEnvio'])->name('admin.pedidos.envio');

    Route::get('/admin/clientes', [AdminClientController::class, 'index'])->name('admin.clientes.index');
    Route::get('/admin/clientes/{id}', [AdminClientController::class, 'show'])->name('admin.clientes.show');
    Route::delete('/admin/clientes/{id}', [AdminClientController::class, 'destroy'])->name('admin.clientes.destroy');

    Route::get('/admin/facturas', [AdminInvoiceController::class, 'index'])->name('admin.facturas.index');
    Route::get('/admin/facturas/crear', [AdminInvoiceController::class, 'create'])->name('admin.facturas.create');
    Route::post('/admin/facturas', [AdminInvoiceController::class, 'store'])->name('admin.facturas.store');
    Route::get('/admin/facturas/{id}', [AdminInvoiceController::class, 'show'])->name('admin.facturas.show');
    Route::delete('/admin/facturas/{id}', [AdminInvoiceController::class, 'destroy'])->name('admin.facturas.destroy');

    Route::post('/admin/envios/{order_id}', [AdminShipmentController::class, 'store'])->name('admin.envios.store');
    Route::get('/admin/envios', [AdminShipmentController::class, 'index'])->name('admin.envios.index');
    Route::patch('/admin/envios/{id}', [AdminShipmentController::class, 'update'])->name('admin.envios.update');
});
