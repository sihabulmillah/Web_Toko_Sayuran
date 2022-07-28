<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:form.php");
    exit;
}
// koneksi ke databases
require 'functions.php';
$query = mysqli_query($conn, "SELECT * FROM Jenis_Produk");
// mengecek apakah tombol submit telah di klik atau belum 
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
    <h2>Daftar Jenis Produk PT. Buana Segarin</h2>
    <a href="admin.php">Kembali</a>
    <br><br>
    <table border="1" cellpadding="4">
        <tr>
            <th>#</th>
            <th>Nama</th>
            <th>Action</th>
        </tr>
        <?php
        $i = 1;
        foreach ($query as $data) {
        ?>
            <tr>
                <td><?= $i ?></td>
                <td><?= $data["nama_jenis"] ?></td>
                <td>
                    <a href="hapus.php?id=<?= $data["id"] ?>">
                        <button onclick="return confirm('Yakin akan di hapus ?');">Hapus</button></a>
                </td>
            </tr>
            <?php $i++; ?>
        <?php } ?>
    </table>
    <h2>Form Tambah Kategori Produk</h2>

    <table border="1">
        <form action="protam.php" method="post">
            <tr>
                <td><label for="kategori">Nama Kategori</label></td>
                <td><input type="text" id="kategori" name="kategori"></td>
            </tr>
            <tr>
                <td colspan="2" align="center">
                    <a href="protam.php"><button type="submit">Simpan</button></a>
                </td>
            </tr>
        </form>
    </table>
</body>

</html>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PT. ABC</title>
</head>

<body>





</body>

</html>