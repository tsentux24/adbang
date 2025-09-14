<!-- Main Content -->
<div class="main-content min-h-screen">
    <!-- Header -->
    <header class="bg-white shadow-sm sticky top-0 z-30">
        <div class="flex items-center justify-between p-4">
            <div class="flex items-center gap-4">
                <button id="sidebar-toggle" class="lg:hidden text-gray-600">
                    <i class="fas fa-bars text-xl"></i>
                </button>
                <h1 class="text-xl font-semibold text-gray-800">Dashboard Administrator</h1>
            </div>

            <div class="flex items-center gap-4">
                <div class="hidden md:flex items-center relative">
                    <i class="fas fa-search absolute left-3 text-gray-400"></i>
                    <input type="text" placeholder="Cari..." class="rounded-full pl-10 pr-4 py-2 text-sm text-gray-700 focus:outline-none focus:ring-2 focus:ring-indigo-400 w-48 border border-gray-300">
                </div>

                <div class="flex items-center gap-2">
                    <!-- Notification Button with Modal -->
                    <button id="notification-button" class="h-10 w-10 rounded-full bg-gray-100 flex items-center justify-center text-gray-600 relative hover:bg-gray-200 transition-colors">
                        <i class="fas fa-bell"></i>
                        <span class="absolute top-0 right-0 h-4 w-4 bg-red-500 rounded-full text-xs text-white flex items-center justify-center">3</span>
                    </button>

                    <!-- Notification Modal -->
                    <div id="notification-modal" class="fixed inset-0 bg-black bg-opacity-50 z-50 hidden flex items-center justify-center p-4">
                        <div class="bg-white rounded-lg shadow-xl w-full max-w-md max-h-96 overflow-hidden">
                            <div class="flex items-center justify-between p-4 border-b">
                                <h3 class="text-lg font-semibold text-gray-800">Notifikasi</h3>
                                <button id="close-notification" class="text-gray-400 hover:text-gray-600">
                                    <i class="fas fa-times"></i>
                                </button>
                            </div>
                            <div class="overflow-y-auto max-h-80">
                                <div class="p-4 space-y-3">
                                    <div class="flex items-start gap-3 p-3 bg-blue-50 rounded-lg">
                                        <div class="h-10 w-10 rounded-full bg-blue-100 flex items-center justify-center text-blue-600 mt-1">
                                            <i class="fas fa-info-circle"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-800">Data OPD baru ditambahkan</p>
                                            <p class="text-xs text-gray-500">Dinas Kesehatan telah terdaftar</p>
                                            <p class="text-xs text-gray-400 mt-1">2 menit yang lalu</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 p-3 bg-green-50 rounded-lg">
                                        <div class="h-10 w-10 rounded-full bg-green-100 flex items-center justify-center text-green-600 mt-1">
                                            <i class="fas fa-check-circle"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-800">Proyek selesai</p>
                                            <p class="text-xs text-gray-500">Proyek infrastruktur telah selesai</p>
                                            <p class="text-xs text-gray-400 mt-1">1 jam yang lalu</p>
                                        </div>
                                    </div>
                                    <div class="flex items-start gap-3 p-3 bg-yellow-50 rounded-lg">
                                        <div class="h-10 w-10 rounded-full bg-yellow-100 flex items-center justify-center text-yellow-600 mt-1">
                                            <i class="fas fa-exclamation-circle"></i>
                                        </div>
                                        <div class="flex-1">
                                            <p class="text-sm font-medium text-gray-800">Peringatan sistem</p>
                                            <p class="text-xs text-gray-500">Backup database diperlukan</p>
                                            <p class="text-xs text-gray-400 mt-1">5 jam yang lalu</p>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="p-4 border-t">
                                <button class="w-full py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700 transition-colors">
                                    Tandai sudah dibaca
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- User Dropdown -->
                    <div class="relative">
                        <button id="user-menu-button" class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center text-indigo-600 hover:bg-indigo-200 transition-colors">
                            <i class="fas fa-user"></i>
                        </button>
                        <div id="user-dropdown" class="absolute right-0 mt-2 w-48 bg-white rounded-lg shadow-xl z-50 hidden border border-gray-200">
                            <div class="py-2">
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-user-circle w-5 text-gray-400 mr-3"></i>
                                    <span>Profil</span>
                                </a>
                                <a href="#" class="flex items-center px-4 py-2 text-sm text-gray-700 hover:bg-gray-100">
                                    <i class="fas fa-cog w-5 text-gray-400 mr-3"></i>
                                    <span>Pengaturan</span>
                                </a>
                                <div class="border-t border-gray-100 my-1"></div>
                                <form action ="{{ route('logout') }}" method="POST">
                                    @csrf
                                <button class="flex items-center px-4 py-2 text-sm text-red-600 hover:bg-gray-100">
                                    <i class="fas fa-sign-out-alt w-5 text-red-400 mr-3"></i>
                                    <span>Logout</span>
                                </button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <style>
        /* Dropdown Animation */
        #user-dropdown {
            opacity: 0;
            transform: translateY(-10px);
            transition: all 0.3s ease;
        }

        #user-dropdown.show {
            opacity: 1;
            transform: translateY(0);
            display: block;
        }

        /* Modal Animation */
        #notification-modal {
            opacity: 0;
            transition: all 0.3s ease;
        }

        #notification-modal.show {
            opacity: 1;
            display: flex;
        }

        /* Notification Items Hover */
        .bg-blue-50:hover, .bg-green-50:hover, .bg-yellow-50:hover {
            transform: translateX(2px);
            transition: transform 0.2s ease;
        }

        /* Smooth transitions for buttons */
        button {
            transition: all 0.2s ease;
        }

        button:hover {
            transform: translateY(-1px);
        }
    </style>

    <script>
        document.addEventListener('DOMContentLoaded', function() {
            // Elements
            const userMenuButton = document.getElementById('user-menu-button');
            const userDropdown = document.getElementById('user-dropdown');
            const notificationButton = document.getElementById('notification-button');
            const notificationModal = document.getElementById('notification-modal');
            const closeNotification = document.getElementById('close-notification');
            const sidebarToggle = document.getElementById('sidebar-toggle');

            // Toggle User Dropdown
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                const isVisible = userDropdown.classList.contains('show');

                // Close all other dropdowns first
                closeAllDropdowns();

                // Toggle current dropdown
                if (!isVisible) {
                    userDropdown.classList.add('show');
                }
            });

            // Toggle Notification Modal
            notificationButton.addEventListener('click', function() {
                notificationModal.classList.add('show');
                document.body.style.overflow = 'hidden'; // Prevent background scrolling
            });

            // Close Notification Modal
            closeNotification.addEventListener('click', function() {
                notificationModal.classList.remove('show');
                document.body.style.overflow = ''; // Re-enable scrolling
            });

            // Close modal when clicking outside
            notificationModal.addEventListener('click', function(e) {
                if (e.target === notificationModal) {
                    notificationModal.classList.remove('show');
                    document.body.style.overflow = '';
                }
            });

            // Close dropdowns when clicking outside
            document.addEventListener('click', function(e) {
                if (!e.target.closest('.relative') && !e.target.closest('#user-menu-button')) {
                    closeAllDropdowns();
                }
            });

            // Close dropdowns when pressing Escape key
            document.addEventListener('keydown', function(e) {
                if (e.key === 'Escape') {
                    closeAllDropdowns();
                    if (notificationModal.classList.contains('show')) {
                        notificationModal.classList.remove('show');
                        document.body.style.overflow = '';
                    }
                }
            });

            // Sidebar toggle functionality
            sidebarToggle.addEventListener('click', function() {
                const sidebar = document.querySelector('.sidebar');
                sidebar.classList.toggle('active');
            });

            // Function to close all dropdowns
            function closeAllDropdowns() {
                userDropdown.classList.remove('show');
            }

            // Prevent dropdown from closing when clicking inside
            userDropdown.addEventListener('click', function(e) {
                e.stopPropagation();
            });

            // Sample notification data (can be replaced with dynamic data)
            const notifications = [
                {
                    type: 'info',
                    title: 'Data OPD baru ditambahkan',
                    message: 'Dinas Kesehatan telah terdaftar',
                    time: '2 menit yang lalu',
                    icon: 'info-circle'
                },
                {
                    type: 'success',
                    title: 'Proyek selesai',
                    message: 'Proyek infrastruktur telah selesai',
                    time: '1 jam yang lalu',
                    icon: 'check-circle'
                },
                {
                    type: 'warning',
                    title: 'Peringatan sistem',
                    message: 'Backup database diperlukan',
                    time: '5 jam yang lalu',
                    icon: 'exclamation-circle'
                }
            ];

            // Function to update notification badge
            function updateNotificationBadge() {
                const unreadCount = notifications.length;
                const badge = notificationButton.querySelector('span');
                if (unreadCount > 0) {
                    badge.textContent = unreadCount;
                    badge.classList.remove('hidden');
                } else {
                    badge.classList.add('hidden');
                }
            }

            // Initial update
            updateNotificationBadge();
        });
    </script>
