<?php
include 'koneksi.php';

if (isset($_POST['submit'])) {
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nama_kapal = mysqli_real_escape_string($koneksi, $_POST['nama_kapal']);
    $alat_tangkap = mysqli_real_escape_string($koneksi, $_POST['alat_tangkap']);

    $query = "INSERT INTO nelayan (nik, nama, alamat, nama_kapal, alat_tangkap) 
              VALUES ('$nik', '$nama', '$alamat', '$nama_kapal', '$alat_tangkap')";
    
    if (mysqli_query($koneksi, $query)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal menambah data! Periksa apakah NIK sudah terdaftar.');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Tambah Data Nelayan - DKP Pekalongan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 40px; background-color: #f4f6f9; }
        .form-container { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; border-bottom: 2px solid #28a745; padding-bottom: 10px; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, textarea { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        input:focus, textarea:focus { border-color: #28a745; outline: none; }
        .btn-simpan { background-color: #28a745; color: white; border: none; padding: 12px; width: 100%; cursor: pointer; border-radius: 4px; font-size: 16px; font-weight: bold; }
        .btn-simpan:hover { background-color: #218838; }
        .back-link { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #0056b3; font-weight: bold; }
    </style>
</head>
<body>

<div class="form-container">
    <a href="index.php" class="back-link">➔ Kembali ke Dashboard</a>
    <h2>Tambah Nelayan Baru</h2>
    <form action="" method="POST">
        <div class="input-group">
            <label>NIK (Nomor Induk Kependudukan)</label>
            <input type="text" name="nik" required maxlength="16" placeholder="Masukkan 16 digit NIK">
        </div>
        <div class="input-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" required placeholder="Nama lengkap nelayan">
        </div>
        <div class="input-group">
            <label>Alamat Rumah (Kecamatan/Desa)</label>
            <textarea name="alamat" rows="3" required placeholder="Contoh: Jl. Raya Wonokerto No. 12, Kec. Wonokerto"></textarea>
        </div>
        <div class="input-group">
            <label>Nama Kapal / Perahu</label>
            <input type="text" name="nama_kapal" placeholder="Contoh: KM Berkah Laut (Isi jika ada)">
        </div>
        <div class="input-group">
            <label>Alat Tangkap Utama</label>
            <input type="text" name="alat_tangkap" placeholder="Contoh: Jaring Rampus / Gillnet / Cantrang">
        </div>
        <button type="submit" name="submit" class="btn-simpan">Simpan Data Nelayan</button>
    </form>
</div>

</body>
</html>