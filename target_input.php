<?php
include "koneksi.php";

$NIS = $_POST['NIS'];
$nama_siswa = $_POST['nama_siswa'];
$asal_sekolah = $_POST['asal_sekolah'];
$alamat = $_POST['alamat'];
$pilihan_ekstrakurikuler = $_POST['pilihan_ekstrakurikuler'];

$sql = "INSERT INTO tabel_siswa (NIS, nama_siswa, asal_sekolah, alamat, pilihan_ekstrakurikuler)
        VALUES ('$NIS', '$nama_siswa', '$asal_sekolah', '$alamat', '$pilihan_ekstrakurikuler')";

cek_crud($conn, $sql);
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Insert Data Siswa</title>
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
        .save-icon::before {
            content: '\2714'; /* Unicode untuk ikon centang (check mark) */
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Insert Data Siswa</h2>
        <div class="message">
            Data siswa dengan NIS <?php echo $NIS; ?> berhasil disisipkan.
        </div>
        <a href="view.php" class="link">Kembali ke Halaman View</a>
    </div>
</body>
</html>
