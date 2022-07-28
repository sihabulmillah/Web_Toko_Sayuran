<?php
session_start();
//menghapus cookie 
setcookie('id', '', time() - 3600);
setcookie('key', '', time() - 3600);
// menghapus session
session_unset();
$_SESSION = [];
session_destroy();

header("location:form.php");
