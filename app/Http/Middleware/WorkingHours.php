<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class WorkingHours
{
    public function handle(Request $request, Closure $next): Response
    {
        $hour = (int) now()->setTimezone('Asia/Almaty')->format('G');

        if ($hour < 9 || $hour >= 18) {
            abort(403, 'Админ-панель доступна с 09:00 до 18:00.');
        }

        return $next($request);
    }
}
