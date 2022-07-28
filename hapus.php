<?php
require 'functions.php';

$id = $_GET["id"];

if (hapus($id) > 0) {
    header('location:buana.php');
} else {
    echo "Gagal Hapus";
}

$id_jen = $_GET["id"];

$query = mysqli_query($conn, "DELETE FROM Jenis_Produk WHERE id = $id_jen");
if ($query) {
    header("location:kategori.php");
} else {
    echo "gagal hapus";
}
