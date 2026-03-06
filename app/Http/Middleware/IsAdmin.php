<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth; // <-- Tambahkan ini
use Symfony\Component\HttpFoundation\Response;

class IsAdmin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        // Gunakan Facade Auth agar Intelephense bisa membacanya
        if (!Auth::check()) {
            return redirect()->route('login');
        }

        // Berikan petunjuk ke Intelephense
        /** @var \App\Models\User $user */
        $user = Auth::user();

        // Sekarang Intelephense tahu bahwa $user memiliki method isAdmin()
        if (!$user->isAdmin()) {
            abort(403, 'Unauthorized access. Admin only.');
        }

        return $next($request);
    }
}
