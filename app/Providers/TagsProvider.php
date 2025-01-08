<?php

namespace App\Providers;

use App\Contracts\Tag\TagInterface;
use Illuminate\Support\Facades\View;
use Illuminate\Support\ServiceProvider;

class TagsProvider extends ServiceProvider
{
    /**
     * Register services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap services.
     */
    public function boot(): void
    {
        View::composer('components.client-layout', function ($view) {
            $repository = $this->app->make(TagInterface::class);
            $tags = $repository->all();
            $view->with('tags', $tags);
        });
    }
}
