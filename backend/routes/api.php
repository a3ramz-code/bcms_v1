<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\UserController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\RouterController;
use App\Http\Controllers\InvoiceController;
use App\Http\Controllers\PaymentController;
use App\Http\Controllers\ReminderController;
use App\Http\Controllers\TicketController;
use App\Http\Controllers\AuditLogController;

Route::prefix('auth')->group(function () {
    Route::post('login', [AuthController::class, 'login']);
    Route::post('logout', [AuthController::class, 'logout'])->middleware('auth:sanctum');
    Route::get('me', [AuthController::class, 'me'])->middleware('auth:sanctum');
});

Route::middleware('auth:sanctum')->group(function () {
    Route::apiResource('companies', CompanyController::class);
    Route::apiResource('users', UserController::class);
    Route::apiResource('customers', CustomerController::class);
    Route::apiResource('services', ServiceController::class);
    Route::apiResource('routers', RouterController::class);

    Route::get('invoices', [InvoiceController::class, 'index']);
    Route::post('invoices/generate-basic', [InvoiceController::class, 'generateBasic']);

    Route::post('payments', [PaymentController::class, 'store']);

    Route::get('reminders', [ReminderController::class, 'index']);

    Route::apiResource('tickets', TicketController::class);

    Route::get('audit-logs', [AuditLogController::class, 'index']);
});
