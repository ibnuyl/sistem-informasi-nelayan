<?php
// Hubungkan ke file koneksi database Anda
include 'koneksi.php';

// Fitur Pencarian
$search = "";
if (isset($_GET['search'])) {
    $search = mysqli_real_escape_string($koneksi, $_GET['search']);
    $query = "SELECT * FROM nelayan WHERE nama LIKE '%$search%' OR nik LIKE '%$search%' OR nama_kapal LIKE '%$search%' ORDER BY id DESC";
} else {
    $query = "SELECT * FROM nelayan ORDER BY id DESC";
}
$result = mysqli_query($koneksi, $query);

// Hitung Data untuk Dasbor Ringkas
$total_nelayan = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM nelayan"));
$total_kapal = mysqli_num_rows(mysqli_query($koneksi, "SELECT id FROM nelayan WHERE nama_kapal IS NOT NULL AND nama_kapal != ''"));
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sistem Pencatatan Nelayan | DKP Pekalongan</title>
    <!-- Bootstrap 5 CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome untuk Ikon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css" rel="stylesheet">
    <style>
        body { background-color: #f8f9fa; font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif; }
        .navbar-custom { background: linear-gradient(135deg, #1e3c72 0%, #2a5298 100%); }
        .card-dashboard { border: none; border-radius: 12px; transition: transform 0.2s; }
        .card-dashboard:hover { transform: translateY(-5px); }
        .table-container { background: #ffffff; border-radius: 12px; padding: 20px; box-shadow: 0 4px 6px rgba(0,0,0,0.05); }
    </style>
</head>
<body>

    <!-- NAVBAR -->
    <nav class="navbar navbar-expand-lg navbar-dark navbar-custom shadow-sm mb-4">
        <div class="container">
            <a class="navbar-brand fw-bold" href="index.php">
                <i class="fa-solid :fa-anchor me-2"></i>SISTEM INFORMASI NELAYAN
            </a>
        </div>
    </nav>

    <div class="container">
        
        <!-- JUDUL HALAMAN -->
        <div class="d-flex justify-content-between align-items-center mb-4">
            <div>
                <h2 class="fw-bold text-dark mb-0">Sistem Informasi Nelayan</h2>
                <p class="text-muted">Kelola data pencatatan nelayan dengan mudah dan cepat</p>
            </div>
            <a href="tambah.php" class="btn btn-primary btn-lg shadow-sm" style="border-radius: 8px;">
                <i class="fa-solid fa-plus me-2"></i>Tambah Data Nelayan
            </a>
        </div>

        <!-- SECTION 1: DASBOR RINGKAS -->
        <div class="row mb-4">
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card card-dashboard bg-white shadow-sm p-3 border-start border-primary border-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Total Nelayan Terdaftar</span>
                            <h3 class="fw-bold text-dark mt-1 mb-0"><?php echo $total_nelayan; ?></h3>
                        </div>
                        <div class="bg-primary bg-opacity-10 p-3 rounded-circle text-primary">
                            <i class="fa-solid fa-users fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 mb-3">
                <div class="card card-dashboard bg-white shadow-sm p-3 border-start border-success border-4">
                    <div class="d-flex align-items-center justify-content-between">
                        <div>
                            <span class="text-muted text-uppercase small fw-bold">Total Kapal Tercatat</span>
                            <h3 class="fw-bold text-dark mt-1 mb-0"><?php echo $total_kapal; ?></h3>
                        </div>
                        <div class="bg-success bg-opacity-10 p-3 rounded-circle text-success">
                            <i class="fa-solid fa-ship fa-2x"></i>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- SECTION 2: FITUR PENCARIAN & TABEL DATA -->
        <div class="table-container mb-5">
            <div class="row mb-3 align-items-center">
                <div class="col-md-6 mb-2 mb-md-0">
                    <h5 class="fw-bold text-secondary mb-0">Daftar Data Nelayan</h5>
                </div>
                <!-- Form Pencarian -->
                <div class="col-md-6">
                    <form action="index.php" method="GET" class="d-flex">
                        <div class="input-group">
                            <span class="input-group-text bg-white border-end-0 text-muted">
                                <i class="fa-solid fa-magnifying-glass"></i>
                            </span>
                            <input type="text" name="search" class="form-control border-start-0" placeholder="Cari berdasarkan nama, NIK, atau kapal..." value="<?php echo htmlspecialchars($search); ?>">
                            <button type="submit" class="btn btn-secondary">Cari</button>
                            <?php if($search != ""): ?>
                                <a href="index.php" class="btn btn-outline-danger">Reset</a>
                            <?php endif; ?>
                        </div>
                    </form>
                </div>
            </div>

            <!-- TABEL DATA -->
            <div class="table-responsive">
                <table class="table table-hover align-middle">
                    <thead class="table-light text-secondary">
                        <tr>
                            <th width="5%">No</th>
                            <th>NIK</th>
                            <th>Nama Lengkap</th>
                            <th>Alamat Rumah</th>
                            <th>Nama Kapal</th>
                            <th>Alat Tangkap</th>
                            <th width="15%" class="text-center">Aksi</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php 
                        if (mysqli_num_rows($result) > 0) {
                            $no = 1;
                            while ($row = mysqli_fetch_assoc($result)) {
                        ?>
                        <tr>
                            <td><strong><?php echo $no++; ?></strong></td>
                            <td><span class="badge bg-light text-dark font-monospace"><?php echo $row['nik']; ?></span></td>
                            <td class="fw-bold text-dark"><?php echo $row['nama']; ?></td>
                            <td><?php echo $row['alamat']; ?></td>
                            <td><i class="fa-solid fa-ship text-muted me-1 small"></i> <?php echo !empty($row['nama_kapal']) ? $row['nama_kapal'] : '-'; ?></td>
                            <td><span class="badge bg-info bg-opacity-10 text-info px-2 py-1"><?php echo !empty($row['alat_tangkap']) ? $row['alat_tangkap'] : '-'; ?></span></td>
                            <td class="text-center">
                                <div class="btn-group btn-group-sm">
                                    <a href="edit.php?id=<?php echo $row['id']; ?>" class="btn btn-warning text-white" title="Edit Data">
                                        <i class="fa-solid fa-pen-to-square"></i>
                                    </h3>
                                    <a href="hapus.php?id=<?php echo $row['id']; ?>" class="btn btn-danger" onclick="return confirm('Apakah Anda yakin ingin menghapus data ini?')" title="Hapus Data">
                                        <i class="fa-solid fa-trash"></i>
                                    </a>
                                </div>
                            </td>
                        </tr>
                        <?php 
                            }
                        } else {
                            echo "<tr><td colspan='7' class='text-center py-4 text-muted'><i class='fa-solid fa-folder-open fa-2x mb-2 d-block'></i>Data tidak ditemukan atau masih kosong.</td></tr>";
                        }
                        ?>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Bootstrap 5 JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>