<?php
include 'functions.php';
$jenis = $_POST["kategori"];
//untuk cek pengiriamn data user
// echo $nama, $alamat, $gender;

// query tambah data

$query = mysqli_query($conn, "INSERT INTO Jenis_Produk 
VALUES (NULL,'$jenis')
");
if ($query) {
    header('location:kategori.php');
} else {
    echo "gagal input";
}
