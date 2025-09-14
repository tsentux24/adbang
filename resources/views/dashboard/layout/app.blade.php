<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Sistem Manajemen Data</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('malut.png') }}">

    <style>
        :root {
            --primary: #4f46e5;
            --primary-light: #6366f1;
            --primary-dark: #4338ca;
            --accent: #06b6d4;
            --accent-light: #22d3ee;
            --accent-dark: #0891b2;
        }

        body {
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            background-color: #f9fafb;
        }

        .sidebar {
            width: 260px;
            transition: all 0.3s ease;
        }

        .main-content {
            margin-left: 260px;
            transition: all 0.3s ease;
        }

        @media (max-width: 1024px) {
            .sidebar {
                transform: translateX(-100%);
                position: fixed;
                z-index: 50;
                height: 100vh;
            }

            .main-content {
                margin-left: 0;
            }

            .sidebar.active {
                transform: translateX(0);
            }
        }

        .nav-item {
            transition: all 0.2s ease;
            border-left: 3px solid transparent;
        }

        .nav-item:hover, .nav-item.active {
            border-left-color: var(--primary);
            background-color: rgba(79, 70, 229, 0.1);
        }

        .card-hover {
            transition: all 0.3s ease;
        }

        .card-hover:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px -5px rgba(0, 0, 0, 0.1);
        }

        .progress-bar {
            transition: width 1s ease-in-out;
        }

        .modal {
            transition: opacity 0.3s ease, transform 0.3s ease;
        }

        .modal.hidden {
            opacity: 0;
            transform: scale(0.9);
            pointer-events: none;
        }

        .dropdown-content {
            display: none;
            position: absolute;
            right: 0;
            top: 100%;
            background-color: white;
            min-width: 200px;
            box-shadow: 0 8px 16px 0 rgba(0,0,0,0.2);
            z-index: 1000;
            border-radius: 8px;
            overflow: hidden;
            margin-top: 10px;
        }

        .dropdown-item {
            display: flex;
            align-items: center;
            padding: 12px 16px;
            text-decoration: none;
            color: #4b5563;
            transition: background-color 0.2s;
        }

        .dropdown-item:hover {
            background-color: #f3f4f6;
        }

        .dropdown-item i {
            margin-right: 10px;
            width: 20px;
            text-align: center;
        }

        .dropdown-divider {
            height: 1px;
            background-color: #e5e7eb;
            margin: 4px 0;
        }

        /* Logo Styles */
        .logo-container {
            display: flex;
            align-items: center;
            gap: 12px;
            padding: 16px 20px;
            background: linear-gradient(135deg, #4f46e5 0%, #6366f1 100%);
            border-radius: 0 0 12px 12px;
            margin-bottom: 10px;
            box-shadow: 0 4px 12px rgba(79, 70, 229, 0.2);
        }

        .logo-icon {
            width: 40px;
            height: 40px;
            background: white;
            border-radius: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
        }

        .logo-icon i {
            color: #4f46e5;
            font-size: 20px;
        }

        .logo-text {
            flex: 1;
        }

        .logo-title {
            color: white;
            font-weight: 700;
            font-size: 18px;
            line-height: 1.2;
            margin: 0;
        }

        .logo-subtitle {
            color: rgba(255, 255, 255, 0.8);
            font-size: 11px;
            margin: 0;
            font-weight: 400;
        }

        /* Responsive Logo */
        @media (max-width: 768px) {
            .logo-container {
                padding: 12px 15px;
                border-radius: 0;
            }

            .logo-title {
                font-size: 16px;
            }

            .logo-subtitle {
                font-size: 10px;
            }

            .logo-icon {
                width: 35px;
                height: 35px;
            }

            .logo-icon i {
                font-size: 18px;
            }
        }

        @media (max-width: 480px) {
            .logo-text {
                display: none;
            }

            .logo-container {
                justify-content: center;
                padding: 15px;
            }

            .logo-icon {
                width: 45px;
                height: 45px;
                margin: 0 auto;
            }

            .logo-icon i {
                font-size: 22px;
            }
        }
    </style>
</head>
<body class="bg-gray-50 text-gray-800 antialiased">
    @include('dashboard.layout.nav')

    <!-- Sidebar -->
    <div class="sidebar fixed top-0 left-0 h-screen bg-white shadow-lg z-40">
        <!-- Logo Container -->
        <div class="logo-container">
            <div class="logo-icon">
                <i class="fas fa-database"></i>
            </div>
            <div class="logo-text">
                <h1 class="logo-title">Sistem Manajemen</h1>
                <p class="logo-subtitle">Pemerintah Maluku Utara</p>
            </div>
        </div>

        <div class="p-4">
            <ul class="space-y-2">
                <li>
                    <a href="/" class="nav-item flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-700">
                        <i class="fas fa-home"></i>
                        <span>Beranda</span>
                    </a>
                </li>
                <li>
                    <a href="/dataopd" class="nav-item flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-700">
                        <i class="fas fa-building"></i>
                        <span>Manajemen OPD</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-700">
                        <i class="fas fa-project-diagram"></i>
                        <span>Proyek</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-700">
                        <i class="fas fa-chart-bar"></i>
                        <span>Laporan</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-700">
                        <i class="fas fa-archive"></i>
                        <span>Arsip</span>
                    </a>
                </li>
                <li>
                    <a href="#" class="nav-item flex items-center gap-3 px-4 py-3 text-gray-600 hover:text-indigo-700">
                        <i class="fas fa-cog"></i>
                        <span>Pengaturan</span>
                    </a>
                </li>
            </ul>
        </div>

        <div class="absolute bottom-0 w-full p-4 border-t border-gray-200">
            <div class="flex items-center gap-3 px-4 py-2">
                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                    <i class="fas fa-user text-indigo-600"></i>
                </div>
                <div>
                    <p class="text-sm font-medium">Fangky Sie</p>
                    <p class="text-xs text-gray-500">Super Admin</p>
                </div>
            </div>
        </div>
    </div>
    @yield('content')
</body>
</html>
