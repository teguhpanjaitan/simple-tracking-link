<?php

use App\Http\Controllers\LeadController;
use Illuminate\Support\Facades\Route;

Route::get('/', fn() => redirect()->route('lander'));

Route::get('/lander', [LeadController::class, 'lander'])->name('lander');
Route::post('/leads', [LeadController::class, 'store'])->name('leads.store');

Route::get('/admin', [LeadController::class, 'admin'])->name('admin');
Route::get('/tracker-logs', [LeadController::class, 'trackerLogs'])->name('tracker.logs');

Route::get('/thankyou', [LeadController::class, 'thankyou'])->name('thankyou');
Route::get('/simulate-conversion', [LeadController::class, 'simulateConversion'])->name('simulate.conversion');
