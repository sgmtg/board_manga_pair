<?php

namespace App\Providers;

use App\Services\SqsFifoConnector;

class SqsFifoServiceProvider extends \Illuminate\Support\ServiceProvider
{
    public function register()
    {
        $this->app->afterResolving('queue', function ($manager) {
            $manager->addConnector('sqsfifo', function () {
                return new SqsFifoConnector;
            });
        });
    }
}