<?php

namespace App\Http\Middleware;

use Closure,Hash;

class SECRETKEY
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
        $token = $request->header('SECRET_KEY');
        $SecretKey = '$2y$10$qfcI7OcBO0WaOjDWDheu.eJC9YrziEKYmYvUE4J6f5qmSrUdkZRZ.'; //123456
        if(!Hash::check($token,$SecretKey)){
            return response()->json([
                'message' => 'Invalid Credential API Key'
            ],401);
        }
        return $next($request);
    }
}
