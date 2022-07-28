<?php
session_start();
require "functions.php";
//mengecek cookie terlebih dahulu 
if (isset($_COOKIE['id']) && isset($_COOKIE['key'])) {
    $id = $_COOKIE['id'];
    $key = $_COOKIE['key'];

    // ambil user name berdasarkan id
    $result = mysqli_query($conn, "SELECT Username FROM user WHERE id_user = $id");
    $row = mysqli_fetch_assoc($result);

    // cek cookie dan username
    if ($key === hash('sha256', $row['Username'])) {
        $_SESSION['login'] = true;
    }
}

if (isset($_SESSION["login"])) {
    header("location:admin.php");
    exit;
}


if (isset($_POST["kirim"])) {
    if (registrasi($_POST) !== 0) {
        echo "<script>
		alert('User Baru Sudah di tambahkan')
		</script>";
    } else {
        mysqli_error($conn);
    }
}

if (isset($_POST["submit"])) {
    global $conn;
    $username = $_POST["user"];
    $password = $_POST["pass"];

    $result = mysqli_query($conn, "SELECT * FROM user WHERE Username = '$username'");
    //cek username
    if (mysqli_num_rows($result) == 1) {
        //cek password
        $row = mysqli_fetch_assoc($result);
        //mengembalikan string yang di acak oleh hash
        if (password_verify($password, $row["Password"])) {
            //set session
            $_SESSION["login"] = true;
            if (isset($_POST["cek"])) {
                //membuat cookie
                // setcookie('login', 'true', time() + 60);
                //membuat cookie dari databases
                setcookie('id', $row['id_user'], time() + 60);
                setcookie('key', hash('sha256', $row['Username']), time() + 60);
            }

            header("location:admin.php");
            exit;
        }
    }
    $error = true;
}
?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="form.css">
    <style>
        .register {
            background-color: aqua;
            width: 60%;
            padding: 10%;
            box-sizing: border-box;
            border-right: 2px dashed white;
            border-radius: 5px;
        }

        legend {
            margin-left: 6px;
        }

        fieldset {
            border-style: dotted;
            border-color: white;
            padding-left: 10px;
            box-sizing: border-box;

        }

        .register input[type="text"],
        .register input[type="password"] {
            width: 100%;
            height: 25px;
            padding-left: 5px;
            box-sizing: border-box;
            outline: none;
            border: none;
            border-radius: 4px;
            font-size: 14px;
            background-color: white;
        }

        .register input[type="text"]:focus {
            border: 1px solid lightseagreen;
            box-sizing: border-box;
        }

        .register button {
            width: 20%;
            height: 25px;
            font-weight: bold;
            border-radius: 5px;
            outline: none;
            border: none;
            background-color: cornflowerblue;
            color: white;
            transition: 0.5s;
        }

        .register button:hover {
            color: cornflowerblue;
            border: 1px solid cornflowerblue;
            background-color: white;
            transition: 0.5s;
        }
    </style>
</head>

<body>
    <section>
        <div class="login">
            <form method="post" action="">
                <?php if (isset($error) == true) {
                    echo "<script>alert('username atau password salah')</script>";
                } ?>
                <h1>Login your acount</h1>
                <ul>

                    <li><input type="text" name="user" placeholder="Username" size="30" autocomplete="off"></li>
                    <li><input type="password" name="pass" placeholder="Password" size="30" autocomplete="off"></li>
                    <li style="text-align: left;margin-top:15px">
                        <input type="checkbox" name="cek" id="cek" style="width: 15px;height:15px">
                        <label for="cek">Remember Me
                        </label>
                    </li>
                    <li><button type="submit" name="submit">Login</button> || <button><a href="dashboard.php" style="text-decoration: none; color:black;">Kembali</a></button></li>
                </ul>
            </form>

        </div>

        <div class="register">
            <form action="" method="post">
                <fieldset>
                    <legend>Registrasi</legend>
                    <table cellspacing="10">
                        <tr>
                            <td><label for="name">Username</label></td>
                            <td>:</td>
                            <td><input type="text" name="username" id="name" placeholder="Nama" size="30" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="email">Email</label></td>
                            <td>:</td>
                            <td><input type="text" name="email" id="email" placeholder="Email" size="30" autocomplete="off">
                            </td>
                        </tr>
                        <tr>
                            <td><label for="asal">Password</label></td>
                            <td>:</td>
                            <td><input type="password" id="asal" placeholder="Password" name="password">
                            </td>
                        </tr>
                        <tr>
                            <td valign="top"><label for="alamat">Konfirmasi</label></td>
                            <td valign="top">:</td>
                            <td><input type="password" placeholder="Password" name="password2" id="alamat"></td>
                        </tr>
                        <tr>
                            <td colspan="3" align="center"> <button type="submit" id="kirim" name="kirim">Kirim</button>
                                <button type="reset">Ulang</button>
                            </td>
                        </tr>
                    </table>
                </fieldset>
            </form>
        </div>
    </section>
</body>

</html>