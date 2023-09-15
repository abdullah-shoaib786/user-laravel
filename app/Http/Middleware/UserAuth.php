<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserAuth
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure(\Illuminate\Http\Request): (\Illuminate\Http\Response|\Illuminate\Http\RedirectResponse)  $next
     * @return \Illuminate\Http\Response|\Illuminate\Http\RedirectResponse
     */
    public function handle(Request $request, Closure $next)
    {
        $path = $request->path();
        if($path == 'login' && Auth::user()){
            return redirect('home');
        }elseif($path == 'home' && !Auth::user()){
           return redirect('login');
            }elseif ($path == 'product' && !Auth::user()){
            return redirect('login');
        }elseif ($path == 'addProduct' && !Auth::user()){
            return redirect('login');
        }elseif ($path == 'editProduct' && !Auth::user()){
            return redirect('login');
        }elseif ($path == 'cartList' && !Auth::user()){
            return redirect('login');
        }

        return $next($request);
    }
}
