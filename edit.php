<?php
include 'koneksi.php';

if (!isset($_GET['id'])) {
    header("Location: index.php");
    exit;
}

$id = mysqli_real_escape_string($koneksi, $_GET['id']);
$query = "SELECT * FROM nelayan WHERE id = '$id'";
$result = mysqli_query($koneksi, $query);
$data = mysqli_fetch_assoc($result);

if (!$data) {
    echo "Data tidak ditemukan!";
    exit;
}

if (isset($_POST['update'])) {
    $nik = mysqli_real_escape_string($koneksi, $_POST['nik']);
    $nama = mysqli_real_escape_string($koneksi, $_POST['nama']);
    $alamat = mysqli_real_escape_string($koneksi, $_POST['alamat']);
    $nama_kapal = mysqli_real_escape_string($koneksi, $_POST['nama_kapal']);
    $alat_tangkap = mysqli_real_escape_string($koneksi, $_POST['alat_tangkap']);

    $query_update = "UPDATE nelayan SET 
                     nik='$nik', nama='$nama', alamat='$alamat', 
                     nama_kapal='$nama_kapal', alat_tangkap='$alat_tangkap' 
                     WHERE id='$id'";
    
    if (mysqli_query($koneksi, $query_update)) {
        header("Location: index.php");
        exit;
    } else {
        echo "<script>alert('Gagal memperbarui data!');</script>";
    }
}
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <title>Edit Data Nelayan - DKP Pekalongan</title>
    <style>
        body { font-family: Arial, sans-serif; margin: 0; padding: 40px; background-color: #f4f6f9; }
        .form-container { max-width: 500px; margin: auto; background: white; padding: 30px; border-radius: 8px; box-shadow: 0 4px 6px rgba(0,0,0,0.1); }
        h2 { margin-top: 0; color: #333; border-bottom: 2px solid #ffc107; padding-bottom: 10px; }
        .input-group { margin-bottom: 15px; }
        label { display: block; margin-bottom: 5px; font-weight: bold; color: #555; }
        input, textarea { width: 100%; padding: 10px; box-sizing: border-box; border: 1px solid #ccc; border-radius: 4px; font-size: 14px; }
        input:focus, textarea:focus { border-color: #ffc107; outline: none; }
        .btn-update { background-color: #ffc107; color: black; border: none; padding: 12px; width: 100%; cursor: pointer; border-radius: 4px; font-size: 16px; font-weight: bold; }
        .btn-update:hover { background-color: #e0a800; }
        .back-link { display: inline-block; margin-bottom: 20px; text-decoration: none; color: #dc3545; font-weight: bold; }
    </style>
</head>
<body>

<div class="form-container">
    <a href="index.php" class="back-link">➔ Batal / Kembali</a>
    <h2>Edit Data Nelayan</h2>
    <form action="" method="POST">
        <div class="input-group">
            <label>NIK</label>
            <input type="text" name="nik" value="<?= htmlspecialchars($data['nik']); ?>" required maxlength="16">
        </div>
        <div class="input-group">
            <label>Nama Lengkap</label>
            <input type="text" name="nama" value="<?= htmlspecialchars($data['nama']); ?>" required>
        </div>
        <div class="input-group">
            <label>Alamat</label>
            <textarea name="alamat" rows="3" required><?= htmlspecialchars($data['alamat']); ?></textarea>
        </div>
        <div class="input-group">
            <label>Nama Kapal</label>
            <input type="text" name="nama_kapal" value="<?= htmlspecialchars($data['nama_kapal']); ?>">
        </div>
        <div class="input-group">
            <label>Alat Tangkap Utama</label>
            <input type="text" name="alat_tangkap" value="<?= htmlspecialchars($data['alat_tangkap']); ?>">
        </div>
        <button type="submit" name="update" class="btn-update">Update Data Nelayan</button>
    </form>
</div>

</body>
</html>