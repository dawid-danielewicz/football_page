<?php

namespace App\Providers;

use App\Payments\BankTransfer;
use App\Payments\CreditTransfer;
use App\Payments\PaymentInterface;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->singleton(PaymentInterface::class, function($app) {
            if(request()->input('payment') == 'transfer')
                return new BankTransfer('pln');
            else
                return new CreditTransfer('pln');
        });
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
