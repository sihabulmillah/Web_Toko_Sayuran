<?php
require "../functions.php";

$produk = cari($_GET["keyword"]);
?>

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