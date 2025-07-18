<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{ url('/') }}"
    data-framework="laravel">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    @include('partials.head')
    @stack('styles')
</head>
<style>
    .layout-page,
    .content-wrapper,
    .flex-grow-1 {
        max-width: 100% !important;
        width: 100% !important;
    }
</style>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout page -->
            <div class="container-xxl flex-grow-1 container-p-y">

                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    {{-- <div class="container-fluid flex-grow-1 container-y"> --}}
                    <div class="flex-grow-1" style="padding: 0; margin: 0;">
                        {{ $slot }}
                    </div>
                    <!-- /Content -->

                    <!-- Footer -->
                    <x-layouts.footer.default :title="$title ?? null" />
                    <!-- /Footer -->

                    <div class="content-backdrop fade"></div>

                    <!-- /Content wrapper -->
                </div>
                <!-- /Layout page -->
            </div>
        </div>
    </div>
    @include('partials.scripts')
    @stack('scripts')
    @vite(['resources/js/app.js'])

</body>

</html>
