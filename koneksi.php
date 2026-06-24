<?php
$host = "localhost";
$user = "root";
$pass = ""; // Di Laragon, password default adalah kosong
$db   = "dkp_pekalongan";

$koneksi = mysqli_connect($host, $user, $pass, $db);

if (!$koneksi) {
    die("Koneksi ke database Laragon gagal: " . mysqli_connect_error());
}
?>