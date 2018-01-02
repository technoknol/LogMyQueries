# LogMyQueries
Laravel middleware to Log all queries being fired to Laravel log file. Uses Laravel's default monolog library and sniffs Eloquent queries

[![GitHub license](https://img.shields.io/badge/license-MIT-blue.svg)](https://github.com/technoknol/LogMyQueries/blob/master/LICENCE)

## Install via composer
Run the following command to pull in the latest version:

    composer require technoknol/log-my-queries


## Add middleware


Add the middleware to the `$middleware` array in the `app/Http/Kernel.php` file as follows:

    protected $middleware = [
            ...
            \technoknol\LogMyQueries\LogMyQueriesMiddleware::class
        ];

If you have `APP_DEBUG=true` and `APP_LOG_LEVEL=debug` you'll see all executed queries are being added in log file at `storage/logs/laravel.log`.

## Example from laravel.log
    [2018-01-02 09:20:26] local.DEBUG: LogMyQueries_STARTED  
    [2018-01-02 09:20:26] local.DEBUG: select * from "users" where "id" = 102 limit 1  
    [2018-01-02 09:20:26] local.DEBUG: LogMyQueries_STARTED  
    [2018-01-02 09:20:28] local.DEBUG: LogMyQueries_STARTED  
    [2018-01-02 09:20:28] local.DEBUG: select * from "users" where "id" = 102 limit 1  
    [2018-01-02 09:20:28] local.DEBUG: update "users" set "remember_token" = "1q8nbeh2k6MkneGz31DCJaVJd4H1cBroBBLs6yCfQUoGQaFBSuVLFt7Br7mr" where "id" = "102"  

That's it. You're done.
