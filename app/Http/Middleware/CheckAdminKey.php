<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class CheckAdminKey
{
    public function handle(Request $request, Closure $next): Response
    {
        $key = $request->query('key');

        if ($key === 'barber2026') {
            session(['admin_key_valid' => true]);
        }

        if (!session('admin_key_valid')) {
            abort(403, 'Доступ запрещён. Укажите правильный ключ администратора.');
        }

        return $next($request);
    }
}
