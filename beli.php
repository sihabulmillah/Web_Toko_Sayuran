<?php
require 'functions.php';

$id = $_GET["id"];

$produk = query("SELECT * FROM produk WHERE id = $id")[0];


?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
  <link rel="stylesheet" href="style.css">
  <style>
    body {
      background-color: rgba(175, 167, 167, 0.267);
    }

    .transaksi {
      display: flex;
      width: 95%;
      justify-content: space-between;
      margin: 30px auto;
    }

    .data {
      background-color: white;
      padding: 20px;
      width: 66%;
      box-sizing: border-box;
      border-radius: 5px;
      box-shadow: 1px 1px 5px rgba(0, 0, 0, .4);
    }

    .alamat {
      display: flex;
      justify-content: space-between;
    }

    .alamat h3::before {
      content: '';
      width: 20%;
      height: 10px;
      background-image: url(img/images.png);
    }

    .p1 {
      color: gray;
    }

    .map {
      width: 60%;
    }

    .bayar {
      background-color: white;
      width: 31%;
      border-radius: 5px;
      box-shadow: 1px 1px 5px rgba(0, 0, 0, .4);
    }

    .kode {
      padding: 20px;
      border-bottom: 1px solid black;
    }

    .rincian {
      padding: 20px;
    }

    .pembayaran {
      padding: 20px;
      margin-top: -10px;
    }

    .form {
      text-align: center;
      margin-top: 20px;
    }

    .form img {
      width: 18%;
      height: 30px;
    }

    .form button {
      margin-top: 30px;
      width: 96%;
      height: 40px;
      font-size: 25px;
      color: white;
      background-color: red;
      border: none;
      border-radius: 5px;
    }
  </style>
</head>


<body>
  <div class="container">
    <header class="header">
      <h1>PT.BUANA SEGARIN</h1>
      <p>Beli kebutuhan buah dan sayur Anda sekarang. Pesan hari ini, dikirim esok hari! Tinggal klik, belanja buah jadi lebih mudah. <br> Belanja Buah dan Sayur Tanpa Ke Pasar / Supermarket? Biar <b>#KamiYangAntar #DirumahAja</b></p>
    </header>
    <div class="nav">
      <a href="dashboard.php">Home</a>
      <a href="admin.php">Administrator</a>
    </div>
    <section class="transaksi">
      <div class="data">
        <div class="alamat">
          <h3>Kirim ke mana ?</h3>
          <a href="">Pilih alamat lain</a>
        </div><br>
        <p>Sihabul Millah A - 087778930142</p>
        <p><b>Cimahi</b></p>
        <br>
        <p>Jl. Cipageran N.5, Cipageran, Kec. Cimahi Utara, Kota Cimahi, Jawa Barat Masjid As Sa'ab</p>
        <p class="p1">Cimahi Utara, Cimahi <br> Jawa Barat, 40511<br>Indonesia</p>
        <br>
        <img src="img/maps.png" alt="" class="map"><br>
        <a href="">Edit alamat</a>
      </div>

      <div class="bayar">
        <div class="kode">
          <p>Punya kode voucher ?</p>
        </div>
        <div class="rincian">
          <table cellspacing=5 width=350px height="130px">
            <tr>
              <td colspan="2"><b>Rincian Harga : <?= $produk["nama"]; ?> </b></td>
            </tr>
            <tr>
              <td width=220px>Total harga barang</td>
              <td align="right"><?= "Rp." . $produk["harga"]; ?></td>
            </tr>
            <tr>
              <td>Ongkos kirim & Penanganan</td>
              <td align="right">Rp.10000</td>
            </tr>
            <tr>
              <td align="right"><b>Total Pembayaran</b></td>
              <td align="right">
                <?php
                $harga = $produk["harga"];
                $total = $harga + 10000;
                echo "Rp." . $total;
                ?></td>
            </tr>
          </table>
        </div>
        <div class="pembayaran">
          <p>Pilih metode pembayaran</p>
          <form action="" class="form">
            <input type="radio" name="transaksi" value="alfa">
            <label for=""><img src="img/alfamart-logo.png" alt=""></label>

            <input type="radio" name="transaksi" value="indo">
            <label for=""><img src="img/indomaret.png" alt=""></label>

            <input type="radio" name="transaksi" value="ovo">
            <label for=""><img src="img/ovod.png" alt=""></label>

            <input type="radio" name="transaksi" value="dana">
            <label for=""><img src="img/danas.png" alt=""></label>

            <button>Beli Sekarang</button>
          </form>
        </div>
      </div>
    </section>
  </div>
  <!--container-->
</body>

</html>