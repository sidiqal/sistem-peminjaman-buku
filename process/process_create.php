<?php
include("config.php");
include("process_upload_image.php");

if (isset($_POST["submit"])) {
    // Tangkap Data
    $nama_pinjam = $_POST["nama_pinjam"];
    $judul_buku = $_POST["judul_buku"];
    $foto_buku = upload();
    $tanggal_pinjam = $_POST["tanggal_pinjam"];
    $tanggal_kembali = $_POST["tanggal_kembali"];

    // Data Input
    $sql = "INSERT INTO perpus(nama_pinjam, judul_buku, foto_buku, tanggal_pinjam, tanggal_kembali) VALUES ('$nama_pinjam', '$judul_buku', '$foto_buku', '$tanggal_pinjam', '$tanggal_kembali')";

    // Proses Input
    $query = mysqli_query($conn, $sql);

    // Validasi query
    if ($query) {
        header("Location: ../admin/dashboard_admin.php");
        exit;
    } else {
        die("Failed to Create!");
    }
}

?>