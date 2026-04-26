<?php

namespace App\Http\Middleware;

use App\Models\PersonalAccessToken;
use App\Models\User;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class AuthMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  Closure(Request): (Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $token = $request->bearerToken();
        if (!$token) return response()->json(["message" => "Forbidden for you"], 403);
        $tokenDb = PersonalAccessToken::where("token", hash("sha256", $token))->first();
        if (!$tokenDb || !$tokenDb->is_valid || now() > $tokenDb->expires_at) return response()->json(["message" => "Forbidden for you"], 403);
        return $next($request);
    }
}
