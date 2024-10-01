<?php
include "connection.php";

// Memeriksa apakah form sudah dikirim
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Mengambil data dari form
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];

    // Mengambil data foto
    $foto = $_FILES['foto']['name'];
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($foto);
    
    // Memindahkan file foto ke folder uploads
    if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
        // Menyimpan data ke dalam database
        $sql = "INSERT INTO User (nama, kelas, foto) VALUES ('$nama', '$kelas', '$target_file')";

        if ($conn->query($sql) === TRUE) {
            echo "Registrasi berhasil!";
            echo "<p>" . "<a "."href='index.php'>"."Kembali ke Daftar Pengguna"."</a>"."</p>";
        } else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
    } else {
        echo "Maaf, terjadi kesalahan saat mengunggah foto.";
    }
}

// Menutup koneksi
$conn->close();
?>