<?php

namespace App\Providers;

use App\Contracts\Ai\AiInterface;
use App\Contracts\City\CityInterface;
use App\Contracts\Company\CompanyInterface;
use App\Contracts\Tag\TagInterface;
use App\Contracts\User\UserInterface;
use App\Repositories\Ai\AiRepository;
use App\Repositories\City\CityRepository;
use App\Repositories\Company\CompanyRepository;
use App\Repositories\Tag\TagRepository;
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
        $this->app->bind(AiInterface::class, AiRepository::class);
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        //
    }
}
