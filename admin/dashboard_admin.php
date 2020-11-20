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
    <title>Dashboard Admin Perpustakaan</title>
</head>

<body>
    <h1>Dashboard Admin Perpustakaan</h1>
    <a href="../action/create.php">Tambah Data</a><br><br>
    <a href="../logout.php">Logout</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Judul</td>
            <td>Foto</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Kembali</td>
            <td>Aksi</td>
        </tr>
        <?php
        include("../process/config.php");

        // Data query
        $sql = "SELECT * FROM perpus";

        // Proses Query
        $query = mysqli_query($conn, $sql);

        // No
        $no = 1;

        // Output Query
        while ($data = mysqli_fetch_array($query)) {
        ?>
            <tr>
                <td><?php echo $no; ?></td>
                <td><?php echo $data["nama_pinjam"]; ?></td>
                <td><?php echo $data["judul_buku"]; ?></td>
                <td><img src="../assets/img/<?php echo $data["foto_buku"]; ?>" width="100px"></td>
                <td>
                    <?php
                    $tanggal_pinjam = date_create($data["tanggal_pinjam"]);
                    echo date_format($tanggal_pinjam, "d-m-Y");
                    ?>
                </td>
                <td>
                    <?php
                    $tanggal_kembali = date_create($data["tanggal_kembali"]);
                    echo date_format($tanggal_kembali, "d-m-Y");
                    ?>
                </td>
                <td>
                    <a href="../action/edit.php?id=<?php echo $data["id"]; ?>">Edit</a> |
                    <?php
                    if ($_SESSION["level"] == "admin") {
                    ?>
                        <a href="../action/delete.php?id=<?php echo $data["id"]; ?>">Delete</a>
                    <?php } ?>
                </td>
            </tr>
        <?php
            // Tambah angka
            $no++;
        }
        ?>
    </table>
</body>

</html>