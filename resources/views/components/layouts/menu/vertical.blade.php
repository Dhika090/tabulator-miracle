<!-- Menu -->
<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">
    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link"><x-app-logo /></a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 overflow-auto">
        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}" wire:navigate>{{ __('Dashboard') }}</a>
        </li>

        <li class="menu-item {{ request()->is('monev/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-bar-chart-square"></i>
                <div class="text-truncate">{{ __('Monev AIM') }}</div>
            </a>
            <ul class="menu-sub">
                {{-- SHG --}}
                <li class="menu-item {{ request()->is('monev/shg/*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        <i class="menu-icon tf-icons bx bx-building-house"></i>
                        <div>SHG</div>
                    </a>

                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('monev/shg/kinerja*') ? 'active open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                Input Target Kinerja SHG
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ route('target-status-asset-integrity') }}">
                                        Target Status Asset Integrity
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ route('target-status-plo') }}">
                                        Target Status PLO
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/kinerja/kpi-asset-integrity') }}">
                                        Kinerja KPI Asset Integrity
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/kinerja/hasil-monev') }}">
                                        Tindak Lanjut Hasil Monev
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/kinerja/sap') }}">
                                        Target SAP Asset
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/kinerja/mandatory-certification') }}">
                                        Mandatory Certification
                                    </a>
                                </li>
                            </ul>
                        </li>
                        
                        {{-- Data Monev --}}
                        <li class="menu-item {{ request()->is('monev/shg/input-data*') ? 'active open' : '' }}">
                            <a href="javascript:void(0);" class="menu-link menu-toggle">
                                Input Data Monev
                            </a>
                            <ul class="menu-sub">
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pertamina-gas') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Pertamina Gas
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/kalimantan-jawa-gas') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Kalimantan Jawa Gas
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/perta-samtan-gas') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Perta Samtan Gas
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-lng-indonesia') }}">
                                        <i class="fa fa-wrench me-2"></i>PT PGN LNG Indonesia
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link"
                                        href="{{ url('monev/shg/input-data/widar-mandripa-nusantara') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Widar Mandripa Nusantara
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/perta-arun-gas') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Perta Arun Gas
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/perta-daya-gas') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Perta Daya Gas
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pertagas-niaga') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Pertagas Niaga
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/gagas-energi-indonesia') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Gagas Energi Indonesia
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/saka-energi-indonesia') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Saka Energi Indonesia
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/nusantara-regas') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Nusantara Regas
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/transportasi-indonesia') }}">
                                        <i class="fa fa-wrench me-2"></i>PT Tranportasi Indonesia
                                    </a>
                                </li>
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-omm') }}">
                                        <i class="fa fa-wrench me-2"></i>PT PGN OMM
                                    </a>
                                </li>   
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-sor1') }}">
                                        <i class="fa fa-wrench me-2"></i>PGN SOR 1
                                    </a>
                                </li>   
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-sor2') }}">
                                        <i class="fa fa-wrench me-2"></i>PGN SOR 2
                                    </a>
                                </li>   
                                <li class="menu-item">
                                    <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-sor3') }}">
                                        <i class="fa fa-wrench me-2"></i>PGN SOR 3
                                    </a>
                                </li>   
                            </ul>
                        </li>
                    </ul>
                </li>
                <li class="menu-item {{ request()->is('monev/shu') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ url('monev/shu') }}" wire:navigate>{{ __('SHU') }}</a>
                </li>
                <li class="menu-item {{ request()->is('monev/shpnre') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ url('monev/shpnre') }}" wire:navigate>{{ __('SH PNRE') }}</a>
                </li>
                <li class="menu-item {{ request()->is('monev/shct') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ url('monev/shct') }}" wire:navigate>{{ __('SH C&T') }}</a>
                </li>
                <li class="menu-item {{ request()->is('monev/shrp') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ url('monev/shrp') }}" wire:navigate>{{ __('SH R&P') }}</a>
                </li>
                <li class="menu-item {{ request()->is('monev/shiml') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ url('monev/shiml') }}" wire:navigate>{{ __('SH IML') }}</a>
                </li>

            </ul>
        </li>


        <!-- Settings -->
        <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-cog"></i>
                <div class="text-truncate">{{ __('Settings') }}</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->routeIs('settings.profile') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('settings.profile') }}"
                        wire:navigate>{{ __('Profile') }}</a>
                </li>
                <li class="menu-item {{ request()->routeIs('settings.password') ? 'active' : '' }}">
                    <a class="menu-link" href="{{ route('settings.password') }}"
                        wire:navigate>{{ __('Password') }}</a>
                </li>
            </ul>
        </li>
    </ul>
</aside>

<!-- / Menu -->

<script>
    // Toggle the 'open' class when the menu-toggle is clicked
    document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            const menuItem = menuToggle.closest('.menu-item');
            // Toggle the 'open' class on the clicked menu-item
            menuItem.classList.toggle('open');
        });
    });
</script>
