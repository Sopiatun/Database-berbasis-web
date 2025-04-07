<?php
require "functions.php";
session_start();

if(!isset($_SESSION["login"]) && !isset($_SESSION["alulogin"])) {
    header("Location: login.php");
    exit;
}

$nim = $_GET['nim'];
if (delete($nim) > 0) {
    echo "<script>alert('Data successfully deleted!'); window.location='pencarian.php';</script>";
} else {
    echo "<script>alert('Failed to delete data.');</script>";
}
?>
