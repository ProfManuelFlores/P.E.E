<?php

namespace App\Http\Middleware;

use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Symfony\Component\HttpFoundation\Response;

class RedirectIfAuthenticated
{
    /**
     * Handle an incoming request.
     *
     * @param  \Closure(\Illuminate\Http\Request): (\Symfony\Component\HttpFoundation\Response)  $next
     */
    public function handle(Request $request, Closure $next, string ...$guards): Response
    {
        $guards = empty($guards) ? [null] : $guards;

        foreach ($guards as $guard) {
            if (Auth::guard($guard)->check()) {
                $user_role = Auth::user()->role;
                switch ($user_role) {
                    case 1:
                        return redirect('/inicio_admin');
                        break;
                    case 2:
                        return redirect('/inicio_alumno');
                        break;
                    case 3:
                        return redirect('/inicio_empresa');
                        break;
                    case 4:
                        return redirect('/inicio_asesor-academico');
                        break;
                    default:
                        Auth::logout();
                        return redirect('/login')->with('error', 'oops somethins went wrong!');
                        break;
                }
            }
        }

        return $next($request);
    }
}
