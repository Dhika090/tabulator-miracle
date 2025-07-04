<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}" class="layout-menu-fixed" data-base-url="{{ url('/') }}"
    data-framework="laravel">
<meta name="csrf-token" content="{{ csrf_token() }}">

<head>
    @include('partials.head')
    @stack('styles')
</head>

<body>

    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">

            <!-- Layout Content -->
            <x-layouts.menu.vertical :title="$title ?? null"></x-layouts.menu.vertical>
            <!--/ Layout Content -->

            <!-- Layout container -->

            <div class="layout-page">
                <button id="sidebarToggle" class="btn btn-sm btn-primary"
                    style="position: relative; width: 40px; margin-left: 25px; top: 8px;  z-index: 9999;">
                    ☰
                </button>
                <!-- Content wrapper -->
                <div class="content-wrapper">
                    <!-- Content -->
                    <div class="container-fluid  flex-grow-1 container-y">
                        {{ $slot }}
                    </div>
                    <!-- / Content -->

                    <!-- Footer -->
                    <x-layouts.footer.default :title="$title ?? null"></x-layouts.footer.default>
                    <!--/ Footer -->
                    <div class="content-backdrop fade"></div>
                    <!-- / Content wrapper -->
                </div>
            </div>
            <!-- / Layout page -->
        </div>
    </div>
    @include('partials.scripts')
    @stack('scripts')
    @vite(['resources/js/app.js'])

</body>

</html>
