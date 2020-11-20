<?php 
session_start();
include("config.php");

if(isset($_POST["submit"])){
    // Tangkap data
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Data query
    $sql = "SELECT * FROM user WHERE username='$username'";

    // Process query
    $query = mysqli_query($conn, $sql);
    
    // Cek username
    if(mysqli_num_rows($query) === 1){
        
        // Query data
        $data = mysqli_fetch_array($query);

        // Cek password
        if($password === $data["password"]){
            
            // Cek level
            if($data["level"] == "admin" OR $data["level"] == "pegawai"){

                // Buat session
                $_SESSION["username"] = $username;
                $_SESSION["level"] = $data["level"];

                // Direct
                header("Location: ../admin/dashboard_admin.php");
                exit;
            }
        }

    }
}

?>