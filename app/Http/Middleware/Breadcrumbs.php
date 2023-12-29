<?php 
// App\Http\Middleware\Breadcrumbs.php

namespace App\Http\Middleware;

use Closure;

class Breadcrumbs
{
    public function handle($request, Closure $next)
    {
        view()->share('breadcrumbs', [
            ['link' => url('/'), 'name' => 'Dashboard'],
            // ... tambahkan breadcrumb lainnya
        ]);

        return $next($request);
    }
}
