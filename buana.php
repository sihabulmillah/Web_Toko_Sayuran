<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:form.php");
    exit;
}
// menambil isi dari file lain
require 'functions.php';
// memasukan query 

//pagination
//konfigurasi
$jumlahDataPerhalaman = 4;
$jumlahData = count(query("SELECT * FROM produk"));
//ceil() unutk membulatkan ke atas
$jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
// if (isset($_GET['page'])) {
//     $halamanAktif = $_GET["page"];
// } else {
//     $halamanAktif = 1;
// }
$halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

$awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;

$produk = query("SELECT produk.*, Jenis_Produk.nama_jenis FROM produk INNER JOIN Jenis_Produk ON produk.jenis_id = Jenis_Produk.id_jenis LIMIT $awalData, $jumlahDataPerhalaman");

if (isset($_POST['cari'])) {

    $produk = cari($_POST['keyword']);
    $jumlahData = count($produk);
    $jumlahHalaman = ceil($jumlahData / $jumlahDataPerhalaman);
    $halamanAktif = (isset($_GET['halaman'])) ? $_GET['halaman'] : 1;

    $awalData = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman;
}

?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        button a {
            text-decoration: none;
            color: black;
        }
    </style>
</head>

<body>
    <h1>Daftar Produk PT Buana Segarin</h1>

    <a href="tambah.php">+ Tambah Data</a> ||
    <a href="admin.php">Kembali</a>
    <br><br>
    <form action="" method="post">
        <input type="text" name="keyword">
        <button type="submit" name="cari">Cari</button>
        <a href="buana.php"><button type="submit" name="refresh">Refresh</button></a>
    </form>
    <br>
    <table border="1" cellpadding=6 cellspacing=2 width=50%>
        <tr bgcolor="blue" style="color: white;text-align:center;">
            <td>No</td>
            <td>Kode</td>
            <td>Nama Produk</td>
            <td>Kategori</td>
            <td>Harga</td>
            <td>Stok</td>
            <td>Terjual</td>
            <td>Action</td>
        </tr>

        <?php
        //urutan nomor
        $no = ($jumlahDataPerhalaman * $halamanAktif) - $jumlahDataPerhalaman + 1;
        foreach ($produk as $row) : ?>
            <tr align="center">
                <td><?= $no ?></td>
                <td><?= $row["kode"] ?></td>
                <td><?= $row["nama"] ?></td>
                <td><?= $row["nama_jenis"] ?></td>
                <td><?= $row["harga"] ?></td>
                <td><?= $row["stock"] ?></td>
                <td><?= $row["terjual"] ?></td>
                <td align="center">
                    <a href="ubah.php?id=<?= $row["id"]; ?>"><button>Edit</button></a> ||
                    <!-- menambah ? untuk mengirim sesuatu -->
                    <a href="hapus.php?id=<?= $row["id"]; ?>"><button onclick="return confirm('Yakin ?');">Hapus</button></a>
                </td>
            </tr>
            <?php $no++; ?>
        <?php endforeach ?>
    </table>
    <br>
    <?php if (!isset($_POST['cari'])) { ?>
        <div class="pagination">
            <?php if ($halamanAktif > 1) : ?>
                <a href="?halaman=<?= $halamanAktif - 1 ?>">
                    &laquo;</a>
            <?php endif ?>
            <!-- Navigasi -->
            <?php
            for ($i = 1; $i <= $jumlahHalaman; $i++) : ?>
                <?php if ($i == $halamanAktif) : ?>
                    <a href="?halaman=<?= $i ?>" style="font-weight: bold; color:black"><?= $i ?></a>
                <?php else : ?>
                    <a href="?halaman=<?= $i ?>"><?= $i ?></a>
                <?php endif ?>
            <?php endfor ?>
            <?php if ($halamanAktif < $jumlahHalaman) : ?>
                <a href="?halaman=<?= $halamanAktif + 1 ?>">
                    &raquo;</a>
            <?php endif ?>
        </div>
    <?php } ?>

</body>

</html>