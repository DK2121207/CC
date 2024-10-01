<?php
include "connection.php";

$sql = "SELECT id, nama, kelas, foto FROM User";
$result = $conn->query($sql);
?>

<style>
        table {
            width: 100%;
            border-collapse: collapse;
        }
        table, th, td {
            border: 1px solid black;
        }
        th, td {
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        img {
            width: 100px;
            height: 100px;
        }
    </style>
</head>
<body>
    <h2>Daftar Pengguna Terdaftar</h2>

    <table>
        <thead>
            <tr>
                <th>ID</th>
                <th>Nama</th>
                <th>Kelas</th>
                <th>Foto</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($result->num_rows > 0) {
                // Menampilkan data per baris
                while($row = $result->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $row["id"] . "</td>";
                    echo "<td>" . $row["nama"] . "</td>";
                    echo "<td>" . $row["kelas"] . "</td>";
                    echo "<td><img src='" . $row["foto"] . "' alt='Foto " . $row["nama"] . "'></td>";
                    echo "<td>" ."<a "."href='updateUser.php?id=".$row["id"]."'>". "Edit" . "</td>";
                    echo "<td>" ."<a "."href='deleteUser.php?id=".$row["id"]."'>". "Delete" . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='5'>Tidak ada pengguna terdaftar</td></tr>";
            }
            ?>
        </tbody>
    </table>
    <a href="addUser.php">Add User</a>

</body>
</html>

<?php
// Menutup koneksi
$conn->close();
?>