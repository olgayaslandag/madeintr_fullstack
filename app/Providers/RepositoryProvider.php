<?php

namespace App\Providers;

use App\Contracts\City\CityInterface;
use App\Contracts\Company\CompanyInterface;
use App\Contracts\Tag\TagInterface;
use App\Repositories\City\CityRepository;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Tag\TagRepository;
use Illuminate\Support\ServiceProvider;

class RepositoryProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        $this->app->bind(CityInterface::class, CityRepository::class);
        $this->app->bind(TagInterface::class, TagRepository::class);
        $this->app->bind(CompanyInterface::class, CompanyRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
