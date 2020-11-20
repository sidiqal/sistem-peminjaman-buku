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
    <title>Halaman Edit Data Perpustakaan</title>
</head>

<body>
    <h1>Halaman Edit Data Perpustakaan</h1>
    <a href="../admin/dashboard_admin.php">Kembali</a><br><br>
    <?php
    include("../process/config.php");

    // Tangkap ID
    $id = $_GET["id"];

    // Data query
    $sql = "SELECT * FROM perpus WHERE id=$id";

    // Process query
    $query = mysqli_query($conn, $sql);

    // Tangkap data query
    $data = mysqli_fetch_array($query);

    ?>
    <!-- Inputan data -->
    <form action="../process/process_edit.php" method="POST" enctype="multipart/form-data">
        <input type="hidden" name="id" value="<?php echo $id; ?>">
        <input type="hidden" name="foto_lama" value="<?php echo $data["foto_buku"]; ?>">
        <label for="nama_pinjam">Nama Peminjam :</label>
        <input type="text" name="nama_pinjam" id="nama_pinjam" value="<?php echo $data["nama_pinjam"]; ?>"><br>
        <label for="judul_buku">Judul Buku :</label>
        <input type="text" name="judul_buku" id="judul_buku" value="<?php echo $data["judul_buku"]; ?>"><br>
        <label for="foto_buku">Foto Buku :</label>
        <img src="../assets/img/<?php echo $data["foto_buku"]; ?>" width="100px">
        <input type="file" name="foto_buku" id="foto_buku"><br>
        <label for="tanggal_pinjam">Tanggal Pinjam :</label>
        <input type="date" name="tanggal_pinjam" id="tanggal_pinjam" value="<?php echo $data["tanggal_pinjam"]; ?>"><br>
        <label for="tanggal_kembali">Tanggal Kembali :</label>
        <input type="date" name="tanggal_kembali" id="tanggal_kembali" value="<?php echo $data["tanggal_kembali"]; ?>"><br>
        <button type="submit" name="submit">Edit</button>
    </form>
</body>

</html>