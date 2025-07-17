<!-- Menu -->
<style>
    .layout-wrapper {
        display: flex;
        width: 100%;
        height: 100vh;
        position: relative;
    }

    .layout-page {
        flex-grow: 1;
        padding-left: 0 !important;
        width: 100%;
        box-sizing: border-box;
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

<aside id="layout-menu" class="layout-menu menu-vertical menu bg-menu-theme layout-wrapper ">

    <div class="app-brand demo">
        <a href="{{ url('/dashboard') }}" class="app-brand-link"><img src="{{ asset('assets/img/pgn.png') }}" width="190"
                alt="Pertamina Logo"></a>
    </div>

    <div class="menu-inner-shadow"></div>

</aside>

<!-- / Menu -->

{{-- <script>
    document.querySelectorAll('.menu-toggle').forEach(function(menuToggle) {
        menuToggle.addEventListener('click', function() {
            const menuItem = menuToggle.closest('.menu-item');
            menuItem.classList.toggle('open');
        });
    });
</script> --}}

{{-- <script>
    document.addEventListener("DOMContentLoaded", function() {
        const toggleBtn = document.getElementById("sidebarToggle");
        const sidebar = document.getElementById("layout-menu");
        const layoutWrapper = document.querySelector(".layout-wrapper");

        toggleBtn.addEventListener("click", function() {
            sidebar.classList.toggle("hide-sidebar");
            layoutWrapper.classList.toggle("sidebar-collapsed");
        });
    });
</script> --}}
{{-- 
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
</script> --}}
