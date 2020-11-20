<?php
session_start();
// Validasi session
if ($_SESSION["level"] !== "admin" and $_SESSION["level"] !== "pegawai") {
    header("Location: ../index.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Tambah Data Perpustakaan</title>
</head>

<body>
    <h1>Halaman Tambah Data Perpustakaan</h1>
    <a href="../admin/dashboard_admin.php">Kembali</a><br><br>
    <!-- Inputan data -->
    <form action="../process/process_create.php" method="POST" enctype="multipart/form-data">
        <label for="nama_pinjam">Nama Peminjam :</label>
        <input type="text" name="nama_pinjam" id="nama_pinjam"><br>
        <label for="judul_buku">Judul Buku :</label>
        <input type="text" name="judul_buku" id="judul_buku"><br>
        <label for="foto_buku">Foto Buku :</label>
        <input type="file" name="foto_buku" id="foto_buku"><br>
        <label for="tanggal_pinjam">Tanggal Pinjam :</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam"><br>
        <label for="tanggal_kembali">Tanggal Kembali :</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali"><br>
        <button type="submit" name="submit">Tambah</button>
    </form>
</body>

</html>