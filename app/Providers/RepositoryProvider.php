<?php

namespace App\Providers;

use App\Contracts\City\CityInterface;
use App\Contracts\Company\CompanyInterface;
use App\Contracts\Tag\TagInterface;
use App\Contracts\TagCategory\TagCategoryInterface;
use App\Contracts\User\UserInterface;
use App\Repositories\City\CityRepository;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Tag\TagRepository;
use App\Repositories\TagCategory\TagCategoryRepository;
use App\Repositories\User\UserRepository;
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
        $this->app->bind(UserInterface::class, UserRepository::class);
        $this->app->bind(TagCategoryInterface::class, TagCategoryRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
