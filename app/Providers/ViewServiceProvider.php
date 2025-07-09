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

        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'status-asset-balikpapan')) return;

            $tabs = collect(config('shrnp-balikpapan'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'status-asset-ai-balongan')) return;

            $tabs = collect(config('shrnp-balongan'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'status-asset-ai-kasim')) return;

            $tabs = collect(config('shrnp-kasim'))->map(function ($tab) {
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

        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'rencana-pemeliharaan-regional-1')) return;

            $tabs = collect(config('shu-rencana-pemeliharaan'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'mandatory-certification-regional-1')) return;

            $tabs = collect(config('shu-mandatory-certification'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'kondisi-vacant-fungsi-aims-regional-1')) return;

            $tabs = collect(config('shu-kondisi-vacant-aims'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'realisasi-anggaran-ai-regional-1')) return;

            $tabs = collect(config('shu-realisasi-anggarai-ai'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'realisasi-anggaran-figure-regional-1')) return;

            $tabs = collect(config('shu-realisasi-anggaran-figure'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'realisasi-progres-fisik-ai-regional-1')) return;

            $tabs = collect(config('shu-realisasi-progress-fisik-ai'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'sap-asset-regional-1')) return;

            $tabs = collect(config('shu-sap-asset'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'status-ai-regional-1')) return;

            $tabs = collect(config('shu-status-ai'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'status-plo-regional-1')) return;

            $tabs = collect(config('shu-status-plo'))->map(function ($tab) {
                return [
                    'title' => $tab['title'],
                    'route' => route($tab['route']),
                    'active' => request()->routeIs($tab['route']),
                ];
            })->toArray();

            $view->with('tabs', $tabs);
        });
        
        // SHG TIndak Lanjut
        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'tindak-lanjut-hasil-monev')) return;

            $tabs = collect(config('shg-tindak-lanjut-hasil-monev'))->map(function ($tab) {
                return [
                    'title' => $tab['title'],
                    'route' => route($tab['route']),
                    'active' => request()->routeIs($tab['route']),
                ];
            })->toArray();

            $view->with('tabs', $tabs);
        });

        // SHCNT
        View::composer('*', function ($view) {
            $routeName = optional(request()->route())->getName();
            if (!$routeName || !str_contains($routeName, 'sistem-informasi-aims-region-1')) return;

            $tabs = collect(config('shcnt-sistem-informasi'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'asset-breakdown-region-1')) return;

            $tabs = collect(config('shcnt-asset-breakdown'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'rencana-pemeliharaan-region-1')) return;

            $tabs = collect(config('shcnt-rencana-pemeliharaan'))->map(function ($tab) {
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
            if (!$routeName || !str_contains($routeName, 'availability-region-1')) return;

            $tabs = collect(config('shcnt-availability'))->map(function ($tab) {
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
