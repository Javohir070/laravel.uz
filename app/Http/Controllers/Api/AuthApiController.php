<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\LoginRequest;
use App\Models\Annoucement;
use App\Models\News;
use App\Models\User;
use App\Models\Responsible;
use Illuminate\Validation\ValidationException;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AuthApiController extends Controller
{
    public function loginAPI(Request $request)
    {
        // Validayatsiya qilish (e-mail va password maydonlarini talab qilish)
        $request->validate([
            'email' => 'required|email',
            'password' => 'required'
        ]);

        // Foydalanuvchini email orqali topish
        $user = User::where('email', $request->email)->first();

        // Agar foydalanuvchi topilmasa yoki parol noto'g'ri bo'lsa, xatolik chiqarish
        if (! $user || ! Hash::check($request->password, $user->password)) {
            throw ValidationException::withMessages([
                'email' => ['The provided credentials are incorrect.'],
            ]);
        }

        // Agar login muvaffaqiyatli bo'lsa, foydalanuvchiga token yaratish
        $token = $user->createToken($request->email)->plainTextToken;
        // $roles = $user->roles()->pluck('name');
        // Javob qaytarish (response funksiyasi ta'riflanmaganligi uchun, direct return ishlatilgan)
        return response()->json([
            'message' => "Login muvaffaqiyatli bo'ldi",
            'token' => $token,
            'user' => [
                'name' => $user->name,
                'email' => $user->email,
                'role' => $user->roles()->pluck('name'),
            ]
        ]);
    }

    public function news() 
    {
       $news = News::all();
       
       return response()->json([
        'message' => "Yangiliklar",
        'news' => $news
       ]);
    }

    public function annoucement() 
    {
       $annoucement = Annoucement::all();
       
       return response()->json([
        'message' => "Tanlovlar",
        'annoucement' => $annoucement
       ]);
    }

    public function responsible() 
    {
       $responsible = Responsible::all();
       
       return response()->json([
        'message' => "masullar",
        'responsible' => $responsible
       ]);
    }
}
