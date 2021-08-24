<?php

namespace App\Http\Middleware;

use Closure;

class OperateLog
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
        if ($request->session()->has('config') && $request->session()->get('config.operate_log')==1){
            \App\Models\Backend\OperateLog::create([
                'user_id' => $request->user()->id,
                'uri' => $request->getUri(),
                'parameter' => http_build_query($request->except(['_token','_method'])),
                'method' => $request->getMethod(),
            ]);
        }
        return $next($request);
    }
}
