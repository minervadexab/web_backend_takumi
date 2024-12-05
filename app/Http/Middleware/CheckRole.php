<?php

namespace App\Http\Middleware;

use App\Models\SettingRole;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class CheckRole
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     * @param  string  ...$roles
     */
    public function handle(Request $request, Closure $next, ...$roles): Response
    {
        // Cek apakah user sudah login atau belum
        if (Auth::check()) {
            // Ambil role user dari database
            $userRole = SettingRole::where('users_id', Auth::id())->first();
            
            if ($userRole && in_array($userRole->roles_id, $roles)) {
                return $next($request);
            } else {
                $response = [
                    'success' => false,
                    'message' => 'You do not have permission to access this resource.',
                ];
                return response()->json($response, 403);
            }
        } else {
            $response = [
                'success' => false,
                'message' => 'You must be logged in to access this resource.',
            ];
            return response()->json($response, 401);
        }
    }
}
