<?php

namespace App\Http\Middleware;

use Closure;

class isLogined
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
        $sessionId = $request->session()->get('idAdmin');
        $sessionId = is_numeric($sessionId) && $sessionId > 0 ? true : false;//kiem tra so id tra ve dung sai
        if($sessionId){
            return redirect()->route('admin.dashboard');
        }
        return $next($request);
    }
}
