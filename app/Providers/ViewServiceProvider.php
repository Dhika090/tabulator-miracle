<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewServiceProvider extends ServiceProvider
{
    public function boot(): void
    {
        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'cilacap')) return;

            $tabs = collect(config('cilacap-tabs'))->map(function ($tab) {
                return [
                    'title' => $tab['title'],
                    'route' => route($tab['route']),
                    'active' => request()->routeIs($tab['route']),
                ];
            })->toArray();

            $view->with('tabs', $tabs);
        });
    }
}
