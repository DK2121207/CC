<?php
include "connection.php";

// Mendapatkan ID pengguna dari URL
$id = $_GET['id'];

// Query untuk mengambil data pengguna (untuk menghapus foto dari folder)
$sql = "SELECT foto FROM User WHERE id=$id";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Mengambil path foto
    $row = $result->fetch_assoc();
    $foto = $row['foto'];

    // Menghapus file foto jika ada
    if (file_exists($foto)) {
        unlink($foto); // Menghapus file dari folder
    }

    // Query untuk menghapus pengguna dari database
    $sql = "DELETE FROM User WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Pengguna berhasil dihapus!";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Pengguna tidak ditemukan!";
}

// Menutup koneksi
$conn->close();

// Redirect kembali ke halaman index
header("Location: index.php");
exit;
?>