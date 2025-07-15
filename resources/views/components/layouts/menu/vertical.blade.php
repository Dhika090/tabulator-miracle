<!-- Menu -->
<style>
    .layout-wrapper {
        display: flex;
        width: 100%;
        height: 100vh;
        position: relative;
    }

    .layout-menu {
        width: 260px;
        transition: transform 0.3s ease;
        position: absolute;
        left: 0;
        top: 0;
        bottom: 0;
        z-index: 100;
        background-color: white;
        /* sesuaikan */
    }

    .hide-sidebar {
        transform: translateX(-100%);
    }

    .layout-page {
        flex-grow: 1;
        padding-left: 260px;
        transition: all 0.3s ease;
        width: 100%;
        box-sizing: border-box;
    }

    .layout-wrapper.sidebar-collapsed .layout-page {
        padding-left: 0;
    }

    .menu-item.active>.menu-link {
        background-color: #a1c8e2;
        color: #0069b5 !important;
        font-weight: 600;
    }

    .menu-item.active .menu-icon,
    .menu-item.active i {
        color: #0069b5;
    }

    .menu-vertical .menu-item.active>.menu-toggle {
        background-color: #a1c8e2;
    }

    .menu-sub>.menu-item.active>.menu-link.menu-toggle {
        background-color: #a1c8e2;

    }

    .menu-sub .menu-item.active>.menu-link {
        background-color: #a1c8e2;
        border-left: 4px solid #3f73bf;
    }

    .menu-vertical .menu-item.active:not(.open)>.menu-link:not(.menu-toggle)::before {
        background-color: #6789cd;
    }

    .no-click {
        pointer-events: none;
        cursor: not-allowed;
        opacity: 0.5;
    }

    .disabled-menu a {
        color: #999 !important;
    }
