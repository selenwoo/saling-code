<?php

namespace App\Http\Middleware;

use Closure;

class DetectLanguageMiddleware
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
        //取得cookie语言设置
        $language=$request->cookie('shop_laravel_language');

        switch ($language) {
            case 'zh-CN':
                app()->setLocale('zh-CN');
                break;
            
            default:
            case 'en':
            app()->setLocale('en');
            break;
        }
        return $next($request);
    }
}
