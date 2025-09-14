<!-- Tabel Data OPD -->
<div class="card">
    <div class="card-header bg-primary text-white d-flex justify-content-between align-items-center">
        <h5 class="card-title mb-0"><i class="fas fa-list me-2"></i>Daftar OPD Terdaftar</h5>
        <div class="d-flex">
            <input type="text" class="form-control form-control-sm rounded me-2" placeholder="Cari..." id="searchInput">
            <button class="btn btn-sm btn-light rounded" title="Refresh Data" id="refreshBtn">
                <i class="fas fa-sync-alt"></i>
            </button>
        </div>
    </div>
    <div class="card-body">
        <div class="row mb-3">
            <div class="col-md-3 mb-2">
                <select class="form-select form-select-sm rounded" id="filterKabupaten">
                    <option value="">Semua Kabupaten/Kota</option>
                    <option value="Kota Ternate">Kota Ternate</option>
                    <option value="Kota Tidore">Kota Tidore</option>
                    <option value="Halmahera Barat">Halmahera Barat</option>
                    <option value="Halmahera Utara">Halmahera Utara</option>
                    <option value="Halmahera Selatan">Halmahera Selatan</option>
                    <option value="Halmahera Timur">Halmahera Timur</option>
                    <option value="Halmahera Tengah">Halmahera Tengah</option>
                    <option value="Pulau Morotai">Pulau Morotai</option>
                    <option value="Pulau Taliabu">Pulau Taliabu</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-select form-select-sm rounded" id="filterSektor">
                    <option value="">Semua Sektor</option>
                    <option value="Pemerintahan">Pemerintahan</option>
                    <option value="Kesehatan">Kesehatan</option>
                    <option value="Pendidikan">Pendidikan</option>
                    <option value="Infrastruktur">Infrastruktur</option>
                    <option value="Sosial">Sosial</option>
                    <option value="Lainnya">Lainnya</option>
                </select>
            </div>
            <div class="col-md-3 mb-2">
                <select class="form-select form-select-sm rounded" id="filterStatus">
                    <option value="">Semua Status</option>
                    <option value="Aktif">Aktif</option>
                    <option value="Non-Aktif">Non-Aktif</option>
                </select>
            </div>
            <div class="col-md-3 text-end mb-2">
                <div class="btn-group">
                    <button class="btn btn-sm btn-outline-primary rounded" title="Export Data" id="exportBtn">
                        <i class="fas fa-download"></i>
                    </button>
                    <button class="btn btn-sm btn-outline-primary rounded" title="Print" id="printBtn">
                        <i class="fas fa-print"></i>
                    </button>
                </div>
            </div>
        </div>

        <div class="table-responsive">
            <table class="table table-hover table-striped" id="opdTable">
                <thead class="table-light">
                    <tr>
                        <th width="50">No</th>
                        <th>Nama OPD</th>
                        <th>Kabupaten/Kota</th>
                        <th>Kategori Sektor</th>
                        <th>Alamat</th>
                        <th>No. Telepon/HP</th>
                        <th width="100">Status</th>
                        <th width="120" class="text-center">Aksi</th>
                    </tr>
                </thead>
                <tbody>
                    @if(isset($opds) && $opds->count() > 0)
                        @foreach($opds as $opd)
                        <tr>
                            <td>{{ ($opds->currentPage() - 1) * $opds->perPage() + $loop->iteration }}</td>
                            <td>{{ $opd->nama_opd }}</td>
                            <td>{{ $opd->kabupaten_kota }}</td>
                            <td>{{ $opd->kategori_sektor }}</td>
                            <td>{{ Str::limit($opd->alamat, 50) }}</td>
                            <td>{{ $opd->no_telepon }}</td>
                            <td>
                                <span class="badge rounded-pill {{ $opd->status == 'Aktif' ? 'bg-success' : 'bg-danger' }}">
                                    {{ $opd->status }}
                                </span>
                            </td>
                            <td class="text-center">
                                <button class="btn btn-sm btn-warning rounded edit-btn" title="Edit" data-id="{{ $opd->id }}">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-sm btn-danger rounded delete-btn" title="Hapus" data-id="{{ $opd->id }}" data-nama="{{ $opd->nama_opd }}">
                                    <i class="fas fa-trash"></i>
                                </button>
                            </td>
                        </tr>
                        @endforeach
                    @else
                        <tr>
                            <td colspan="8" class="text-center">Tidak ada data OPD</td>
                        </tr>
                    @endif
                </tbody>
            </table>
        </div>

        @if(isset($opds) && $opds->count() > 0)
        <div class="d-flex justify-content-between align-items-center mt-3">
            <div class="text-muted">
                Menampilkan <span id="currentCount">{{ $opds->count() }}</span> dari <span id="totalCount">{{ $opds->total() }}</span> entri
            </div>
            <nav>
                <ul class="pagination mb-0">
                    @if ($opds->onFirstPage())
                        <li class="page-item disabled">
                            <span class="page-link rounded">Sebelumnya</span>
                        </li>
                    @else
                        <li class="page-item">
                            <a class="page-link rounded" href="{{ $opds->previousPageUrl() }}">Sebelumnya</a>
                        </li>
                    @endif

                    @foreach ($opds->getUrlRange(1, $opds->lastPage()) as $page => $url)
                        <li class="page-item {{ $opds->currentPage() == $page ? 'active' : '' }}">
                            <a class="page-link rounded" href="{{ $url }}">{{ $page }}</a>
                        </li>
                    @endforeach

                    @if ($opds->hasMorePages())
                        <li class="page-item">
                            <a class="page-link rounded" href="{{ $opds->nextPageUrl() }}">Selanjutnya</a>
                        </li>
                    @else
                        <li class="page-item disabled">
                            <span class="page-link rounded">Selanjutnya</span>
                        </li>
                    @endif
                </ul>
            </nav>
        </div>
        @endif
    </div>
