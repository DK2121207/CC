<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add User</title>
</head>
<body>
<h2>Form Registrasi</h2>
    <form action="processAddUser.php" method="POST" enctype="multipart/form-data">
        <label for="nama">Nama Lengkap:</label><br>
        <input type="text" id="nama" name="nama" required><br><br>

        <label for="kelas">Kelas:</label><br>
        <input type="text" id="kelas" name="kelas" required><br><br>

        <label for="foto">Unggah Foto Diri:</label><br>
        <input type="file" id="foto" name="foto" accept="image/*" required><br><br>

        <input type="submit" value="Daftar">
    </form>
</body>
</html>