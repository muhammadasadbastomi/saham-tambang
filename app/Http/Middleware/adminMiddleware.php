<?php

namespace App\Http\Middleware;

use Closure;

use Auth;
use App\User;

class adminMiddleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle($request, Closure $next)
    {
        $user = Auth::user();

        if($user){
          if ($user->isAdmin()){
              return $next($request);
          }

        }

        return abort(403);

    }
}
