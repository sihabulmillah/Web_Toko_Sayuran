<?php
require 'functions.php';

$id = $_GET["id"];

$produk = query("SELECT produk.*, Jenis_Produk.* FROM produk INNER JOIN Jenis_Produk ON produk.jenis_id = Jenis_Produk.id_jenis WHERE produk.id = $id")[0];
$prodak = query("SELECT * FROM produk");
?>

<!DOCTYPE html>
<html lang="en">

<head>
 <meta charset="UTF-8">
 <meta http-equiv="X-UA-Compatible" content="IE=edge">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>Document</title>
 <link rel="stylesheet" href="style.css">
</head>

<body>
 <header class="header">
  <h1>PT.BUANA SEGARIN</h1>
  <p>Beli kebutuhan buah dan sayur Anda sekarang. Pesan hari ini, dikirim esok hari! Tinggal klik, belanja buah jadi lebih mudah. <br> Belanja Buah dan Sayur Tanpa Ke Pasar / Supermarket? Biar <b>#KamiYangAntar #DirumahAja</b></p>
 </header>
 <div class="nav">
  <a href="dashboard.php">Home</a>
  <a href="admin.php">Administrator</a>
 </div>
 <p class="p">Detail Produk : </p>
 <section>
  <table border="1" class="table">
   <tr>
    <td rowspan="5" class="img"><img src="img/s.jpeg" alt=""></td>
    <td>Kode Produk</td>
    <td><?= $produk["kode"]; ?></td>
   </tr>
   <tr>
    <td>Nama Produk</td>
    <td><?= $produk["nama"]; ?></td>
   </tr>
   <tr>
    <td>Kategori</td>
    <td><?= $produk["nama_jenis"]; ?></td>
   </tr>
   <tr>
    <td>Harga</td>
    <td style="font-weight: bold;"><?php echo "Rp " . $produk['harga']; ?></td>
   </tr>
   <tr>
    <td align="center" bgcolor="red"><a href="beli.php?id=<?= $produk["id"]; ?>" style="color: white;">Beli Sekarang</a></td>
    <td align="center" bgcolor="green"><a href="" style="color: white;">Chat</a></td>
   </tr>
  </table>
</body>

</html>