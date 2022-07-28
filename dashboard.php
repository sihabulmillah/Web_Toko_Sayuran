<?php
require 'functions.php';

$produk = query("SELECT * FROM produk");

if (isset($_POST["cari"])) {
  $produk = cari($_POST["keyword"]);
}
?>




<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <script src="js/jquery-3.6.0.min.js"></script>
  <script src="js/script.js"></script>
</head>

<body>
  <div class="container-fluid">
    <header class="header">
      <h1>PT.BUANA SEGARIN</h1>
      <p>Beli kebutuhan buah dan sayur Anda sekarang. Pesan hari ini, dikirim esok hari! Tinggal klik, belanja buah jadi lebih mudah. <br> Belanja Buah dan Sayur Tanpa Ke Pasar / Supermarket? Biar <b>#KamiYangAntar #DirumahAja</b></p>
    </header>
    <div class="nav">
      <a href="#">Home</a>
      <form action="" method="post">
        <input type="text" placeholder="Cari" name="keyword" autofocus autocomplete="off" class="keyword">
        <button type="submit" class="tombol-cari" name="cari">Cari</button>
        <!-- <img src="img/loader.gif" alt=""> -->
      </form>
      <a href="form.php">Administrator</a>
    </div>
    <p class="p">Produk Segar</p>
    <section class="daftar">
      <?php foreach ($produk as $row) {
      ?>
        <table border="1" class="home">
          <tr>
            <td colspan="3"><img src="img/s.jpeg" alt=""> </td>
          </tr>
          <tr>
            <td><?= $row["kode"]; ?></td>
            <td><?= $row["nama"]; ?></td>
            <td style="font-weight: bold;">
              <?php
              if ($row["stock"] > $row["terjual"]) {
                echo "<font color='green'>Tersedia</font>";
              } else {
                echo "<font color='red'>Habis</font>";
              }
              ?></td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="blue"><a href="beli.php?id=<?= $row["id"]; ?>" style="color: white;">Beli</a></td>
            <td bgcolor="gray"><a href="detail.php?id=<?= $row["id"]; ?>" style="color: white;">Detail</a></td>
          </tr>
        </table>
      <?php  } ?>
    </section>
  </div>

</body>

</html>