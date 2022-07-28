<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:form.php");
    exit;
}
// koneksi ke databases
require 'functions.php';

$id = $_GET["id"];

$ubah = query("SELECT * FROM produk WHERE id = $id")[0];
$tambah = mysqli_query($conn, "SELECT * FROM Jenis_Produk");
// mengecek apakah tombol submit telah di klik atau belum 
if (isset($_POST["submit"])) {

    // mengecek data berhasil atau gagal 
    if (ubah($_POST) > 0) {
        header("location:buana.php");
    } else {
        echo "data gagal di ubah";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <h1>Form Ubah Data Produk</h1>
    <a href="buana.php">Kembali</a>
    <br>
    <br>
    <form action="" method="post">
        <table border="1">
            <input type="hidden" name="id" value="<?= $ubah["id"]; ?>">

            <tr>
                <td><label for="kode">Kode</label></td>
                <td><input type="text" id="kode" name="kode" value="<?= $ubah["kode"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="nama">Nama Produk</label></td>
                <td><input type="text" id="nama" name="nama" value="<?= $ubah["nama"]; ?>"></td>
            </tr>
            <tr>
                <td><label for="kategori">Kategori</label></td>
                <td><select name="kategori" id="kategori">
                        <option hidden>==Pilih==</option>
                        <?php foreach ($tambah as $data) { ?>
                            <option value="<?= $data["id"] ?>" <?php if ($data["id"] == $ubah["jenis_id"]) {
                                                                    echo "selected";
                                                                } ?>><?= $data["nama_jenis"] ?></option>
                        <?php } ?>
                    </select></td>
            </tr>
            <tr>
                <td><label for="harga">Harga</label></td>
                <td><input type="text" id="harga" name="harga" size="12" value="<?= $ubah["harga"]; ?>">/kg</td>
            </tr>
            <tr>
                <td><label for="stok">Stok</label></td>
                <td><input type="text" name="stock" id="stok" size="12" value="<?= $ubah["stock"]; ?>">kg</td>
            </tr>
            <tr>
                <td><label for="terjual">Terjual</label></td>
                <td><input type="text" name="terjual" id="terjual" size="12" value="<?= $ubah["terjual"]; ?>">kg</td>
            </tr>
            <tr>
                <td colspan="2" align="center"><button type="submit" name="submit">Simpan</button></td>
            </tr>
        </table>
    </form>


</body>

</html>