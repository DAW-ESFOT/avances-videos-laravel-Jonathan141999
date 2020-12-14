<?php
namespace App\Http\Middleware;
use Closure;
class Cors
{
    public function handle($request, Closure $next)
    {
        $request->header('Access-Control-Allow-Origin', '*');
        $request->header('Access-Control-Allow-Methods', 'GET, POST, PUT,
DELETE, OPTIONS');
        $request->header('Access-Control-Allow-Headers','X-Requested-With , Content-Type,
, X-Token-Auth, Authorization');
        return $next($request);
    }
}
