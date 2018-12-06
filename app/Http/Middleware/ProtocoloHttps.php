<?php

namespace App\Http\Middleware;

use Closure;

class ProtocoloHttps
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
      if (!$request->secure() && env('APP_ENV') === 'production') {
          return redirect()->secure($request->getRequestUri());
      }

      return $next($request);
    }
}
