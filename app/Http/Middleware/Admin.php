<?php

namespace App\Http\Middleware;

use App\Http\Requests\StatusRequest;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class Admin
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        $user = auth()->user();
        $check = auth()->check();
        if($user['email'] != 'admin@admin.ru'){
            return to_route('index');
        }
        return $next($request);
    }
}
