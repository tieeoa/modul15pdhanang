<?php
session_start();
$namauser_db = "admin"; 
$password_db = "123";

$namauser = $_POST['username'];
$password = $_POST['password'];

if ($namauser_db==$namauser AND $password_db==$password){
    $_SESSION['namauser'] = $namauser;

    echo"Username: ". $namauser ."<br>";
    echo"<p>Selamat datang<b>" . "&nbsp" . $_SESSION ['namauser']."</b></p>";
    echo"<p>Berikut ini menu navigasi anda</p>";
    echo"<p><a href='hal1.php'>Menu 1</a><br>";
    echo"<a href='hal2.php'>Menu 2</a><br>";
    echo"<a href='hal3.php'>Menu 3</a></p>";
}else{
    echo"USERNAME ATAU PASSWORD ANDA SALAH!"; 
}
?>