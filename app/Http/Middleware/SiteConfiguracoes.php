<?php

namespace App\Http\Middleware;

use Illuminate\Support\Facades\Session;
use Illuminate\Support\Facades\Auth;
use Closure;
use Illuminate\Http\Request;
use App\Models\Configuracoes;
use Config;

class SiteConfiguracoes {

    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */
    public function handle(Request $request, Closure $next) {
        Config::set('config', Configuracoes::first());

        return $next($request);
    }

}
