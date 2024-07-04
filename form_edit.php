<?php
include "koneksi.php";
$NIS = $_GET['NIS'];
$sql = "SELECT * FROM tabel_siswa WHERE nis='$NIS'";
$hasil = $conn->query($sql);
$data = $hasil->fetch_assoc();
$nama_siswa = $data['nama_siswa'];
$asal_sekolah = $data['asal_sekolah'];
$alamat = $data['alamat'];
$pilihan_ekstrakurikuler = $data['pilihan_ekstrakurikuler'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Update Data Siswa Ekstrakurikuler</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: skyblue; /* Warna blue sky */
            padding: 20px;
        }
        h2 {
            text-align: center;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: lightsteelblue; /* Warna light steel blue */
        }
        td {
            padding: 8px;
            border: 1px solid #ddd;
        }
        input[type='text'], input[type='submit'], select {
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }
        input[type='submit'] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
        }
        input[type='submit']:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Update Data Siswa Ekstrakurikuler</h2>
    <form method='POST' action='target_edit.php'>
        <table>
            <tr>
                <td>NIS</td>
                <td><input type='hidden' name='NIS' value='<?php echo $NIS; ?>'><?php echo $NIS; ?></td>
            </tr>
            <tr>
                <td>NAMA SISWA</td>
                <td><input type='text' name='nama_siswa' value='<?php echo $nama_siswa; ?>'></td>
            </tr>
            <tr>
                <td>ASAL SEKOLAH</td>
                <td><input type='text' name='asal_sekolah' value='<?php echo $asal_sekolah; ?>'></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type='text' name='alamat' value='<?php echo $alamat; ?>'></td>
            </tr>
            <tr>
                <td>EKSTRAKURIKULER</td>
                <td>
                    <select name='pilihan_ekstrakurikuler'>
                        <option value='Futsal' <?php if($pilihan_ekstrakurikuler == 'Futsal') echo 'selected'; ?>>Futsal</option>
                        <option value='Basket' <?php if($pilihan_ekstrakurikuler == 'Basket') echo 'selected'; ?>>Basket</option>
                        <option value='Paskibra' <?php if($pilihan_ekstrakurikuler == 'Paskibra') echo 'selected'; ?>>Paskibra</option>
                        <option value='Pramuka' <?php if($pilihan_ekstrakurikuler == 'Pramuka') echo 'selected'; ?>>Pramuka</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' value='UPDATE DATA'></td>
            </tr>
        </table>
    </form>
</body>
</html>
