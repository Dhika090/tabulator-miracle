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

        // SHU
        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'aset-breakdown-regional-1')) return;

            $tabs = collect(config('shu-asset-breakdown'))->map(function ($tab) {
                return [
                    'title' => $tab['title'],
                    'route' => route($tab['route']),
                    'active' => request()->routeIs($tab['route']),
                ];
            })->toArray();

            $view->with('tabs', $tabs);
        });

        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'availability-regional-1')) return;

            $tabs = collect(config('shu-availability'))->map(function ($tab) {
                return [
                    'title' => $tab['title'],
                    'route' => route($tab['route']),
                    'active' => request()->routeIs($tab['route']),
                ];
            })->toArray();

            $view->with('tabs', $tabs);
        });

        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'pelatihan-aims-regional-1')) return;

            $tabs = collect(config('shu-pelatihan-aims'))->map(function ($tab) {
                return [
                    'title' => $tab['title'],
                    'route' => route($tab['route']),
                    'active' => request()->routeIs($tab['route']),
                ];
            })->toArray();

            $view->with('tabs', $tabs);
        });

        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'sistem-informasi-aims-regional-1')) return;

            $tabs = collect(config('shu-sistem-informasi'))->map(function ($tab) {
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
