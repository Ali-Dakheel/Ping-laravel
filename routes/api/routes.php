<?php

declare(strict_types=1);

use Illuminate\Support\Facades\Route;
use Illuminate\Http\Request;

Route::middleware(['auth:sanctum', 'throttle:api'])->group(static function (): void {
    Route::get('user', static function (Request $request) {
        return $request->user()->name('user');
    });

    Route::prefix('services')->as('services:')->group(base_path('routes/api/services.php'))->middleware(['throttle:100,1']);
    Route::prefix('checks')->as('checks:')->group(base_path('routes/api/checks.php'));
    Route::prefix('credentials')->as('credentials:')->group(base_path('routes/api/credentials.php'));

});

