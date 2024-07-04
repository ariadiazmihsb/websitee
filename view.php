<?php
include "koneksi.php";
$sql = "SELECT * FROM tabel_siswa";
$hasil = $conn->query($sql);
$k = 1;
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: #87CEEB; /* Warna biru sky */
        }
        h2 {
            text-align: center;
            font-size: 30px; 
            color: #333; 
            text-transform: uppercase; 
            margin-bottom: 20px; 
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-bottom: 20px; 
            background-color: lightsteelblue; /* Warna light steel blue untuk tabel */
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        tr:nth-child(even) {
            background-color: #f2f2f2;
        }
        tr:hover {
            background-color: #ddd;
        }
        .btn {
            padding: 5px 10px;
            text-decoration: none;
            background-color: #4caf50;
            color: white;
            border-radius: 4px;
            display: block;
            margin-bottom: 10px;
        }
        .btn.logout {
            float: right;
            margin-top: 20px; 
        }
        .add-btn {
            float: left;
            margin-right: 10px;
        }
        .edit-icon::before {
            content: '\270E'; /* Unicode untuk ikon edit (pena) */
            margin-right: 5px;
        }
        .trash-icon::before {
            content: '\1F5D1'; /* Unicode untuk ikon keranjang sampah */
            margin-right: 5px;
        }
    </style>
</head>
<body>
    <h2>PENDATAAN SISWA EKSTRAKURIKULER</h2>
    <a href="form_input.php" class="btn add-btn">Tambah Data</a>
    <table>
        <tr>
            <th>No</th>
            <th>NIS</th>
            <th>Nama Siswa</th>
            <th>Asal Sekolah</th>
            <th>Alamat</th>
            <th>Ekstrakurikuler</th>
            <th>Action</th>
        </tr>
        <?php while ($data = $hasil->fetch_assoc()) : ?>
            <tr>
                <td><?php echo $k; ?></td>
                <td><?php echo $data['NIS']; ?></td>
                <td><?php echo $data['nama_siswa']; ?></td>
                <td><?php echo $data['asal_sekolah']; ?></td>
                <td><?php echo $data['alamat']; ?></td>
                <td><?php echo $data['pilihan_ekstrakurikuler']; ?></td>
                <td>
                    <a href="form_edit.php?NIS=<?php echo $data['NIS']; ?>" class="btn"><span class="edit-icon"></span>Edit</a>
                    <a href="hapus.php?NIS=<?php echo $data['NIS']; ?>" class="btn"><span class="trash-icon"></span>Hapus</a>
                </td>
            </tr>
            <?php $k++; ?>
        <?php endwhile; ?>
    </table>
    <a href="logout.php" class="btn logout">Logout</a>
</body>
</html>
