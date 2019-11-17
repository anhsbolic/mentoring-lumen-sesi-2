<?php

namespace App\Http\Middleware;

use App\UserProfile;
use Closure;

class MaleMiddleware
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
        try {
            $profile = UserProfile::where('user_id', $request->route('userId'))->firstOrFail();
            if ($profile->gender != UserProfile::MALE) {
                $data = [
                    'code' => 403,
                    'message' => 'Ini Hanya Untuk Pria',
                    'data' => []
                ];
                return response()->json($data, 403);    
            } 
        } catch(Exception $e) {
            $data = [
                'code' => 500,
                'message' => 'Internal Server Error',
                'data' => []
            ];
            return response()->json($data, 500);
        }

        return $next($request);
    }
}
