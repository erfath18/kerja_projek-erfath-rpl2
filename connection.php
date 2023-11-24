<?php
$host = 'localhost';
$username = 'root';
$password = '';
$dbname = 'database_pendataan_gym';

$mysql = new mysqli($host, $username, $password, $dbname);
$conn = mysqli_connect($host, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Koneksi Gagal" . $conn->connect_error);
}
?>