<?php

namespace App\Http\Controllers;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Pest\Support\Str;

class UserController extends Controller
{
    public function register(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email",
            "password" => [
                "required",
                "min:5",
                "regex:/^[A-Za-z#_\-\$]+$/",
                "regex:/[A-Z]{1}/",
                "regex:/[a-z]{1}/",
                "regex:/[#_\-\$]{1}/"
            ],
        ]);
        User::create($data + ["superuser" => false]);
        return response()->json(["message" => true], 201);
    }

    public function auth(Request $request)
    {
        $data = $request->validate([
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::attempt($data)) {
            $user = Auth::user();
            Auth::login($user);
            $token = Str::random();
            $hashed = hash("sha256", $token);
            PersonalAccessToken::create([
                "token" => $hashed,
                "user_id" => $user->id,
                "expires_at" => now()->addHours(3),
                "is_valid" => true
            ]);
            return response()->json(["token" => $token]);
        }
    }
}
