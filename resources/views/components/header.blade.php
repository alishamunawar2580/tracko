<header class="tracko-header" id="header">
    <div class="header-left">
        <button class="menu-toggle" id="menu-toggle">
            <span></span>
            <span></span>
            <span></span>
        </button>

        <div class="header-date-time" id="header-datetime">
            <div class="datetime-display">
                <div class="time-display">
                    <i class="fas fa-clock me-2"></i>
                    <span id="current-time">00:00:00</span>
                </div>
                <div class="date-display">
                    <i class="fas fa-calendar me-2"></i>
                    <span id="current-date">Loading...</span>
                </div>
            </div>
        </div>
    </div>

    <div class="header-right">
        <div class="header-icon">
            <i class="fas fa-bell"></i>
            <span class="badge"></span>
        </div>

        <div class="header-icon">
            <i class="fas fa-envelope"></i>
            <span class="badge"></span>
        </div>

        <div class="dropdown">
            <div class="user-profile" data-bs-toggle="dropdown">
                <div class="user-avatar">A</div>
                <div class="user-info d-none d-md-block">   
                    <h6>Admin User</h6>
                    <span>Administrator</span>
                </div>
                <i class="fas fa-chevron-down ms-2"></i>
            </div>
            <ul class="dropdown-menu dropdown-menu-end">
                <li><a class="dropdown-item" href="#"><i class="fas fa-user me-2"></i> Profile</a></li>
                <li><a class="dropdown-item" href="#"><i class="fas fa-cog me-2"></i> Settings</a></li>
                <li>
                    <hr class="dropdown-divider">
                </li>
                <li>
                    <a class="dropdown-item" href="{{ route('logout.get') }}">
                        <i class="fas fa-sign-out-alt me-2"></i> Logout
                    </a>
                </li>
            </ul>
        </div>
    </div>
</header>