</div>

<!-- Modal Edit OPD -->
<div class="modal fade" id="editOpdModal" tabindex="-1" aria-labelledby="editOpdModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editOpdModalLabel"><i class="fas fa-edit me-2"></i>Edit Data OPD</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body" id="modalBody">
                <!-- Form akan diisi melalui JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary rounded-pill px-4" data-bs-dismiss="modal">Batal</button>
                <button type="button" class="btn btn-primary rounded-pill px-4" id="updateOpdBtn">Perbarui Data</button>
            </div>
        </div>
    </div>
</div>

<!-- Pastikan Bootstrap JS dimuat -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

<!-- SCRIPT SWEETALERT DAN FUNGSI EDIT/DELETE -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    // Inisialisasi modal
    let editModal = null;

    // Fungsi untuk filter dan pencarian
    function filterTable() {
        const searchText = document.getElementById('searchInput').value.toLowerCase();
        const kabupatenFilter = document.getElementById('filterKabupaten').value;
        const sektorFilter = document.getElementById('filterSektor').value;
        const statusFilter = document.getElementById('filterStatus').value;

        const rows = document.querySelectorAll('#opdTable tbody tr');
        let visibleCount = 0;

        rows.forEach(row => {
            if (row.cells.length < 7) return; // Skip jika bukan baris data

            const namaOpd = row.cells[1].textContent.toLowerCase();
            const kabupaten = row.cells[2].textContent;
            const sektor = row.cells[3].textContent;
            const alamat = row.cells[4].textContent.toLowerCase();
            const telepon = row.cells[5].textContent;
            const status = row.cells[6].querySelector('.badge').textContent;

            const matchesSearch = searchText === '' ||
                namaOpd.includes(searchText) ||
                kabupaten.toLowerCase().includes(searchText) ||
                sektor.toLowerCase().includes(searchText) ||
                alamat.includes(searchText) ||
                telepon.includes(searchText);

            const matchesKabupaten = kabupatenFilter === '' || kabupaten === kabupatenFilter;
            const matchesSektor = sektorFilter === '' || sektor === sektorFilter;
            const matchesStatus = statusFilter === '' || status === statusFilter;

            if (matchesSearch && matchesKabupaten && matchesSektor && matchesStatus) {
                row.style.display = '';
                visibleCount++;
            } else {
                row.style.display = 'none';
            }
        });

        // Update counter
        document.getElementById('currentCount').textContent = visibleCount;

        // Tampilkan pesan jika tidak ada data
        const noDataRow = document.querySelector('#opdTable tbody tr td[colspan="8"]');
        if (visibleCount === 0 && !noDataRow) {
            const tbody = document.querySelector('#opdTable tbody');
            tbody.innerHTML = '<tr><td colspan="8" class="text-center">Tidak ada data yang sesuai dengan filter</td></tr>';
        } else if (visibleCount > 0 && noDataRow) {
            // Reload halaman jika ada data yang sesuai filter
            location.reload();
        }
    }

    // Event listeners untuk filter dan pencarian
    document.getElementById('searchInput').addEventListener('input', filterTable);
    document.getElementById('filterKabupaten').addEventListener('change', filterTable);
    document.getElementById('filterSektor').addEventListener('change', filterTable);
    document.getElementById('filterStatus').addEventListener('change', filterTable);

    // Tombol refresh
    document.getElementById('refreshBtn').addEventListener('click', function() {
        document.getElementById('searchInput').value = '';
        document.getElementById('filterKabupaten').value = '';
        document.getElementById('filterSektor').value = '';
        document.getElementById('filterStatus').value = '';
        filterTable();
        location.reload(); // Reload untuk mendapatkan data terbaru dari server
    });

    // Tombol export (placeholder)
    document.getElementById('exportBtn').addEventListener('click', function() {
        Swal.fire({
            icon: 'info',
            title: 'Fitur Export',
            text: 'Fitur export data akan segera tersedia'
        });
    });

    // Tombol print (placeholder)
    document.getElementById('printBtn').addEventListener('click', function() {
        Swal.fire({
            icon: 'info',
            title: 'Fitur Print',
            text: 'Fitur print akan segera tersedia'
        });
    });

    // Fungsi untuk menangani klik tombol delete
    document.addEventListener('click', function(e) {
        if (e.target && e.target.closest('.delete-btn')) {
            const button = e.target.closest('.delete-btn');
            const opdId = button.getAttribute('data-id');
            const opdName = button.getAttribute('data-nama');

            // Tampilkan konfirmasi SweetAlert
            Swal.fire({
                title: 'Apakah Anda yakin?',
                html: `Data OPD <strong>"${opdName}"</strong> akan dihapus secara permanen!`,
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#d33',
                cancelButtonColor: '#6c757d',
                confirmButtonText: 'Ya, Hapus!',
                cancelButtonText: 'Batal',
                reverseButtons: true
            }).then((result) => {
                if (result.isConfirmed) {
                    // Buat form untuk mengirim permintaan DELETE
                    const form = document.createElement('form');
                    form.method = 'POST';
                    form.action = `/opd/${opdId}`;

                    // Tambahkan CSRF token
                    const csrfToken = document.createElement('input');
                    csrfToken.type = 'hidden';
                    csrfToken.name = '_token';
                    csrfToken.value = '{{ csrf_token() }}';
                    form.appendChild(csrfToken);

                    // Tambahkan method spoofing untuk DELETE
                    const methodInput = document.createElement('input');
                    methodInput.type = 'hidden';
                    methodInput.name = '_method';
                    methodInput.value = 'DELETE';
                    form.appendChild(methodInput);

                    // Sembunyikan form dan tambahkan ke body
                    form.style.display = 'none';
                    document.body.appendChild(form);

                    // Kirim form
                    form.submit();
                }
            });
        }
    });

    // Fungsi untuk menangani klik tombol edit
    document.addEventListener('click', function(e) {
        if (e.target && e.target.closest('.edit-btn')) {
            const button = e.target.closest('.edit-btn');
            const opdId = button.getAttribute('data-id');

            // Inisialisasi modal jika belum ada
            if (!editModal) {
                editModal = new bootstrap.Modal(document.getElementById('editOpdModal'));
            }

            // Tampilkan modal dengan loading
            document.getElementById('modalBody').innerHTML = `
                <div class="text-center py-4">
                    <div class="spinner-border text-primary" role="status">
                        <span class="visually-hidden">Loading...</span>
                    </div>
                    <p class="mt-2">Memuat data OPD...</p>
                </div>
            `;

            editModal.show();

            // Gunakan route yang benar - sesuaikan dengan route Laravel Anda
            const editUrl = `/opd/${opdId}/edit`;

            console.log('Fetching data from:', editUrl); // Debug log

            // Ambil data OPD via AJAX
            fetch(editUrl, {
                headers: {
                    'X-Requested-With': 'XMLHttpRequest',
                    'Accept': 'application/json'
                }
            })
            .then(response => {
                console.log('Response status:', response.status); // Debug log
                if (!response.ok) {
                    throw new Error(`HTTP error! status: ${response.status}`);
                }
                // Cek content type
                const contentType = response.headers.get('content-type');
                if (contentType && contentType.includes('application/json')) {
                    return response.json();
                } else {
                    // Jika bukan JSON, coba parsing sebagai text untuk debugging
                    return response.text().then(text => {
                        console.log('Non-JSON response:', text); // Debug log
                        throw new Error('Response is not JSON');
                    });
                }
            })
            .then(data => {
                console.log('Data received:', data); // Debug log

                if (data.success && data.opd) {
                    // Format nomor telepon (hilangkan +62 jika ada)
                    let phone = data.opd.no_telepon || '';
                    if (phone.startsWith('+62')) {
                        phone = phone.substring(3);
                    } else if (phone.startsWith('62')) {
                        phone = phone.substring(2);
                    }

                    // Isi form dengan data yang diterima
                    document.getElementById('modalBody').innerHTML = `
                        <form id="editOpdForm">
                            <input type="hidden" name="_token" value="{{ csrf_token() }}">
                            <input type="hidden" name="_method" value="PUT">
                            <input type="hidden" name="id" id="edit_id" value="${data.opd.id}">
                            <div class="row">
                                <div class="col-md-6 mb-3">
                                    <label for="edit_nama_opd" class="form-label">Nama OPD <span class="text-danger">*</span></label>
                                    <input type="text" class="form-control rounded" id="edit_nama_opd" name="nama_opd" value="${data.opd.nama_opd || ''}" required autocomplete="off">
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_kabupaten_kota" class="form-label">Kabupaten/Kota <span class="text-danger">*</span></label>
                                    <select class="form-select rounded" id="edit_kabupaten_kota" name="kabupaten_kota" required>
                                        <option value="">Pilih Kabupaten/Kota</option>
                                        <option value="Kota Ternate" ${data.opd.kabupaten_kota === 'Kota Ternate' ? 'selected' : ''}>Kota Ternate</option>
                                        <option value="Kota Tidore" ${data.opd.kabupaten_kota === 'Kota Tidore' ? 'selected' : ''}>Kota Tidore</option>
                                        <option value="Halmahera Barat" ${data.opd.kabupaten_kota === 'Halmahera Barat' ? 'selected' : ''}>Halmahera Barat</option>
                                        <option value="Halmahera Utara" ${data.opd.kabupaten_kota === 'Halmahera Utara' ? 'selected' : ''}>Halmahera Utara</option>
                                        <option value="Halmahera Selatan" ${data.opd.kabupaten_kota === 'Halmahera Selatan' ? 'selected' : ''}>Halmahera Selatan</option>
                                        <option value="Halmahera Timur" ${data.opd.kabupaten_kota === 'Halmahera Timur' ? 'selected' : ''}>Halmahera Timur</option>
                                        <option value="Halmahera Tengah" ${data.opd.kabupaten_kota === 'Halmahera Tengah' ? 'selected' : ''}>Halmahera Tengah</option>
                                        <option value="Pulau Morotai" ${data.opd.kabupaten_kota === 'Pulau Morotai' ? 'selected' : ''}>Pulau Morotai</option>
                                        <option value="Pulau Taliabu" ${data.opd.kabupaten_kota === 'Pulau Taliabu' ? 'selected' : ''}>Pulau Taliabu</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_kategori_sektor" class="form-label">Kategori Sektor <span class="text-danger">*</span></label>
                                    <select class="form-select rounded" id="edit_kategori_sektor" name="kategori_sektor" required>
                                        <option value="">Pilih Kategori Sektor</option>
                                        <option value="Pemerintahan" ${data.opd.kategori_sektor === 'Pemerintahan' ? 'selected' : ''}>Pemerintahan</option>
                                        <option value="Kesehatan" ${data.opd.kategori_sektor === 'Kesehatan' ? 'selected' : ''}>Kesehatan</option>
                                        <option value="Pendidikan" ${data.opd.kategori_sektor === 'Pendidikan' ? 'selected' : ''}>Pendidikan</option>
                                        <option value="Infrastruktur" ${data.opd.kategori_sektor === 'Infrastruktur' ? 'selected' : ''}>Infrastruktur</option>
                                        <option value="Sosial" ${data.opd.kategori_sektor === 'Sosial' ? 'selected' : ''}>Sosial</option>
                                        <option value="Lainnya" ${data.opd.kategori_sektor === 'Lainnya' ? 'selected' : ''}>Lainnya</option>
                                    </select>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_no_telepon" class="form-label">No. Telepon/HP <span class="text-danger">*</span></label>
                                    <div class="input-group">
                                        <span class="input-group-text rounded-start">+62</span>
                                        <input type="text" class="form-control rounded-end" id="edit_no_telepon" name="no_telepon" value="${phone}" required autocomplete="off">
                                    </div>
                                    <div class="form-text">Contoh: 81234567890</div>
                                </div>
                                <div class="col-12 mb-3">
                                    <label for="edit_alamat" class="form-label">Alamat Lengkap <span class="text-danger">*</span></label>
                                    <textarea class="form-control rounded" id="edit_alamat" name="alamat" rows="3" required>${data.opd.alamat || ''}</textarea>
                                </div>
                                <div class="col-md-6 mb-3">
                                    <label for="edit_status" class="form-label">Status <span class="text-danger">*</span></label>
                                    <select class="form-select rounded" id="edit_status" name="status" required>
                                        <option value="Aktif" ${data.opd.status === 'Aktif' ? 'selected' : ''}>Aktif</option>
                                        <option value="Non-Aktif" ${data.opd.status === 'Non-Aktif' ? 'selected' : ''}>Non-Aktif</option>
                                    </select>
                                </div>
                            </div>
                        </form>
                    `;
                } else {
                    throw new Error(data.message || 'Data tidak ditemukan');
                }
            })
            .catch(error => {
                console.error('Error:', error);
                document.getElementById('modalBody').innerHTML = `
                    <div class="alert alert-danger">
                        <h5 class="alert-heading">Terjadi Kesalahan</h5>
                        <p class="mb-0">${error.message || 'Gagal memuat data OPD. Silakan coba lagi.'}</p>
                    </div>
                `;
            });
        }
    });

    // Fungsi untuk menangani submit form edit
    document.getElementById('updateOpdBtn').addEventListener('click', function() {
        const form = document.getElementById('editOpdForm');
        if (!form) return;

        // Validasi form
        if (!form.checkValidity()) {
            form.reportValidity();
            return;
        }

        const formData = new FormData(form);
        const opdId = document.getElementById('edit_id').value;

        // Format nomor telepon dengan +62
        const phoneInput = document.getElementById('edit_no_telepon');
        let phoneValue = phoneInput.value.trim();
        if (phoneValue && !phoneValue.startsWith('+62')) {
            phoneValue = '+62' + phoneValue;
            formData.set('no_telepon', phoneValue);
        }

        // Tampilkan loading
        const updateBtn = document.getElementById('updateOpdBtn');
        const originalText = updateBtn.innerHTML;
        updateBtn.disabled = true;
        updateBtn.innerHTML = '<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Memproses...';

        // Kirim data via AJAX
        fetch(`/opd/${opdId}`, {
            method: 'POST',
            headers: {
                'X-CSRF-TOKEN': formData.get('_token'),
                'X-Requested-With': 'XMLHttpRequest',
                'Accept': 'application/json'
            },
            body: formData
        })
        .then(response => {
            if (!response.ok) {
                throw new Error(`HTTP error! status: ${response.status}`);
            }
            return response.json();
        })
        .then(data => {
            if (data.success) {
                // Tutup modal dan refresh halaman
                editModal.hide();
                Swal.fire({
                    icon: 'success',
                    title: 'Berhasil',
                    text: data.message || 'Data OPD berhasil diperbarui',
                    timer: 2000,
                    showConfirmButton: false
                }).then(() => {
                    location.reload();
                });
            } else {
                throw new Error(data.message || 'Gagal memperbarui data OPD');
            }
        })
        .catch(error => {
            console.error('Error:', error);
            Swal.fire({
                icon: 'error',
                title: 'Gagal',
                text: error.message || 'Terjadi kesalahan saat memperbarui data OPD'
            });
        })
        .finally(() => {
            // Kembalikan tombol ke keadaan semula
            updateBtn.disabled = false;
            updateBtn.innerHTML = originalText;
        });
    });
});
</script>
