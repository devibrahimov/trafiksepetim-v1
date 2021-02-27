<?php
/**
 * @author KOALAMEDYA
 * @company EMRE AKINCL A.Ş.
 * @url koalamedya.com
 * @date 30.11.2020
 * @developer Baylar Ibrahimov
 *
 */
namespace App\Http\Middleware;

use Closure;

class ApiToken
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
        $auth = $request->header('Authorization');
        if ($auth){
            $token = str_replace('Bearer ','',$auth);
            if (!$token){
                return response()->json([
                    'message' => 'No Bearer Token!'
                ],401);
            }
            if ($token != 'T1r4a5f3ikkOnYAS2e0p2e0timK1O4A5L3A' ){
                return response()->json([
                    'message' => 'Invalid Bearer Token!'
                ],401);
            }else{
                return $next($request);
            }
        }else{
            return response()->json([
                'message' => 'Not a Valid Bearer Token!'
            ],401);
        }
    }
}
