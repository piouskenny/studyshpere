<?php

namespace App\Http\Middleware;

use App\Models\Tutor;
use Closure;
use Illuminate\Http\Request;
use Symfony\Component\HttpFoundation\Response;

class TutorAuthmiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next): Response
    {
        if (!session()->has('Tutor')) {
            return redirect(route('login_page'));
        } elseif (session()->has('Tutor')) {
            $tutor = Tutor::where('id', '=', session('Tutor'))->first();
        }

        return $next($request);
    }
}
