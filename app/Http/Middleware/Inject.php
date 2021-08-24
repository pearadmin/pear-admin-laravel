<?php

namespace App\Http\Middleware;

use Closure;

class Inject
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
        $ua = $_SERVER['HTTP_USER_AGENT'];
        $now_ua = array('Mozilla','FeedDemon ','BOT/0.1 (BOT for JCE)','CrawlDaddy ','Java','Feedly','UniversalFeedParser','ApacheBench','Swiftbot','ZmEu','Indy Library','oBot','jaunty','YandexBot','AhrefsBot','MJ12bot','WinHttp','EasouSpider','HttpClient','Microsoft URL Control','YYSpider','jaunty','Python-urllib','lightDeckReports Bot');
        if(!$ua) {
            header("Content-type: text/html; charset=utf-8");
            die('禁止采集！');
        }else{
            foreach($now_ua as $value ){
                if (preg_match_all ('/('.$value.')/', $ua,$regs)) {
                    header("Content-type: text/html; charset=utf-8");
                    die('禁止采集！');
                }else{
                    return $next($request);
                }
            }
        }
    }
}
