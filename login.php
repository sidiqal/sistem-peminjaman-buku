<?php
session_start();
// Validasi session
if ($_SESSION) {
    header("Location: index.php");
    exit;
}

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Halaman Login Admin Perpustakaan</title>
</head>

<body>
    <h1>Halaman Login Admin Perpustakaan</h1>
    <a href="./index.php">Kembali</a><br><br>
    <!-- Inputan data -->
    <form action="./process/process_login.php" method="POST">
        <label for="username">Username :</label>
        <input type="text" name="username" id="username"><br>
        <label for="password">Password :</label>
        <input type="password" name="password" id="password"><br>
        <button type="submit" name="submit">Login</button>
    </form>
</body>

</html>