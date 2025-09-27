<!DOCTYPE html>
<html lang="id">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>E-Pengendalian</title>
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
  <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@300;400;500;600;700&display=swap" rel="stylesheet">
  <style>
    :root {
      --primary: #31326F;
      --secondary: #4FB7B3;
      --accent: #1F8ECD;
      --success: #4cc9f0;
      --warning: #f72585;
      --light: #f8f9fa;
      --dark: #212529;
      --bg-light: #f0f2f5;
      --bg-dark: #121212;
      --card-light: #ffffff;
      --card-dark: #1e1e1e;
      --text-light: #333333;
      --text-dark: #f1f1f1;
    }

    body {
      font-family: 'Poppins', sans-serif;
      background-color: var(--bg-light);
      color: var(--text-light);
      transition: background-color 0.4s, color 0.4s;
      padding-bottom: 80px;
      position: relative;
      min-height: 100vh;
    }

    /* Background siluet kantor gubernur */
    body::before {
      content: "";
      position: fixed;
      top: 0;
      left: 0;
      width: 100%;
      height: 100%;
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 600'%3E%3Cpath fill='%2331326F' fill-opacity='0.05' d='M200,450 L250,400 L300,450 L350,400 L400,450 L450,400 L500,450 L550,400 L600,450 L650,400 L700,450 L750,400 L800,450 L800,600 L0,600 L0,450 L50,400 L100,450 L150,400 L200,450 Z'/%3E%3Cpath fill='%2331326F' fill-opacity='0.05' d='M250,350 L300,300 L350,350 L400,300 L450,350 L500,300 L550,350 L600,300 L650,350 L700,300 L750,350 L750,450 L250,450 L250,350 Z'/%3E%3Cpath fill='%2331326F' fill-opacity='0.05' d='M300,250 L350,200 L400,250 L450,200 L500,250 L550,200 L600,250 L600,350 L300,350 L300,250 Z'/%3E%3Cpath fill='%2331326F' fill-opacity='0.05' d='M350,150 L400,100 L450,150 L500,100 L550,150 L550,250 L350,250 L350,150 Z'/%3E%3Cpath fill='%2331326F' fill-opacity='0.05' d='M375,50 L425,0 L475,50 L475,150 L375,150 L375,50 Z'/%3E%3Crect x='425' y='100' width='50' height='50' fill='%2331326F' fill-opacity='0.08'/%3E%3Crect x='325' y='200' width='50' height='50' fill='%2331326F' fill-opacity='0.08'/%3E%3Crect x='525' y='200' width='50' height='50' fill='%2331326F' fill-opacity='0.08'/%3E%3Crect x='225' y='300' width='50' height='50' fill='%2331326F' fill-opacity='0.08'/%3E%3Crect x='625' y='300' width='50' height='50' fill='%2331326F' fill-opacity='0.08'/%3E%3C/svg%3E");
      background-size: cover;
      background-position: center bottom;
      background-repeat: no-repeat;
      opacity: 0.4;
      z-index: -1;
      pointer-events: none;
    }

    body.dark-mode::before {
      background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 800 600'%3E%3Cpath fill='%234FB7B3' fill-opacity='0.08' d='M200,450 L250,400 L300,450 L350,400 L400,450 L450,400 L500,450 L550,400 L600,450 L650,400 L700,450 L750,400 L800,450 L800,600 L0,600 L0,450 L50,400 L100,450 L150,400 L200,450 Z'/%3E%3Cpath fill='%234FB7B3' fill-opacity='0.08' d='M250,350 L300,300 L350,350 L400,300 L450,350 L500,300 L550,350 L600,300 L650,350 L700,300 L750,350 L750,450 L250,450 L250,350 Z'/%3E%3Cpath fill='%234FB7B3' fill-opacity='0.08' d='M300,250 L350,200 L400,250 L450,200 L500,250 L550,200 L600,250 L600,350 L300,350 L300,250 Z'/%3E%3Cpath fill='%234FB7B3' fill-opacity='0.08' d='M350,150 L400,100 L450,150 L500,100 L550,150 L550,250 L350,250 L350,150 Z'/%3E%3Cpath fill='%234FB7B3' fill-opacity='0.08' d='M375,50 L425,0 L475,50 L475,150 L375,150 L375,50 Z'/%3E%3Crect x='425' y='100' width='50' height='50' fill='%234FB7B3' fill-opacity='0.1'/%3E%3Crect x='325' y='200' width='50' height='50' fill='%234FB7B3' fill-opacity='0.1'/%3E%3Crect x='525' y='200' width='50' height='50' fill='%234FB7B3' fill-opacity='0.1'/%3E%3Crect x='225' y='300' width='50' height='50' fill='%234FB7B3' fill-opacity='0.1'/%3E%3Crect x='625' y='300' width='50' height='50' fill='%234FB7B3' fill-opacity='0.1'/%3E%3C/svg%3E");
    }

    /* Dark mode */
    body.dark-mode {
      background-color: var(--bg-dark);
      color: var(--text-dark);
    }

    /* Header styling */
    .app-header {
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      border-radius: 0 0 20px 20px;
      padding: 20px;
      color: white;
      box-shadow: 0 4px 20px rgba(0, 0, 0, 0.1);
      margin-bottom: 24px;
      position: relative;
      z-index: 1;
    }

    /* Logo styling */
    .logo-container {
      display: flex;
      align-items: center;
      gap: 12px;
      margin-bottom: 10px;
    }

    .logo-img {
      height: 40px;
      filter: drop-shadow(0 2px 4px rgba(0, 0, 0, 0.2));
    }

    /* Card styling */
    .card-custom {
      border: none;
      border-radius: 16px;
      background: var(--card-light);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.05);
      transition: all 0.3s ease;
      overflow: hidden;
      opacity: 0;
      transform: translateY(30px);
      animation: fadeSlideUp 0.8s forwards;
      position: relative;
      z-index: 1;
      backdrop-filter: blur(5px);
      background-color: rgba(255, 255, 255, 0.9);
    }

    body.dark-mode .card-custom {
      background: rgba(30, 30, 30, 0.9);
      box-shadow: 0 8px 20px rgba(0, 0, 0, 0.2);
    }

    /* Hover efek interaktif */
    .card-custom:hover {
      transform: translateY(-5px);
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.1);
    }

    body.dark-mode .card-custom:hover {
      box-shadow: 0 12px 24px rgba(0, 0, 0, 0.3);
    }

    /* Animasi on load */
    @keyframes fadeSlideUp {
      to {
        opacity: 1;
        transform: translateY(0);
      }
    }

    /* Stagger animasi */
    .stagger-1 { animation-delay: 0.1s; }
    .stagger-2 { animation-delay: 0.2s; }
    .stagger-3 { animation-delay: 0.3s; }
    .stagger-4 { animation-delay: 0.4s; }
    .stagger-5 { animation-delay: 0.5s; }
    .stagger-6 { animation-delay: 0.6s; }
    .stagger-7 { animation-delay: 0.7s; }

    /* Summary cards */
    .summary-card {
      position: relative;
      padding: 20px;
      text-align: center;
    }

    .summary-card h6 {
      font-size: 0.9rem;
      margin-bottom: 8px;
      color: #6c757d;
    }

    body.dark-mode .summary-card h6 {
      color: #adb5bd;
    }

    .summary-card p {
      font-size: 1.8rem;
      font-weight: 700;
      margin-bottom: 0;
    }

    .summary-icon {
      position: absolute;
      top: 15px;
      right: 15px;
      opacity: 0.2;
      font-size: 1.8rem;
    }

    /* Progress bar styling */
    .progress {
      height: 8px;
      border-radius: 10px;
      background-color: #e9ecef;
      margin-top: 10px;
    }

    body.dark-mode .progress {
      background-color: #2d2d2d;
    }

    .progress-bar {
      border-radius: 10px;
      background: linear-gradient(to right, var(--primary), var(--secondary));
    }

    /* Menu cards */
    .menu-card {
      padding: 25px 15px;
      text-align: center;
      cursor: pointer;
    }

    .menu-icon {
      font-size: 24px;
      width: 50px;
      height: 50px;
      line-height: 50px;
      border-radius: 50%;
      margin: 0 auto 15px;
      background: linear-gradient(135deg, var(--primary) 0%, var(--secondary) 100%);
      color: white;
      transition: all 0.3s ease;
      animation: pulseIcon 2.5s infinite ease-in-out;
    }

    .menu-card:hover .menu-icon {
      transform: scale(1.1);
      box-shadow: 0 0 20px rgba(49, 50, 111, 0.5);
    }

    .menu-card p {
      font-weight: 500;
      margin-bottom: 0;
    }

    /* Staggered pulse menu */
    .pulse-1 { animation-delay: 0s; }
    .pulse-2 { animation-delay: 0.5s; }
    .pulse-3 { animation-delay: 1s; }

    /* Footer nav */
    .footer-nav {
      position: fixed;
      bottom: 0;
      width: 100%;
      background: var(--card-light);
      border-top: 1px solid rgba(0, 0, 0, 0.05);
      padding: 12px 0;
      display: flex;
      justify-content: space-around;
      box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.05);
      transition: all 0.4s;
      z-index: 1000;
    }

    body.dark-mode .footer-nav {
      background: var(--card-dark);
      border-top: 1px solid rgba(255, 255, 255, 0.05);
      box-shadow: 0 -4px 10px rgba(0, 0, 0, 0.2);
    }

    .footer-nav a {
      text-decoration: none;
      color: inherit;
      font-size: 12px;
      text-align: center;
      opacity: 0.7;
      transition: all 0.3s ease;
      padding: 5px 10px;
      border-radius: 15px;
    }

    .footer-nav a:hover, .footer-nav a.active {
      opacity: 1;
      background: rgba(49, 50, 111, 0.1);
      color: var(--primary);
    }

    body.dark-mode .footer-nav a:hover, 
    body.dark-mode .footer-nav a.active {
      background: rgba(49, 50, 111, 0.2);
    }

    .footer-icon {
      display: block;
      font-size: 20px;
      margin-bottom: 4px;
      transition: all 0.3s ease;
    }

    .footer-nav a:hover .footer-icon {
      transform: translateY(-3px);
    }

    /* Mode toggle button */
    .mode-toggle {
      background: rgba(255, 255, 255, 0.2);
      border: none;
      width: 40px;
      height: 40px;
      border-radius: 50%;
      display: flex;
      align-items: center;
      justify-content: center;
      color: white;
      transition: all 0.3s ease;
    }

    .mode-toggle:hover {
      background: rgba(255, 255, 255, 0.3);
      transform: rotate(30deg);
    }

    /* Section titles */
    .section-title {
      position: relative;
      padding-left: 15px;
      margin-bottom: 20px;
      font-weight: 600;
    }

    .section-title::before {
      content: '';
      position: absolute;
      left: 0;
      top: 50%;
      transform: translateY(-50%);
      height: 20px;
      width: 5px;
      background: linear-gradient(to bottom, var(--primary), var(--secondary));
      border-radius: 10px;
    }

    /* Mini chart */
    .mini-chart {
      height: 40px;
      display: flex;
      align-items: flex-end;
      margin-top: 10px;
    }

    .chart-bar {
      flex: 1;
      background: linear-gradient(to top, var(--primary), var(--secondary));
      margin: 0 2px;
      border-radius: 3px 3px 0 0;
    }

    /* Stats highlight */
    .stats-highlight {
      background: linear-gradient(135deg, rgba(49, 50, 111, 0.1) 0%, rgba(79, 183, 179, 0.1) 100%);
      border-radius: 12px;
      padding: 15px;
      margin-top: 15px;
    }

    body.dark-mode .stats-highlight {
      background: linear-gradient(135deg, rgba(49, 50, 111, 0.2) 0%, rgba(79, 183, 179, 0.2) 100%);
    }

    /* Pulse animation */
    @keyframes pulseIcon {
      0%, 100% { transform: scale(1); }
      50% { transform: scale(1.05); }
    }

    /* Responsive adjustments */
    @media (max-width: 576px) {
      .summary-card p {
        font-size: 1.5rem;
      }
      
      .menu-card {
        padding: 20px 10px;
      }
      
      .menu-icon {
        width: 40px;
        height: 40px;
        line-height: 40px;
        font-size: 18px;
      }
      
      .logo-img {
        height: 35px;
      }
      
      body::before {
        opacity: 0.3;
        background-size: 800px auto;
        background-position: center 70%;
      }
    }
  </style>
