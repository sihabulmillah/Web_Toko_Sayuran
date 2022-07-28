<?php
// koneksi databases
$conn = mysqli_connect("localhost", "sihab", "password", "db_ptbuana");


function query($query)
{
    global $conn;
    // mengambil data dari databases
    $result = mysqli_query($conn, $query);
    // menyiapkan array kosong untuk menyimpan data
    $rows = [];
    // menampilkan data dengan bentuk array assosiatif
    while ($row = mysqli_fetch_assoc($result)) {
        // mengisi array dengan data  dari databases
        $rows[] = $row;
    }
    return $rows;
}

function tambah($data)
{
    global $conn;

    // supaya data yang di inputkan user menjadi string 
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $kategori = ($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $stock = htmlspecialchars($data["stock"]);
    $terjual = htmlspecialchars($data["terjual"]);

    $query = "INSERT INTO produk VALUES 
            (NULL,'$kode','$nama','$kategori',$harga,$stock,$terjual)";
    mysqli_query($conn, $query);

    // agar function mengembalikan angka 
    // kalau gagal -1 kalau berhasil 1
    return mysqli_affected_rows($conn);
}

function hapus($id)
{
    global $conn;

    mysqli_query($conn, "DELETE FROM produk WHERE id = $id");
    return mysqli_affected_rows($conn);
}

function ubah($data)
{
    global $conn;

    $id = $data["id"];
    $kode = htmlspecialchars($data["kode"]);
    $nama = htmlspecialchars($data["nama"]);
    $kategori = htmlspecialchars($data["kategori"]);
    $harga = htmlspecialchars($data["harga"]);
    $stock = htmlspecialchars($data["stock"]);
    $terjual = htmlspecialchars($data["terjual"]);

    $query = "UPDATE produk SET kode = '$kode',
    nama = '$nama', jenis_id = $kategori, harga = $harga, stock = $stock, terjual = $terjual WHERE id = $id";
    mysqli_query($conn, $query);

    return mysqli_affected_rows($conn);
}
function cari($keyword)
{
    $query = "SELECT produk.*, Jenis_Produk.* FROM produk INNER JOIN Jenis_Produk ON produk.jenis_id = Jenis_Produk.id_jenis WHERE nama LIKE  '%$keyword%' OR kode LIKE '%$keyword%' OR nama_jenis  LIKE '%$keyword%' ";

    return query($query);
}
function cari2($keyword, $awal, $jumlah)
{
    $query = "SELECT produk.*, Jenis_Produk.* FROM produk INNER JOIN Jenis_Produk ON produk.jenis_id = Jenis_Produk.id_jenis WHERE nama LIKE  '%$keyword%' OR kode LIKE '%$keyword%' OR nama_jenis  LIKE '%$keyword%' LIMIT $awal, $jumlah ";

    return query($query);
}
function registrasi($data)
{
    global $conn;
    $username = stripslashes(strtolower($data["username"]));
    $email = htmlspecialchars($data["email"]);
    $password = mysqli_real_escape_string($conn, $data["password"]);
    $konfirmasi = mysqli_real_escape_string($conn, $data["password2"]);

    // MENGECEK KESESUAIAN PASSWORD
    if ($konfirmasi !== $password) {
        echo "<script>
        alert('Konfirmasi Password Tidak Sesuai')
        </script>";
        return false;
    }
    //MENGENKRIPSI PASSWORD
    $password = password_hash($password, PASSWORD_DEFAULT);
    //MENGECEK APAKAH USERNAME SUDAH ADA DI DATABASES
    $result = mysqli_query($conn, "SELECT Username FROM user WHERE username = '$username'");
    if (mysqli_fetch_assoc($result) == $username) {
        echo "<script>
        alert('Username sudah ada')
        </script>";
        return false;
    }
    mysqli_query($conn, "INSERT INTO user VALUES(NULL,'$username','$password','$email')");

    return mysqli_affected_rows($conn);
}
