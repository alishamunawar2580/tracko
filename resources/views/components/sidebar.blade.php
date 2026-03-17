<aside class="tracko-sidebar" id="sidebar">
    <!-- Main Sidebar -->
    <div class="sidebar-main">
        <div class="sidebar-logo">
            <h2><span class="gradient-o" style="font-size: xxx-large;">O</span></h2>
        </div>

        <nav class="sidebar-menu">
            <a href="#" class="menu-item {{ request()->routeIs('master.dashboard') ? 'active' : '' }}" data-menu="dashboard">
                <i class="fas fa-home"></i>
                <span>Dashboard</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('master.*') ? 'active' : '' }}" data-menu="master">
                <i class="fas fa-database"></i>
                <span>Master</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('sales.*') ? 'active' : '' }}" data-menu="sales">
                <i class="fas fa-chart-line"></i>
                <span>Sales</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('purchases.*') ? 'active' : '' }}" data-menu="purchases">
                <i class="fas fa-truck"></i>
                <span>Purchase</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('customers.*') || request()->routeIs('suppliers.*') ? 'active' : '' }}" data-menu="parties">
                <i class="fas fa-users"></i>
                <span>Parties</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('accounts.*') ? 'active' : '' }}" data-menu="accounts">
                <i class="fas fa-book"></i>
                <span>Accounts</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('employees.*') || request()->routeIs('payroll.*') ? 'active' : '' }}" data-menu="hr">
                <i class="fas fa-user-tie"></i>
                <span>HR</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('reports.*') ? 'active' : '' }}" data-menu="reports">
                <i class="fas fa-file-alt"></i>
                <span>Reports</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>

            <a href="#" class="menu-item {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'active' : '' }}" data-menu="settings">
                <i class="fas fa-cog"></i>
                <span>Settings</span>
                <i class="fas fa-chevron-right submenu-indicator"></i>
            </a>
        </nav>
    </div>

    <!-- Submenu Sidebar -->
    <div class="sidebar-submenu" id="sidebar-submenu">
        <!-- Dashboard Submenu -->
        <div class="submenu-section {{ request()->routeIs('master.dashboard') ? 'active' : '' }}" data-submenu="dashboard">
            <div class="submenu-title">Dashboard</div>
            <a href="{{ route('master.dashboard') }}" class="submenu-item {{ request()->routeIs('master.dashboard') ? 'active' : '' }}">
                <i class="fas fa-tachometer-alt"></i>
                <span>Overview</span>
            </a>
        </div>

        <!-- Master Submenu -->
        <div class="submenu-section {{ request()->routeIs('master.*') ? 'active' : '' }}" data-submenu="master">
            <div class="submenu-title">Master Setup</div>
            <a href="{{ route('master.dashboard') }}" class="submenu-item {{ request()->routeIs('master.dashboard') ? 'active' : '' }}">
                <i class="fas fa-th-large"></i>
                <span>Dashboard</span>
            </a>
            <a href="{{ route('master.product.index') }}" class="submenu-item {{ request()->routeIs('master.product.*') ? 'active' : '' }}">
                <i class="fas fa-box"></i>
                <span>Products</span>
            </a>
            <a href="{{ route('master.pricing.index') }}" class="submenu-item {{ request()->routeIs('master.pricing.*') ? 'active' : '' }}">
                <i class="fas fa-tags"></i>
                <span>Fuel Pricing</span>
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
                <span>Meter Readings</span>
            </a>
        </div>

        <!-- Sales Submenu -->
        <div class="submenu-section {{ request()->routeIs('sales.*') ? 'active' : '' }}" data-submenu="sales">
            <div class="submenu-title">Daily Sales</div>
            <a href="{{ route('sales.index') }}" class="submenu-item {{ request()->routeIs('sales.index') ? 'active' : '' }}">
                <i class="fas fa-list"></i>
                <span>Sales List</span>
            </a>
            <a href="{{ route('sales.create') }}" class="submenu-item {{ request()->routeIs('sales.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i>
                <span>New Sale Entry</span>
            </a>
        </div>

        <!-- Purchase Submenu -->
        <div class="submenu-section {{ request()->routeIs('purchases.*') ? 'active' : '' }}" data-submenu="purchases">
            <div class="submenu-title">Purchase</div>
            <a href="{{ route('purchases.index') }}" class="submenu-item {{ request()->routeIs('purchases.index') ? 'active' : '' }}">
                <i class="fas fa-list"></i>
                <span>Purchase List</span>
            </a>
            <a href="{{ route('purchases.create') }}" class="submenu-item {{ request()->routeIs('purchases.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i>
                <span>New Purchase</span>
            </a>
        </div>

        <!-- Parties (Customers & Suppliers) Submenu -->
        <div class="submenu-section {{ request()->routeIs('customers.*') || request()->routeIs('suppliers.*') ? 'active' : '' }}" data-submenu="parties">
            <div class="submenu-title">Parties</div>
            <a href="{{ route('customers.index') }}" class="submenu-item {{ request()->routeIs('customers.index') ? 'active' : '' }}">
                <i class="fas fa-user-friends"></i>
                <span>Customers</span>
            </a>
            <a href="{{ route('customers.create') }}" class="submenu-item {{ request()->routeIs('customers.create') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Add Customer</span>
            </a>
            <a href="{{ route('suppliers.index') }}" class="submenu-item {{ request()->routeIs('suppliers.index') ? 'active' : '' }}">
                <i class="fas fa-industry"></i>
                <span>Suppliers</span>
            </a>
            <a href="{{ route('suppliers.create') }}" class="submenu-item {{ request()->routeIs('suppliers.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i>
                <span>Add Supplier</span>
            </a>
        </div>

        <!-- Accounts Submenu -->
        <div class="submenu-section {{ request()->routeIs('accounts.*') ? 'active' : '' }}" data-submenu="accounts">
            <div class="submenu-title">Daily Accounts</div>
            <a href="{{ route('accounts.index') }}" class="submenu-item {{ request()->routeIs('accounts.index') ? 'active' : '' }}">
                <i class="fas fa-book-open"></i>
                <span>Account Book</span>
            </a>
            <a href="{{ route('accounts.create') }}" class="submenu-item {{ request()->routeIs('accounts.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i>
                <span>New Day Account</span>
            </a>
        </div>

        <!-- HR Submenu -->
        <div class="submenu-section {{ request()->routeIs('employees.*') || request()->routeIs('payroll.*') ? 'active' : '' }}" data-submenu="hr">
            <div class="submenu-title">HR & Payroll</div>
            <a href="{{ route('employees.index') }}" class="submenu-item {{ request()->routeIs('employees.index') ? 'active' : '' }}">
                <i class="fas fa-id-badge"></i>
                <span>Employees</span>
            </a>
            <a href="{{ route('employees.create') }}" class="submenu-item {{ request()->routeIs('employees.create') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Add Employee</span>
            </a>
            <a href="{{ route('payroll.index') }}" class="submenu-item {{ request()->routeIs('payroll.index') ? 'active' : '' }}">
                <i class="fas fa-money-check-alt"></i>
                <span>Payroll</span>
            </a>
            <a href="{{ route('payroll.create') }}" class="submenu-item {{ request()->routeIs('payroll.create') ? 'active' : '' }}">
                <i class="fas fa-plus-circle"></i>
                <span>Process Payroll</span>
            </a>
        </div>

        <!-- Reports Submenu -->
        <div class="submenu-section {{ request()->routeIs('reports.*') ? 'active' : '' }}" data-submenu="reports">
            <div class="submenu-title">Reports</div>
            <a href="{{ route('reports.index') }}" class="submenu-item {{ request()->routeIs('reports.index') ? 'active' : '' }}">
                <i class="fas fa-chart-pie"></i>
                <span>Overview</span>
            </a>
            <a href="{{ route('reports.sales') }}" class="submenu-item {{ request()->routeIs('reports.sales') ? 'active' : '' }}">
                <i class="fas fa-chart-line"></i>
                <span>Sales Report</span>
            </a>
            <a href="{{ route('reports.purchases') }}" class="submenu-item {{ request()->routeIs('reports.purchases') ? 'active' : '' }}">
                <i class="fas fa-truck"></i>
                <span>Purchase Report</span>
            </a>
            <a href="{{ route('reports.stock') }}" class="submenu-item {{ request()->routeIs('reports.stock') ? 'active' : '' }}">
                <i class="fas fa-warehouse"></i>
                <span>Stock Report</span>
            </a>
        </div>

        <!-- Settings Submenu -->
        <div class="submenu-section {{ request()->routeIs('users.*') || request()->routeIs('roles.*') ? 'active' : '' }}" data-submenu="settings">
            <div class="submenu-title">Settings</div>
            <a href="{{ route('users.index') }}" class="submenu-item {{ request()->routeIs('users.index') ? 'active' : '' }}">
                <i class="fas fa-users-cog"></i>
                <span>User Management</span>
            </a>
            <a href="{{ route('users.create') }}" class="submenu-item {{ request()->routeIs('users.create') ? 'active' : '' }}">
                <i class="fas fa-user-plus"></i>
                <span>Add User</span>
            </a>
            <a href="{{ route('roles.index') }}" class="submenu-item {{ request()->routeIs('roles.index') ? 'active' : '' }}">
                <i class="fas fa-shield-alt"></i>
                <span>Roles & Permissions</span>
            </a>
        </div>
    </div>
</aside>
