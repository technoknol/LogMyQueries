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
That's it. You're done.