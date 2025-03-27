<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthController;
use App\Http\Controllers\VolunteerController;
use App\Http\Controllers\CompanyController;
use App\Http\Controllers\PostController;
use App\Http\Controllers\RequestController;
use App\Http\Controllers\VolunteerHistoryController;

Route::group(['prefix' => 'auth'], function () {
    // تسجيل مستخدم جديد
    Route::post('register', [AuthController::class, 'register']);
    
    // تسجيل دخول مستخدم
    Route::post('login', [AuthController::class, 'login']);
    
    // إرسال بريد التحقق
    Route::post('verify-email', [AuthController::class, 'sendVerificationEmail']);
    
    // تحقق البريد الإلكتروني
    Route::get('verify-email/{token}', [AuthController::class, 'verifyEmail']);
});

// تحديد Routes التي تتطلب توثيق باستخدام Sanctum
Route::middleware('auth:sanctum')->group(function () {
    // إظهار بيانات المستخدم الحالي
    Route::get('/user', function (Request $request) {
        return $request->user();
    });

    // تسجيل الخروج
    Route::post('logout', [AuthController::class, 'logout']);

    // جميع العمليات المتعلقة بالمتطوعين
    Route::apiResource('volunteers', VolunteerController::class);

    // جميع العمليات المتعلقة بالشركات
    Route::apiResource('companies', CompanyController::class);

    // جميع العمليات المتعلقة بالوظائف
    Route::apiResource('posts', PostController::class);
    
    // جميع العمليات المتعلقة بالطلبات
    Route::apiResource('requests', RequestController::class);

    // تاريخ المتطوعين
    Route::apiResource('volunteer-history', VolunteerHistoryController::class);
});

