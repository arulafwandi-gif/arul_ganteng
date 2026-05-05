<?php
$host = "localhost";
$username = "root";
$password = "";
$dbname = "db_arulganteng";

$koneksi = mysqli_connect($host, $username, $password, $dbname);

if (!$koneksi) {
    die("Koneksi gagal: " . mysqli_connect_error());
} else {
    echo "Koneksi berhasil!";
}
?>