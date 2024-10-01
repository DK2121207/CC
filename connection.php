<?php
// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "db_user";

// Membuat koneksi ke MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>