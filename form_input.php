<?php
echo "
<!DOCTYPE html>
<html lang='en'>
<head>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1.0'>
    <title>Input Data Siswa</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            padding: 20px;
            background-color: skyblue; /* Warna blue sky */
        }
        h2 {
            text-align: center;
            margin-bottom: 20px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            background-color: lightsteelblue; /* Warna light steel blue */
        }
        th, td {
            padding: 8px;
            border: 1px solid #ddd;
            text-align: left;
        }
        input[type='text'], input[type='submit'] {
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
        }
        select { /* Menambahkan gaya untuk elemen select */
            padding: 6px 10px;
            border: 1px solid #ccc;
            border-radius: 4px;
            box-sizing: border-box;
            width: 100%;
            font-size: 16px; /* Menyesuaikan ukuran font */
        }
        input[type='submit'] {
            background-color: #4caf50;
            color: white;
            cursor: pointer;
            width: auto;
        }
        input[type='submit']:hover {
            background-color: #45a049;
        }
    </style>
</head>
<body>
    <h2>Pendataan Siswa Ekstrakurikuler</h2>
    <form method='POST' action='target_input.php'>
        <table>
            <tr>
                <td>NIS</td>
                <td><input type='text' name='NIS'></td>
            </tr>
            <tr>
                <td>NAMA SISWA</td>
                <td><input type='text' name='nama_siswa'></td>
            </tr>
            <tr>
                <td>ASAL SEKOLAH</td>
                <td><input type='text' name='asal_sekolah'></td>
            </tr>
            <tr>
                <td>ALAMAT</td>
                <td><input type='text' name='alamat'></td>
            </tr>
            <tr>
                <td>PILIHAN EKSTRAKURIKULER</td>
                <td>
                    <select name='pilihan_ekstrakurikuler'>
                        <option value='Futsal'>Futsal</option>
                        <option value='Basket'>Basket</option>
                        <option value='Paskibra'>Paskibra</option>
                        <option value='Pramuka'>Pramuka</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td></td>
                <td><input type='submit' value='SIMPAN'></td>
            </tr>
        </table>
    </form>
</body>
</html>
";
?>
