<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use App\Repositories\Interfaces\CountriesRepositoryInterface;
use App\Repositories\CountriesRepository;
use App\Http\ViewComposers;
class ComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(
            'admin.index',
            'App\Http\ViewComposers\CountriesComposer'
        );
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
         $this->app->bind(CountriesRepositoryInterface::class, CountriesRepository::class);
    }
}
