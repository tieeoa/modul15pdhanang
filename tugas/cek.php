<?php
session_start();

if (!isset($_SESSION['namauser'])) {
    header("Location: login.php");
    exit;
}
?>