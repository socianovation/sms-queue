<?php namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Console\Commands\SmsListenerCommand;

class CommandServiceProvider extends ServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton('command.sms.listener', function()
        {
            return new SmsListenerCommand;
        });

        $this->commands(
            'command.sms.listener'
        );
    }
}
