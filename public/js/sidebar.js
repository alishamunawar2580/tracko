document.addEventListener('DOMContentLoaded', function() {
            const menuToggle = document.querySelector('.menu-toggle');
            const sidebar = document.querySelector('.tracko-sidebar');
            const submenu = document.querySelector('#sidebar-submenu');
            const header = document.querySelector('.tracko-header');
            const main = document.querySelector('.tracko-main');
            const footer = document.querySelector('.tracko-footer');
            const menuItems = document.querySelectorAll('.menu-item');
            const submenuSections = document.querySelectorAll('.submenu-section');

            // Toggle submenu visibility
            function toggleSubmenu() {
                const isCollapsed = submenu.classList.contains('collapsed');

                if (isCollapsed) {
                    submenu.classList.remove('collapsed');
                    sidebar.classList.remove('collapsed');
                    header.classList.remove('sidebar-collapsed');
                    main.classList.remove('sidebar-collapsed');
                    footer.classList.remove('sidebar-collapsed');
                } else {
                    submenu.classList.add('collapsed');
                    sidebar.classList.add('collapsed');
                    header.classList.add('sidebar-collapsed');
                    main.classList.add('sidebar-collapsed');
                    footer.classList.add('sidebar-collapsed');
                }
            }

            // Menu toggle button click
            if (menuToggle) {
                menuToggle.addEventListener('click', function() {
                    if (window.innerWidth <= 768) {
                        sidebar.classList.toggle('mobile-open');
                    } else {
                        toggleSubmenu();
                    }
                });
            }

            // Main sidebar menu item click
            menuItems.forEach(item => {
                item.addEventListener('click', function(e) {
                    e.preventDefault();
                    const target = this.getAttribute('data-menu');
                    const isCurrentlyActive = this.classList.contains('active');

                    // Update active menu item
                    menuItems.forEach(m => m.classList.remove('active'));
                    this.classList.add('active');

                    // Update active submenu section
                    submenuSections.forEach(s => s.classList.remove('active'));
                    const targetSection = document.querySelector(`[data-submenu="${target}"]`);
                    if (targetSection) {
                        targetSection.classList.add('active');
                    }

                    // Always open submenu when clicking menu item
                    submenu.classList.remove('collapsed');
                    sidebar.classList.remove('collapsed');
                    header.classList.remove('sidebar-collapsed');
                    main.classList.remove('sidebar-collapsed');
                    footer.classList.remove('sidebar-collapsed');
                });
            });

            // Update date and time
            function updateDateTime() {
                const now = new Date();

                // Update time
                const hours = String(now.getHours()).padStart(2, '0');
                const minutes = String(now.getMinutes()).padStart(2, '0');
                const seconds = String(now.getSeconds()).padStart(2, '0');
                document.getElementById('current-time').textContent = `${hours}:${minutes}:${seconds}`;

                // Update date
                const days = ['Sunday', 'Monday', 'Tuesday', 'Wednesday', 'Thursday', 'Friday', 'Saturday'];
                const months = ['Jan', 'Feb', 'Mar', 'Apr', 'May', 'Jun', 'Jul', 'Aug', 'Sep', 'Oct', 'Nov', 'Dec'];
                const dayName = days[now.getDay()];
                const day = now.getDate();
                const month = months[now.getMonth()];
                const year = now.getFullYear();
                document.getElementById('current-date').textContent = `${dayName}, ${day} ${month} ${year}`;
            }

            updateDateTime();
            setInterval(updateDateTime, 1000);
        });
