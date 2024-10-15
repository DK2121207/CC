<?php
// Konfigurasi database
$servername = "db-php-app-2.cruftcytajjt.us-east-1.rds.amazonaws.com";
$username = "admin";
$password = "phpapp2Admin";
$dbname = "db-php-2";

// Membuat koneksi ke MySQL
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Cek koneksi
if ($conn->connect_error) {
    die("Koneksi gagal: " . $conn->connect_error);
}
?>