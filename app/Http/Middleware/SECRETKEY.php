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
        $SecretKey = '$2y$10$WUUShjUudKM2s2DCK8sZV.Zy.tr.2lWnf/OzhsuI49uzFWZAMas5i';
        if(!Hash::check($token,$SecretKey)){
            return response()->json([
                'message' => 'Invalid Credential API Key'
            ],401);
        }
        return $next($request);
    }
}
