<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\BaseInterface;
use App\Repositories\BaseRepository;
use App\Repositories\Card\CardInterface;
use App\Repositories\Card\CardRepository;
use App\Repositories\Order\OrderInterface;
use App\Repositories\Order\OrderRepository;
use App\Repositories\Payment\PaymentInterface;
use App\Repositories\Payment\PaymentRepository;

class RepositoryServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind(BaseInterface::class, BaseRepository::class);
        $this->app->bind(PaymentInterface::class, PaymentRepository::class);
        $this->app->bind(OrderInterface::class, OrderRepository::class);
        $this->app->bind(CardInterface::class, CardRepository::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
