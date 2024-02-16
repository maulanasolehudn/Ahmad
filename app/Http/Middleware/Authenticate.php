<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;
use Illuminate\Http\Request;

class Authenticate extends Middleware
{
    /**
     * Get the path the user should be redirected to when they are not authenticated.
     */
    protected function redirectTo(Request $request): ?string
    {
        return $request->expectsJson() ? null : route('login');
    }
    
    public function handle($request, Closure $next, ...$guards)
{
    $this->authenticate($request, $guards);

    if ($request->expectsJson()) {
        return response()->json(['message' => 'Unauthenticated.'], 401);
    }

    // Tambahkan notifikasi di sini
    if (! $request->user()) {
        return redirect()->route('login')->with('error', 'Email atau password yang anda masukan salah!');
    }

    return $next($request);
}


}
