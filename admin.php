<?php
session_start();
if (!isset($_SESSION["login"])) {
    header("location:form.php");
    exit;
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
        body {
            text-align: center;
        }

        button {
            margin: 8px;
        }

        button a {
            text-decoration: none;
            color: black;

        }
    </style>

</head>

<body>
    <h1>Selamat Datang, Administrator</h1>
    <p>"Melakukan pekerjaan kecil dengan baik akan melatih kita untuk menyelesaikan pekerjaan besar dengan sempurna,<br>Hasil yang kamu capai akan sebanding dengan upaya yang kamu lakukan."<br><b>-Anonim-</b></p>

    <button><a href="dashboard.php">Home</a></button>||
    <button><a href="kategori.php">Data Kategori</a></button>||
    <button><a href="buana.php">Data Produk</a></button> ||
    <button><a href="logout.php">Logout</a></button>

</body>

</html>