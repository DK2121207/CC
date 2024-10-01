<?php
include "connection.php";

$id = $_GET['id'];

// Query untuk mengambil data pengguna berdasarkan ID
$sql = "SELECT * FROM User WHERE id=$id";
$result = $conn->query($sql);

// Jika pengguna ditemukan
if ($result->num_rows > 0) {
    $user = $result->fetch_assoc();
} else {
    echo "Pengguna tidak ditemukan!";
    exit;
}

// Memproses data saat form di-submit
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $nama = $_POST['nama'];
    $kelas = $_POST['kelas'];
    
    // Mengambil file foto baru, jika ada
    if (!empty($_FILES['foto']['name'])) {
        $foto = $_FILES['foto']['name'];
        $target_dir = "uploads/";
        $target_file = $target_dir . basename($foto);

        // Memindahkan file foto ke folder uploads
        if (move_uploaded_file($_FILES['foto']['tmp_name'], $target_file)) {
            $foto_sql = ", foto='$target_file'";
        } else {
            echo "Maaf, terjadi kesalahan saat mengunggah foto.";
            exit;
        }
    } else {
        $foto_sql = ''; // Jika foto tidak diubah, tidak menyertakan dalam query
    }

    // Query untuk memperbarui data pengguna
    $sql = "UPDATE User SET nama='$nama', kelas='$kelas' $foto_sql WHERE id=$id";

    if ($conn->query($sql) === TRUE) {
        echo "Data pengguna berhasil diperbarui!";
        // Redirect ke halaman utama setelah update
        header("Location: index.php");
        exit;
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }
}

// Menutup koneksi
$conn->close();
?>

<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Pengguna</title>
</head>
<body>
    <h2>Update Data Pengguna</h2>

    <form action="" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" id="nama" name="nama" value="<?php echo $user['nama']; ?>" required><br><br>

        <label for="kelas">Kelas:</label><br>
        <input type="text" id="kelas" name="kelas" value="<?php echo $user['kelas']; ?>" required><br><br>

        <label for="foto">Unggah Foto Baru (Opsional):</label><br>
        <input type="file" id="foto" name="foto" accept="image/*"><br><br>

        <input type="submit" value="Update Data">
    </form>

    <p><a href="index.php">Kembali ke Daftar Pengguna</a></p>
</body>
</html>