</style>

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme">

    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link"><img src="{{ asset('assets/img/pgn.png') }}" width="190"
                alt="Pertamina Logo"></a>
    </div>

    <div class="menu-inner-shadow"></div>

    <ul class="menu-inner py-1 overflow-auto sidebar-wrapper" id="sidebar-scroll">

        @php
            $user = session('user');
            $entitasUser = strtolower($user['entitas'] ?? '');
        @endphp

        <!-- Dashboards -->
        <li class="menu-item {{ request()->is('dashboard') ? 'active' : '' }}">
            <a class="menu-link" href="{{ route('dashboard') }}" wire:navigate>{{ __('Dashboard') }}</a>
        </li>

        <li class="menu-item {{ request()->is('monev/shg/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>SHG</div>
            </a>

            <ul class="menu-sub">
                {{-- target kinerja --}}
                <li class="menu-item {{ request()->is('monev/shg/kinerja*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Target Kinerja SHG
                    </a>
                    <ul class="menu-sub">
                        {{-- <li
                            class="menu-item {{ request()->is('monev/shg/kinerja/shg-target-kpi-2025-ai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shg-target-kpi-2025-ai') }}">
                                Target Status Asset Integrity
                            </a>
                        </li> --}}
                        <li
                            class="menu-item {{ request()->is('monev/shg/kinerja/shg-target-penurunan-plo*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shg-target-penurunan-plo') }}">
                                Target Status PLO
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/kinerja/shg-kinerja-kpi-status-ai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shg-kinerja-kpi-status-ai') }}">
                                Kinerja KPI Status AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/kinerja/tindak-lanjut-hasil-monev*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/kinerja/tindak-lanjut-hasil-monev') }}">
                                Tindak Lanjut Hasil Monev
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/kinerja/target-sap-asset*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/kinerja/target-sap-asset') }}">
                                Target SAP Asset
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/kinerja/mandatory-certification*') ? 'active' : '' }}">
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
                        {{-- @php
                            $entitasIni = 'pertamina'; // lowercase agar konsisten
                            $isActive = $entitasUser === $entitasIni;
                            if ($isActive) {
                                echo '<script>
                                    console.log("Entitas cocok: ' . $entitasUser . '");
                                </script>';
                            } else {
                                echo '<script>
                                    console.log("Entitas tidak cocok: ' . $entitasUser . '");
                                </script>';
                            }
                        @endphp --}}
                        {{-- <li
                            class="menu-item {{ request()->is('monev/shg/input-data/pertamina-gas*') ? 'active' : '' }} {{ $isActive ? '' : 'disabled-menu' }}">
                            <a class="menu-link {{ $isActive ? '' : 'no-click' }}"
                                href="{{ $isActive ? url('monev/shg/input-data/pertamina-gas') : '#' }}">
                                <i class="fa fa-wrench me-2"></i>PT Pertamina Gas
                            </a>
                        </li> --}}
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/pertamina-gas*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pertamina-gas') }}">
                                <i class="fa fa-wrench me-2"></i>PT Pertamina Gas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/kalimantan-jawa-gas') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/kalimantan-jawa-gas') }}">
                                <i class="fa fa-wrench me-2"></i>PT Kalimantan Jawa Gas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/perta-samtan-gas') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/perta-samtan-gas') }}">
                                <i class="fa fa-wrench me-2"></i>PT Perta Samtan Gas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/pgn-lng-indonesia') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-lng-indonesia') }}">
                                <i class="fa fa-wrench me-2"></i>PT PGN LNG Indonesia
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/widar-mandripa-nusantara') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/widar-mandripa-nusantara') }}">
                                <i class="fa fa-wrench me-2"></i>PT Widar Mandripa Nusantara
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/perta-arun-gas') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/perta-arun-gas') }}">
                                <i class="fa fa-wrench me-2"></i>PT Perta Arun Gas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/perta-daya-gas') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/perta-daya-gas') }}">
                                <i class="fa fa-wrench me-2"></i>PT Perta Daya Gas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/pertagas-niaga') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pertagas-niaga') }}">
                                <i class="fa fa-wrench me-2"></i>PT Pertagas Niaga
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/gagas-energi-indonesia') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/gagas-energi-indonesia') }}">
                                <i class="fa fa-wrench me-2"></i>PT Gagas Energi Indonesia
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/saka-energi-indonesia') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/saka-energi-indonesia') }}">
                                <i class="fa fa-wrench me-2"></i>PT Saka Energi Indonesia
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/nusantara-regas') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/nusantara-regas') }}">
                                <i class="fa fa-wrench me-2"></i>PT Nusantara Regas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/transportasi-gas-indonesia') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/transportasi-gas-indonesia') }}">
                                <i class="fa fa-wrench me-2"></i>PT Tranportasi Gas Indonesia
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shg/input-data/pgn-omm') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-omm') }}">
                                <i class="fa fa-wrench me-2"></i>PT PGN OMM
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shg/input-data/pgn-sor1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-sor1') }}">
                                <i class="fa fa-wrench me-2"></i>PGN SOR 1
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shg/input-data/pgn-sor2') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-sor2') }}">
                                <i class="fa fa-wrench me-2"></i>PGN SOR 2
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shg/input-data/pgn-sor3') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/pgn-sor3') }}">
                                <i class="fa fa-wrench me-2"></i>PGN SOR 3
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shg/input-data/realisasi-anggaran-ai-glsm') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shg/input-data/realisasi-anggaran-ai-glsm') }}">
                                <i class="fa fa-wrench me-2"></i>PGN GLSM
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('monev/shu/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>SHU</div>
            </a>
            <ul class="menu-sub">
                {{-- target kinerja --}}
                <li class="menu-item {{ request()->is('monev/shu/kinerja*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Target Kinerja SHU
                    </a>
                    <ul class="menu-sub">
                        {{-- <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/shu-target-kpi-2025-ai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shu-target-kpi-2025-ai') }}">
                                Target Status Asset Integrity SHU
                            </a>
                        </li> --}}
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/shu-target-penurunan-plo*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shu-target-penurunan-plo') }}">
                                Target Status Plo
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/shu-kinerja-kpi-status-ai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shu-kinerja-kpi-status-ai') }}">
                                Kinerja KPI Status AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/tindak-lanjut-monev-shu*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('tindak-lanjut-monev-shu') }}">
                                Tindak Lanjut Hasil Monev
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/target-sap-asset-shu*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('target-sap-asset-shu') }}">
                                Target SAP Asset
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/target-mandatory-certification-shu*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/kinerja/target-mandatory-certification-shu') }}">
                                Mandatory Certification
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- monev --}}
                <li class="menu-item {{ request()->is('monev/shu/input-data*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Data Monev
                    </a>
                    <ul class="menu-sub">
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/aset-breakdown-regional-1*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shu/input-data/aset-breakdown-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Aset Breakdown
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/availability-regional-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shu/input-data/availability-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Availability
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/pelatihan-aims-regional-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shu/input-data/pelatihan-aims-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Pelatihan AIMS
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/sistem-informasi-aims-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/sistem-informasi-aims-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Sistem Informasi AIMS
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/rencana-pemeliharaan-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/rencana-pemeliharaan-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Rencana Pemeliharaan Besar
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/mandatory-certification-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/mandatory-certification-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Mandatory Certification
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/kondisi-vacant-fungsi-aims-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/kondisi-vacant-fungsi-aims-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Kondisi Vacant Fungsi Aims
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/realisasi-anggaran-ai-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/realisasi-anggaran-ai-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Realisasi Anggaran AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/realisasi-anggaran-figure-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/realisasi-anggaran-figure-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Realisasi Anggaran Figure
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/realisasi-progres-fisik-ai-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/input-data/realisasi-progres-fisik-ai-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Realisasi Prog Fisik AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/sap-asset-regional-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shu/input-data/sap-asset-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Sap Asset
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/status-ai-regional-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shu/input-data/status-ai-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Status Aset Integrity
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/input-data/status-plo-regional-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shu/input-data/status-plo-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Status PLO
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('monev/shpnre/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>SHPNRE</div>
            </a>
            <ul class="menu-sub">
                {{-- target kinerja --}}
                <li class="menu-item {{ request()->is('monev/shpnre/kinerja*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Target Kinerja SHPNRE
                    </a>
                    <ul class="menu-sub">
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/kinerja/shpnre-target-kpi-2025-ai*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shpnre/kinerja/target-mandatory-certification-shpnre') }}">
                                Target Status Asset Integrity SHU
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/kinerja/shpnre-target-penurunan-plo*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shpnre-target-penurunan-plo') }}">
                                Target Status Plo
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/kinerja/shpnre-kinerja-kpi-status-ai*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shpnre/kinerja/target-mandatory-certification-shpnre') }}">
                                Kinerja KPI Status AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/kinerja/tindak-lanjut-monev-shpnre*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shpnre/kinerja/target-mandatory-certification-shpnre') }}">
                                Tindak Lanjut Hasil Monev
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/kinerja/target-sap-asset-shpnre*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shpnre/kinerja/target-mandatory-certification-shpnre') }}">
                                Target SAP Asset
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/kinerja/target-mandatory-certification-shpnre*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shpnre/kinerja/target-mandatory-certification-shpnre') }}">
                                Mandatory Certification
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- monev --}}
                <li class="menu-item {{ request()->is('monev/shpnre/input-data*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Data Monev
                    </a>
                    <ul class="menu-sub">
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/input-data/lumut-balai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/lumut-balai') }}">
                                <i class="fa fa-wrench me-2"></i>Lumut Balai
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/input-data/lahendong') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/lahendong') }}">
                                <i class="fa fa-wrench me-2"></i>Lahendong
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shpnre/input-data/karaha') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/karaha') }}">
                                <i class="fa fa-wrench me-2"></i>Karaha
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/input-data/kamojang') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/kamojang') }}">
                                <i class="fa fa-wrench me-2"></i>Kamojang
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shpnre/input-data/ulubelu') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/ulubelu') }}">
                                <i class="fa fa-wrench me-2"></i>Ulubelu
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shpnre/input-data/ppi') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/ppi') }}">
                                <i class="fa fa-wrench me-2"></i>PPI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/input-data/jawa1regas') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/jawa1regas') }}">
                                <i class="fa fa-wrench me-2"></i>Jawa 1 Regas
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shpnre/input-data/jawa1power') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shpnre/input-data/jawa1power') }}">
                                <i class="fa fa-wrench me-2"></i>Jawa 1 Power
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('monev/shcnt/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>SH C&T</div>
            </a>
            <ul class="menu-sub">
                {{-- target kinerja --}}
                <li class="menu-item {{ request()->is('monev/shcnt/kinerja*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Target Kinerja SHCNT
                    </a>
                    <ul class="menu-sub">
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/shu-target-kpi-2025-ai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shu-target-kpi-2025-ai') }}">
                                Target Status Asset Integrity SHCNT
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/shu-target-penurunan-plo*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shu-target-penurunan-plo') }}">
                                Target Status Plo
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/shu-kinerja-kpi-status-ai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('shu-kinerja-kpi-status-ai') }}">
                                Kinerja KPI Status AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/tindak-lanjut-monev-shu*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('tindak-lanjut-monev-shu') }}">
                                Tindak Lanjut Hasil Monev
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/target-sap-asset-shu*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ route('target-sap-asset-shu') }}">
                                Target SAP Asset
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shu/kinerja/target-mandatory-certification-shu*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shu/kinerja/target-mandatory-certification-shu') }}">
                                Mandatory Certification
                            </a>
                        </li>
                    </ul>
                </li>
                {{-- monev --}}
                <li class="menu-item {{ request()->is('monev/shcnt/input-data*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Data Monev
                    </a>
                    <ul class="menu-sub">
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/sistem-informasi-aims-region-1*') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/sistem-informasi-aims-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Sistem Informasi AIMS
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/asset-breakdown-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/asset-breakdown-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Aset Breakdown
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/rencana-pemeliharaan-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/rencana-pemeliharaan-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Rencana Pemeliharaan Besar
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/availability-region-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shcnt/input-data/availability-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Availability
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/pelatihan-aims-region-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shcnt/input-data/pelatihan-aims-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Pelatihan AIMS
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/mandatory-certification-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/mandatory-certification-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Mandatory Certification
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/kondisi-vacant-aims-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/kondisi-vacant-aims-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Kondisi Vacant Fungsi Aims
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/realisasi-anggaran-ai-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/realisasi-anggaran-ai-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Realisasi Anggaran AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/realisasi-anggaran-figure-regional-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/realisasi-anggaran-figure-regional-1') }}">
                                <i class="fa fa-wrench me-2"></i>Realisasi Anggaran Figure
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/realisasi-prog-fisik-ai-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/realisasi-prog-fisik-ai-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Realisasi Prog Fisik AI
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/sap-asset-region-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shcnt/input-data/sap-asset-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Sap Asset
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/status-asset-integrity-region-1') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shcnt/input-data/status-asset-integrity-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Status Aset Integrity
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shcnt/input-data/status-plo-region-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shcnt/input-data/status-plo-region-1') }}">
                                <i class="fa fa-wrench me-2"></i>Status PLO
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('monev/shrnp/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>SH R&P</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('monev/shrnp/input-data*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Data Monev
                    </a>
                    <ul class="menu-sub">
                        <li
                            class="menu-item {{ request()->is('monev/shrnp/input-data/ru-dumai*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shrnp/input-data/ru-dumai') }}">
                                <i class="fa fa-wrench me-2"></i>RU II Dumai
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shrnp/input-data/plaju') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shrnp/input-data/plaju') }}">
                                <i class="fa fa-wrench me-2"></i>RU III Plaju
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shrnp/input-data/asset-breakdown-cilacap') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shrnp/input-data/asset-breakdown-cilacap') }}">
                                <i class="fa fa-wrench me-2"></i>RU IV Cilacap
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shrnp/input-data/status-asset-ai-balikpapan') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shrnp/input-data/status-asset-ai-balikpapan') }}">
                                <i class="fa fa-wrench me-2"></i>RU V Balikpapan
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shrnp/input-data/status-asset-ai-balongan') ? 'active' : '' }}">
                            <a class="menu-link"
                                href="{{ url('monev/shrnp/input-data/status-asset-ai-balongan') }}">
                                <i class="fa fa-wrench me-2"></i>RU VI Balongan
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('monev/shrnp/input-data/status-asset-ai-kasim') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shrnp/input-data/status-asset-ai-kasim') }}">
                                <i class="fa fa-wrench me-2"></i>RU VII Kasim
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>
        <li class="menu-item {{ request()->is('monev/shiml/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>SH IML</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('monev/shiml/input-data*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        Input Data Monev
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('monev/shiml/input-data/pis*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shiml/input-data/pis') }}">
                                <i class="fa fa-wrench me-2"></i>PIS
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shiml/input-data/pet') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shiml/input-data/pet') }}">
                                <i class="fa fa-wrench me-2"></i>PET
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('monev/shiml/input-data/ptk') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('monev/shiml/input-data/ptk') }}">
                                <i class="fa fa-wrench me-2"></i>PTK
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- Mona / IIS --}}
        <li class="menu-item {{ request()->is('mona/iis/*') ? 'active open' : '' }}">
            <a href="javascript:void(0);" class="menu-link menu-toggle">
                <i class="menu-icon tf-icons bx bx-building-house"></i>
                <div>Mona</div>
            </a>
            <ul class="menu-sub">
                <li class="menu-item {{ request()->is('mona/iis/*') ? 'active open' : '' }}">
                    <a href="javascript:void(0);" class="menu-link menu-toggle">
                        IIS
                    </a>
                    <ul class="menu-sub">
                        <li class="menu-item {{ request()->is('mona/iis/maintanance-database*') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/maintanance-database') }}">
                                <i class="fa fa-wrench me-2"></i>Maintanance Database
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('mona/iis/maintanance-sap') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/maintanance-sap') }}">
                                <i class="fa fa-wrench me-2"></i>Maintanance SAP
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('mona/iis/maintanance-aplikasi') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/maintanance-aplikasi') }}">
                                <i class="fa fa-wrench me-2"></i>Maintanance Aplikasi
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('mona/iis/opertator-basis-data-omr-1') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/opertator-basis-data-omr-1') }}">
                                <i class="fa fa-wrench me-2"></i>Operator Basis Data OMR 1
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('mona/iis/opertator-basis-data-omr-2') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/opertator-basis-data-omr-2') }}">
                                <i class="fa fa-wrench me-2"></i>Operator Basis Data OMR 2
                            </a>
                        </li>
                        <li
                            class="menu-item {{ request()->is('mona/iis/opertator-basis-data-omr-3') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/opertator-basis-data-omr-3') }}">
                                <i class="fa fa-wrench me-2"></i>Operator Basis Data OMR 3
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('mona/iis/maintanance-dashboard') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/maintanance-dashboard') }}">
                                <i class="fa fa-wrench me-2"></i>Maintanance Dashboard
                            </a>
                        </li>
                        <li class="menu-item {{ request()->is('mona/iis/general-administrasi') ? 'active' : '' }}">
                            <a class="menu-link" href="{{ url('mona/iis/general-administrasi') }}">
                                <i class="fa fa-wrench me-2"></i>General Administrasi
                            </a>
                        </li>
                    </ul>
                </li>
            </ul>
        </li>

        {{-- </ul>
        </li> --}}

        <!-- Settings -->
        {{-- <li class="menu-item {{ request()->is('settings/*') ? 'active open' : '' }}">
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
        </li> --}}
    </ul>

</aside>

<!-- / Menu -->

<script>
    document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            const menuItem = menuToggle.closest('.menu-item');
            menuItem.classList.toggle('open');
        });
    });
</script>

<script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("layout-menu");
        const layoutWrapper = document.querySelector(".layout-wrapper");

        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("hide-sidebar");
            layoutWrapper.classList.toggle("sidebar-collapsed");
        });
    });
</script>

<script>
    const sidebar = document.getElementById('sidebar-scroll');

    if (sidebar) {
        // Simpan posisi scroll ke localStorage
        sidebar.addEventListener('scroll', () => {
            localStorage.setItem('sidebar-scroll', sidebar.scrollTop);
        });

        // Saat halaman di-load, atur posisi scroll kembali
        const scrollPos = localStorage.getItem('sidebar-scroll');
        if (scrollPos !== null) {
            sidebar.scrollTop = parseInt(scrollPos);
        }
    }
</script>
