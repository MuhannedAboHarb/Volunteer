<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Carbon\Carbon;
use Illuminate\Support\Facades\Mail;

class AuthController extends Controller
{
    // دالة تسجيل مستخدم جديد
    public function register(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'email' => 'required|email|unique:users,email',
            'password' => 'required|min:8',
        ]);

        // إنشاء مستخدم جديد
        $user = User::create([
            'email' => $request->email,
            'password' => Hash::make($request->password),
            'role' => 'Volunteer',  // تعيين الدور الافتراضي
        ]);

        // إرجاع استجابة عند النجاح
        return response()->json([
            'message' => 'تم إنشاء المستخدم بنجاح.',
            'user' => $user
        ]);
    }

    // دالة تسجيل دخول المستخدم
    public function login(Request $request)
    {
        // التحقق من صحة المدخلات
        $request->validate([
            'email' => 'required|email',
            'password' => 'required',
        ]);

        // محاولة تسجيل الدخول
        if (Auth::attempt(['email' => $request->email, 'password' => $request->password])) {
            $user = Auth::user();
            $token = $user->createToken('API Token')->plainTextToken;

            // إرجاع استجابة تحتوي على التوكن
            return response()->json([
                'message' => 'تم تسجيل الدخول بنجاح.',
                'token' => $token
            ]);
        }

        // إرجاع استجابة عند فشل التسجيل
        return response()->json([
            'message' => 'البريد الإلكتروني أو كلمة المرور غير صحيحة.'
        ], 401);
    }

    // دالة تسجيل الخروج
    public function logout(Request $request)
    {
        // حذف التوكنات الخاصة بالمستخدم
        Auth::user()->tokens->each(function ($token) {
            $token->delete();
        });

        // إرجاع استجابة عند النجاح
        return response()->json([
            'message' => 'تم تسجيل الخروج بنجاح.'
        ]);
    }
}
