<?php

namespace App\Console;

use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // HOW TO RUN
        // ./vendor/bin/sail artisan schedule:work
        // ^^^ testing purposes
        // ./vendor/bin/sail artisan schedule:run
        // ^^^ server purposes
        // Go to storage/logs/laravel.log for debugging
        $schedule->call(function () {
            $response = Http::get('https://min-api.cryptocompare.com/data/price?fsym=ETH&tsyms=USD,EUR')->json();
            DB::table('ethprice')
                ->where('currency', 'EUR')
                ->limit(1)
                ->update(array('price' => $response["EUR"]));
            DB::table('ethprice')
                ->where('currency', 'USD')
                ->limit(1)
                ->update(array('price' => $response["USD"]));
        })->everyMinute();
    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__.'/Commands');

        require base_path('routes/console.php');
    }
}
