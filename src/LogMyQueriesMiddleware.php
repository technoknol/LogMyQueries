<?php

namespace technoknol\LogMyQueries;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Closure;

class LogMyQueriesMiddleware
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
        DB::connection()->enableQueryLog();
        return $next($request);
    }

    public function terminate() {

        Log::debug('LogMyQueries_START');
        $queries = DB::getQueryLog();
        foreach ($queries as $query) :
            $prep = $query['query'];
            foreach ($query['bindings'] as $binding) :
                if(is_string($binding)) {
                    $binding = '"'. $binding . '"';
                }
                $prep = preg_replace("#\?#", $binding, $prep, 1);
            endforeach;
            Log::debug($prep);
        endforeach;
        Log::debug('LogMyQueries_END');
    }
}
