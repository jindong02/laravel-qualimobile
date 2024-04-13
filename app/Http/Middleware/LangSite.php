<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Closure;
use Illuminate\Http\Request;
use Config;
use App;

class LangSite {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {

        App::setLocale((Session::get('lang') !== null) ? Session::get('lang') : Config::get('config.idioma_padrao'));

        return $next($request);
    }

}