</head>
<body>
  <!-- Header -->
  <div class="app-header">
    <div class="container">
      <div class="logo-container">
        <img src="https://e-rekrutmen.malutprov.go.id/assets/images/malut.png" alt="Logo Pemerintah Provinsi Maluku Utara" class="logo-img">
        <div>
          <h2 class="fw-bold mb-0">E-Pengendalian</h2>
          <p class="mb-0 opacity-75">Pemerintah Provinsi Maluku Utara</p>
        </div>
      </div>
      
      <div class="d-flex justify-content-between align-items-center mt-2">
        <p class="mb-0">Selamat datang, Admin!</p>
        <button id="toggleMode" class="mode-toggle">
          <i class="fas fa-moon"></i>
        </button>
      </div>
    </div>
  </div>

  <div class="container">
    <!-- Ringkasan -->
    <h5 class="section-title">Ringkasan</h5>
    <div class="row g-3 mb-4">
      <div class="col-6 col-md-3">
        <div class="card-custom summary-card stagger-1">
          <i class="fas fa-folder-open summary-icon" style="color: var(--primary);"></i>
          <h6>Total Proyek</h6>
          <p style="color: var(--primary);">25</p>
          <div class="progress">
            <div class="progress-bar" style="width: 100%"></div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card-custom summary-card stagger-2">
          <i class="fas fa-check-circle summary-icon" style="color: var(--secondary);"></i>
          <h6>Progress Selesai</h6>
          <p style="color: var(--secondary);">15</p>
          <div class="progress">
            <div class="progress-bar" style="width: 60%"></div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card-custom summary-card stagger-3">
          <i class="fas fa-spinner summary-icon" style="color: var(--accent);"></i>
          <h6>Progress Berjalan</h6>
          <p style="color: var(--accent);">8</p>
          <div class="progress">
            <div class="progress-bar" style="width: 32%"></div>
          </div>
        </div>
      </div>
      <div class="col-6 col-md-3">
        <div class="card-custom summary-card stagger-4">
          <i class="fas fa-exclamation-triangle summary-icon" style="color: var(--warning);"></i>
          <h6>Terlambat</h6>
          <p style="color: var(--warning);">2</p>
          <div class="progress">
            <div class="progress-bar" style="width: 8%"></div>
          </div>
        </div>
      </div>
    </div>

    <!-- Stats Highlight -->
    <div class="card-custom p-3 mb-4 stagger-5">
      <div class="stats-highlight">
        <div class="row text-center">
          <div class="col-4">
            <h4 class="mb-0" style="color: var(--primary);">60%</h4>
            <small>Penyelesaian</small>
          </div>
          <div class="col-4">
            <h4 class="mb-0" style="color: var(--secondary);">92%</h4>
            <small>Kepuasan Klien</small>
          </div>
          <div class="col-4">
            <h4 class="mb-0" style="color: var(--accent);">₋5%</h4>
            <small>Keterlambatan</small>
          </div>
        </div>
      </div>
    </div>

    <!-- Progress Chart -->
    <h5 class="section-title">Progress Proyek</h5>
    <div class="card-custom p-3 mb-4 stagger-5">
      <div class="mini-chart">
        <div class="chart-bar" style="height: 80%"></div>
        <div class="chart-bar" style="height: 60%"></div>
        <div class="chart-bar" style="height: 90%"></div>
        <div class="chart-bar" style="height: 70%"></div>
        <div class="chart-bar" style="height: 50%"></div>
        <div class="chart-bar" style="height: 85%"></div>
        <div class="chart-bar" style="height: 75%"></div>
      </div>
      <div class="d-flex justify-content-between mt-2">
        <small>Senin</small>
        <small>Minggu ini</small>
      </div>
    </div>

    <!-- Menu -->
    <h5 class="section-title">Menu Pilihan</h5>
    <div class="row g-3 mb-5">
      <div class="col-4">
        <div class="card-custom menu-card stagger-5">
          <div class="menu-icon pulse-1">
            <i class="fas fa-folder"></i>
          </div>
          <p>Proyek Saya</p>
        </div>
      </div>
      <div class="col-4">
        <div class="card-custom menu-card stagger-6">
          <div class="menu-icon pulse-2">
            <i class="fas fa-tasks"></i>
          </div>
          <p>Input Progress</p>
        </div>
      </div>
      <div class="col-4">
        <div class="card-custom menu-card stagger-7">
          <div class="menu-icon pulse-3">
            <i class="fas fa-chart-bar"></i>
          </div>
          <p>Laporan Saya</p>
        </div>
      </div>
    </div>
  </div>

  <!-- Footer Nav -->
  <div class="footer-nav">
    <a href="#" class="active">
      <i class="fas fa-home footer-icon"></i>
      <span>Beranda</span>
    </a>
    <a href="#">
      <i class="fas fa-user footer-icon"></i>
      <span>Profil</span>
    </a>
    <a href="#">
      <i class="fas fa-bell footer-icon"></i>
      <span>Notifikasi</span>
    </a>
    <a href="#">
      <i class="fas fa-cog footer-icon"></i>
      <span>Pengaturan</span>
    </a>
  </div>

  <script>
    const toggleBtn = document.getElementById('toggleMode');
    toggleBtn.addEventListener('click', () => {
      document.body.classList.toggle('dark-mode');
      if (document.body.classList.contains('dark-mode')) {
        toggleBtn.innerHTML = '<i class="fas fa-sun"></i>';
      } else {
        toggleBtn.innerHTML = '<i class="fas fa-moon"></i>';
      }
    });
  </script>
</body>
</html>