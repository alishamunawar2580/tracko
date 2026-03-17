<aside class="tracko-sidebar" id="sidebar">
    <!-- Main Sidebar -->
    <div class="sidebar-main">
        <div class="sidebar-logo">
            <h2><span class="gradient-o" style="font-size: xxx-large;">O</span></h2>
        </div>

        <nav class="sidebar-menu">
            <a href="#" class="menu-item {{ request()->routeIs('dashboard.*') ? 'active' : '' }}" data-menu="dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('master.*') ? 'active' : '' }}" data-menu="master">
                <i class="fas fa-database"></i>
                <span>Master</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('fuel.*') ? 'active' : '' }}" data-menu="fuel">
                <i class="fas fa-gas-pump"></i>
                <span>Fuel</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('sales.*') ? 'active' : '' }}" data-menu="sales">
                <i class="fas fa-chart-line"></i>
                <span>Sales</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('reports.*') ? 'active' : '' }}" data-menu="reports">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('settings.*') ? 'active' : '' }}" data-menu="settings">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>
        </nav>
    </div>

    <!-- Submenu Sidebar -->
    <div class="sidebar-submenu" id="sidebar-submenu">
        <!-- Dashboard Submenu -->
        <div class="submenu-section {{ request()->routeIs('dashboard.*') ? 'active' : '' }}" data-submenu="dashboard">
            <div class="submenu-title">Dashboard</div>
            <a href="#" class="submenu-item {{ request()->routeIs('dashboard.overview') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i>
                <span>Overview</span>
            </a>
            <a href="#" class="submenu-item {{ request()->routeIs('dashboard.analytics') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Analytics</span>
            </a>
        </div>

        <!-- Master Submenu -->
        <div class="submenu-section {{ request()->routeIs('master.*') ? 'active' : '' }}" data-submenu="master">
            <div class="submenu-title">Master Data</div>
            <a href="{{ route('master.dashboard') }}" class="submenu-item {{ request()->routeIs('master.dashboard') ? 'active' : '' }}">
                <i class="fas fa-box"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('master.product.index') }}" class="submenu-item {{ request()->routeIs('master.product.*') ? 'active' : '' }}">
                <i class="fas fa-box"></i>
                <span>Products</span>
            </a>
            <a href="{{ route('master.pricing.index') }}" class="submenu-item {{ request()->routeIs('master.pricing.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i>
                <span>Pricing</span>
            </a>
            <a href="{{ route('master.tank.index') }}" class="submenu-item {{ request()->routeIs('master.tank.*') ? 'active' : '' }}">
                <i class="fas fa-oil-can"></i>
                <span>Fuel Tanks</span>
            </a>
            <a href="{{ route('master.dispenser.index') }}" class="submenu-item {{ request()->routeIs('master.dispenser.*') ? 'active' : '' }}">
                <i class="fas fa-pump-soap"></i>
                <span>Dispensers</span>
            </a>
            <a href="{{ route('master.nozzle.index') }}" class="submenu-item {{ request()->routeIs('master.nozzle.*') ? 'active' : '' }}">
                <i class="fas fa-spray-can"></i>
                <span>Nozzles</span>
            </a>
            <a href="{{ route('master.meter.index') }}" class="submenu-item {{ request()->routeIs('master.meter.*') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Meters</span>
            </a>
        </div>

        <!-- Fuel Submenu -->
        <div class="submenu-section {{ request()->routeIs('fuel.*') ? 'active' : '' }}" data-submenu="fuel">
            <div class="submenu-title">Fuel Management</div>
            <a href="#" class="submenu-item">
                <i class="fas fa-warehouse"></i>
                <span>Inventory</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-truck"></i>
                <span>Deliveries</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-chart-bar"></i>
                <span>Stock Levels</span>
            </a>
        </div>

        <!-- Sales Submenu -->
        <div class="submenu-section {{ request()->routeIs('sales.*') ? 'active' : '' }}" data-submenu="sales">
            <div class="submenu-title">Sales</div>
            <a href="#" class="submenu-item">
                <i class="fas fa-receipt"></i>
                <span>Transactions</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-users"></i>
                <span>Customers</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-credit-card"></i>
                <span>Payments</span>
            </a>
        </div>

        <!-- Reports Submenu -->
        <div class="submenu-section {{ request()->routeIs('reports.*') ? 'active' : '' }}" data-submenu="reports">
            <div class="submenu-title">Reports</div>
            <a href="#" class="submenu-item">
                <i class="fas fa-chart-line"></i>
                <span>Sales Report</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-gas-pump"></i>
                <span>Fuel Report</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-dollar-sign"></i>
                <span>Revenue Report</span>
            </a>
        </div>

        <!-- Settings Submenu -->
        <div class="submenu-section {{ request()->routeIs('settings.*') ? 'active' : '' }}" data-submenu="settings">
            <div class="submenu-title">Settings</div>
            <a href="#" class="submenu-item">
                <i class="fas fa-building"></i>
                <span>Company</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-user-cog"></i>
                <span>Users</span>
            </a>
            <a href="#" class="submenu-item">
                <i class="fas fa-shield-alt"></i>
                <span>Permissions</span>
            </a>
        </div>
    </div>
</aside>
