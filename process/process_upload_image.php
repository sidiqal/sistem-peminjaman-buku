<?php
function upload()
{
    // Tangkap File
    $nama_file = $_FILES["foto_buku"]["name"];
    $tmp_file = $_FILES["foto_buku"]["tmp_name"];

    // Validasi Extensi
    $extensi_valid_list = ["jpg", "png", "jpeg"];
    $extensi_valid = explode(".", $nama_file);
    $extensi_valid = strtolower(end($extensi_valid));
    if (!in_array($extensi_valid, $extensi_valid_list)) {
        echo "Bukan Foto!";
    }

    // Pemberian Nama Acak
    $nama_acak = uniqid();
    $nama_acak .= ".";
    $nama_acak .= $extensi_valid;

    // Pindah File 
    move_uploaded_file($tmp_file, '../assets/img/' . $nama_acak);

    // Return Nama File
    return $nama_acak;
}

?>