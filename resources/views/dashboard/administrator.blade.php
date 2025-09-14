@extends('dashboard.layout.app',['title'=>'HomePage'])
@section('content')

        <!-- Content -->
        <div class="p-6">
            <!-- Statistik Utama -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-5 mb-8">
                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Total OPD</p>
                            <h3 class="text-2xl font-bold text-gray-800">42</h3>
                        </div>
                        <div class="bg-indigo-100 p-3 rounded-lg">
                            <i class="fas fa-building text-indigo-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> 5% dari bulan lalu</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Total Proyek</p>
                            <h3 class="text-2xl font-bold text-gray-800">128</h3>
                        </div>
                        <div class="bg-cyan-100 p-3 rounded-lg">
                            <i class="fas fa-project-diagram text-cyan-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> 12% dari bulan lalu</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Total Arsip</p>
                            <h3 class="text-2xl font-bold text-gray-800">2,548</h3>
                        </div>
                        <div class="bg-green-100 p-3 rounded-lg">
                            <i class="fas fa-archive text-green-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-green-600 mt-2"><i class="fas fa-arrow-up"></i> 8% dari bulan lalu</p>
                </div>

                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100 card-hover">
                    <div class="flex justify-between items-start">
                        <div>
                            <p class="text-sm text-gray-500">Pengguna Aktif</p>
                            <h3 class="text-2xl font-bold text-gray-800">38</h3>
                        </div>
                        <div class="bg-purple-100 p-3 rounded-lg">
                            <i class="fas fa-users text-purple-600 text-xl"></i>
                        </div>
                    </div>
                    <p class="text-xs text-gray-600 mt-2">Tidak berubah dari bulan lalu</p>
                </div>
            </div>

            <!-- Chart & Proyek Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- Chart: Status Proyek -->
                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                    <h3 class="text-lg font-semibold text-gray-800 mb-5 flex items-center gap-2">
                        <i class="fas fa-chart-pie text-indigo-600"></i>
                        Distribusi Status Proyek
                    </h3>
                    <div class="chart-container" style="height: 250px;">
                        <canvas id="projectStatusChart"></canvas>
                    </div>
                </div>

                <!-- Proyek Terbaru -->
                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-history text-indigo-600"></i>
                            Proyek Terbaru
                        </h3>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>

                    <div class="space-y-4">
                        <div class="p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-indigo-700">Pembangunan Jalan Tol Ternate</h4>
                                <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-1 rounded-full font-medium">Ongoing</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Dinas Pekerjaan Umum</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-blue-600 h-2 rounded-full progress-bar" style="width: 65%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>Progress: 65%</span>
                                <span>Update: 2 hari lalu</span>
                            </div>
                        </div>

                        <div class="p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-indigo-700">Revitalisasi Pasar Tradisional</h4>
                                <span class="bg-yellow-100 text-yellow-800 text-xs px-2.5 py-1 rounded-full font-medium">Planning</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Dinas Perdagangan</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-yellow-500 h-2 rounded-full progress-bar" style="width: 15%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>Progress: 15%</span>
                                <span>Update: 5 hari lalu</span>
                            </div>
                        </div>

                        <div class="p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex justify-between items-start mb-2">
                                <h4 class="font-medium text-indigo-700">Program Smart City</h4>
                                <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">Completed</span>
                            </div>
                            <p class="text-sm text-gray-600 mb-2">Dinas Komunikasi dan Informatika</p>
                            <div class="w-full bg-gray-200 rounded-full h-2 mb-2">
                                <div class="bg-green-600 h-2 rounded-full progress-bar" style="width: 100%"></div>
                            </div>
                            <div class="flex justify-between text-xs text-gray-500">
                                <span>Progress: 100%</span>
                                <span>Update: 1 minggu lalu</span>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- OPD & Arsip Terbaru -->
            <div class="grid grid-cols-1 lg:grid-cols-2 gap-6 mb-8">
                <!-- OPD Terbaru -->
                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-building text-indigo-600"></i>
                            OPD Terbaru
                        </h3>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-indigo-100 flex items-center justify-center">
                                    <i class="fas fa-building text-indigo-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Dinas Kelautan dan Perikanan</h4>
                                    <p class="text-sm text-gray-600">Kode: OPD-042</p>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">Aktif</span>
                        </div>

                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-cyan-100 flex items-center justify-center">
                                    <i class="fas fa-building text-cyan-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Dinas Pariwisata</h4>
                                    <p class="text-sm text-gray-600">Kode: OPD-041</p>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">Aktif</span>
                        </div>

                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div class="flex items-center gap-3">
                                <div class="h-10 w-10 rounded-full bg-purple-100 flex items-center justify-center">
                                    <i class="fas fa-building text-purple-600"></i>
                                </div>
                                <div>
                                    <h4 class="font-medium">Dinas Koperasi dan UKM</h4>
                                    <p class="text-sm text-gray-600">Kode: OPD-040</p>
                                </div>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">Aktif</span>
                        </div>
                    </div>
                </div>

                <!-- Arsip Terbaru -->
                <div class="bg-white rounded-xl p-5 shadow-md border border-gray-100">
                    <div class="flex justify-between items-center mb-5">
                        <h3 class="text-lg font-semibold text-gray-800 flex items-center gap-2">
                            <i class="fas fa-archive text-indigo-600"></i>
                            Arsip Terbaru
                        </h3>
                        <a href="#" class="text-sm text-indigo-600 hover:text-indigo-800 font-medium">Lihat Semua <i class="fas fa-arrow-right ml-1"></i></a>
                    </div>

                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div>
                                <h4 class="font-medium text-indigo-700">Laporan Triwulan I 2025</h4>
                                <p class="text-sm text-gray-600">Dinas Pendidikan • 2 jam yang lalu</p>
                            </div>
                            <span class="bg-blue-100 text-blue-800 text-xs px-2.5 py-1 rounded-full font-medium">PDF</span>
                        </div>

                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div>
                                <h4 class="font-medium text-indigo-700">Data Realisasi Anggaran</h4>
                                <p class="text-sm text-gray-600">Dinas Kesehatan • 1 hari yang lalu</p>
                            </div>
                            <span class="bg-green-100 text-green-800 text-xs px-2.5 py-1 rounded-full font-medium">XLSX</span>
                        </div>

                        <div class="flex items-center justify-between p-3 border border-gray-100 rounded-lg hover:bg-gray-50 transition">
                            <div>
                                <h4 class="font-medium text-indigo-700">Statistik Kependudukan</h4>
                                <p class="text-sm text-gray-600">Dinas Kependudukan • 2 hari yang lalu</p>
                            </div>
                            <span class="bg-purple-100 text-purple-800 text-xs px-2.5 py-1 rounded-full font-medium">DOC</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!-- Modal Filter Arsip -->
    <div id="arsip-modal" class="modal fixed inset-0 bg-gray-600 bg-opacity-50 flex items-center justify-center p-4 z-50 hidden">
        <div class="bg-white rounded-xl shadow-lg w-full max-w-md">
            <div class="p-5 border-b border-gray-200">
                <h3 class="text-lg font-semibold text-gray-800">Filter Arsip</h3>
            </div>

            <div class="p-5">
                <form>
                    <div class="mb-4">
                        <label class="block text-sm font-medium text-gray-700 mb-1">OPD</label>
                        <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                            <option value="">Pilih OPD</option>
                            <option value="opd-1">Dinas Pendidikan</option>
                            <option value="opd-2">Dinas Kesehatan</option>
                            <option value="opd-3">Dinas Pekerjaan Umum</option>
                        </select>
                    </div>

                    <div class="grid grid-cols-2 gap-4 mb-4">
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Bulan</label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                <option value="">Pilih Bulan</option>
                                <option value="1">Januari</option>
                                <option value="2">Februari</option>
                                <option value="3">Maret</option>
                            </select>
                        </div>

                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">Tahun</label>
                            <select class="w-full border border-gray-300 rounded-lg px-4 py-2.5 focus:outline-none focus:ring-2 focus:ring-indigo-400">
                                <option value="">Pilih Tahun</option>
                                <option value="2025">2025</option>
                                <option value="2024">2024</option>
                                <option value="2023">2023</option>
                            </select>
                        </div>
                    </div>
                </form>
            </div>

            <div class="flex justify-end gap-3 p-5 border-t border-gray-200">
                <button id="close-modal" class="px-4 py-2 text-gray-700 rounded-lg border border-gray-300 hover:bg-gray-50">Batal</button>
                <button class="px-4 py-2 bg-indigo-600 text-white rounded-lg hover:bg-indigo-700">Terapkan Filter</button>
            </div>
        </div>
    </div>

    <script>
        // Toggle sidebar on mobile
        document.getElementById('sidebar-toggle').addEventListener('click', function() {
            document.querySelector('.sidebar').classList.toggle('active');
        });

        // User dropdown toggle
        const userMenuButton = document.getElementById('user-menu-button');
        const userDropdown = document.getElementById('user-dropdown');

        if (userMenuButton && userDropdown) {
            userMenuButton.addEventListener('click', function(e) {
                e.stopPropagation();
                userDropdown.style.display = userDropdown.style.display === 'block' ? 'none' : 'block';
            });

            // Close dropdown when clicking outside
            document.addEventListener('click', function(e) {
                if (!userDropdown.contains(e.target) && e.target !== userMenuButton) {
                    userDropdown.style.display = 'none';
                }
            });
        }

        // Modal functionality
        const arsipModal = document.getElementById('arsip-modal');
        const closeModal = document.getElementById('close-modal');

        function openModal() {
            arsipModal.classList.remove('hidden');
        }

        function closeModalFunc() {
            arsipModal.classList.add('hidden');
        }

        closeModal.addEventListener('click', closeModalFunc);

        // Close modal when clicking outside
        arsipModal.addEventListener('click', function(e) {
            if (e.target === arsipModal) {
                closeModalFunc();
            }
        });

        // Project Status Chart
        const ctx = document.getElementById('projectStatusChart').getContext('2d');
        const projectStatusChart = new Chart(ctx, {
            type: 'doughnut',
            data: {
                labels: ['Completed', 'Ongoing', 'Planning', 'On-hold'],
                datasets: [{
                    data: [35, 45, 15, 5],
                    backgroundColor: [
                        'rgba(16, 185, 129, 0.8)',
                        'rgba(59, 130, 246, 0.8)',
                        'rgba(245, 158, 11, 0.8)',
                        'rgba(239, 68, 68, 0.8)'
                    ],
                    borderColor: [
                        'rgb(16, 185, 129)',
                        'rgb(59, 130, 246)',
                        'rgb(245, 158, 11)',
                        'rgb(239, 68, 68)'
                    ],
                    borderWidth: 1,
                    hoverOffset: 15
                }]
            },
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            font: {
                                size: 12
                            },
                            padding: 20
                        }
                    }
                }
            }
        });

        // Animate progress bars
        document.addEventListener('DOMContentLoaded', function() {
            const progressBars = document.querySelectorAll('.progress-bar');
            progressBars.forEach(bar => {
                const width = bar.style.width;
                bar.style.width = '0';
                setTimeout(() => {
                    bar.style.width = width;
                }, 500);
            });
        });
    </script>
</body>
</html>
@endsection
