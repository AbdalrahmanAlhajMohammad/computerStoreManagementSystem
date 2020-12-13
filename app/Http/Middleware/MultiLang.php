<?php

namespace App\Http\Middleware;

use Closure;
use App\Link;
use Illuminate\Support\Facades\App;

class MultiLang
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
        if(!strstr(request()->path(),'api/') && !strstr(request()->path(),'images/') && !strstr(request()->path(),'assets/')){
            if(auth()->user())
             App::setLocale(auth()->user()->lang);
        }
        return $next($request);
    }
}
