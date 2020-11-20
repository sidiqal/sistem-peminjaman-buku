<?php
include("config.php");
include("process_upload_image.php");

if (isset($_POST["submit"])) {
    // Tangkap data
    $id = $_POST["id"];
    $nama_pinjam = $_POST["nama_pinjam"];
    $judul_buku = $_POST["judul_buku"];
    $tanggal_pinjam = $_POST["tanggal_pinjam"];
    $tanggal_kembali = $_POST["tanggal_kembali"];
    $foto_lama = $_POST["foto_lama"];

    // Validasi Foto
    if ($_FILES["foto_buku"]["error"] === 4) {
        $foto_buku = $foto_lama;
    } else {
        $foto_buku = upload();
    }

    // Data query
    $sql = "UPDATE perpus SET nama_pinjam='$nama_pinjam',judul_buku='$judul_buku',foto_buku='$foto_buku',tanggal_pinjam='$tanggal_pinjam',tanggal_kembali='$tanggal_kembali' WHERE id=$id";

    // Process query
    $query = mysqli_query($conn, $sql);

    // Validasi query
    if ($query) {
        header("Location: ../admin/dashboard_admin.php");
        exit;
    } else {
        die("Failed to Update");
    }
}

?>