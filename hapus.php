<?php
include "koneksi.php";
$NIS = $_GET['NIS'];
$sql = "DELETE FROM tabel_siswa WHERE NIS='$NIS'";
$result = $conn->query($sql);

if ($result === TRUE) {
    echo "<h2 align='center'>Data Siswa Berhasil Dihapus</h2>";
} else {
    echo "<h2 align='center'>Gagal Menghapus Data Siswa</h2>";
}

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Delete Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            max-width: 600px;
            margin: 0 auto;
            padding: 20px;
            background-color: #f9f9f9;
            border: 1px solid #ddd;
            border-radius: 8px;
        }
        h2 {
            text-align: center;
        }
        .message {
            text-align: center;
            margin-top: 20px;
            font-size: 18px;
        }
        .link {
            display: block;
            text-align: center;
            margin-top: 20px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            padding: 10px 20px;
            border-radius: 4px;
        }
        .link:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <div class="container">
        <div class="message">
            <?php
            if ($result === TRUE) {
                echo "Data siswa dengan NIS $NIS berhasil dihapus.";
            } else {
                echo "Gagal menghapus data siswa.";
            }
            ?>
        </div>
        <a href="view.php" class="link">Kembali ke Halaman View</a>
    </div>
</body>
</html>
