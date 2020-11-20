<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Perpustakaan</title>
</head>

<body>
    <h1>Perpustakaan</h1>
    <a href="./login.php">Login</a><br><br>
    <table border="1" cellpadding="10" cellspacing="0">
        <tr>
            <td>No</td>
            <td>Nama</td>
            <td>Judul</td>
            <td>Foto</td>
            <td>Tanggal Pinjam</td>
            <td>Tanggal Kembali</td>
        </tr>
        <?php
        include("./process/config.php");

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
                <td><img src="assets/img/<?php echo $data["foto_buku"]; ?>" width="100px"></td>
                <td><?php echo $data["tanggal_pinjam"]; ?></td>
                <td><?php echo $data["tanggal_kembali"]; ?></td>
            </tr>
        <?php
            // Tambah angka
            $no++;
        }
        ?>
    </table>
</body>

</html>