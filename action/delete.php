<?php
session_start();
include('../process/config.php');

// Validasi session
if ($_SESSION["level"] !== "admin") {
    header("Location: ../index.php");
    exit;
}

$id = $_GET["id"];

$sql = "DELETE FROM perpus WHERE id=$id";

$query = mysqli_query($conn, $sql);

if ($query) {
    header("Location: ../admin/dashboard_admin.php");
    exit;
} else {
    die("Failed to delete!");
}
