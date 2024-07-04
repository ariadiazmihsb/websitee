<?php
session_start();

// Hapus semua variabel sesi dan hancurkan sesi
session_unset();
session_destroy();

// Koneksi ke database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UAS";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal silahkan cek xampp control: " . $conn->connect_error);
}

// Inisialisasi variabel error
$loginErr = "";

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form dan bersihkan
    $username = test_input($_POST["username"]);
    $password = test_input($_POST["password"]);

    // Query untuk memeriksa apakah username dan password cocok
    $query = "SELECT * FROM login WHERE username = '$username' AND password = '$password'";

    // Eksekusi query
    $result = $conn->query($query);

    // Periksa apakah hasilnya tidak kosong
    if ($result->num_rows == 1) {
        // Login berhasil, redirect ke halaman selanjutnya
        session_start();
        $_SESSION['loggedin'] = true;
        $_SESSION['username'] = $username;
        $_SESSION['password'] = $password; // Simpan password di sesi
        header("Location: view.php");
        exit(); // Pastikan untuk keluar dari skrip setelah melakukan redirect
    } else {
        $loginErr = "Username atau password salah.";
    }
}

// Fungsi untuk membersihkan input
function test_input($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}

// Tutup koneksi database
$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-image: url('iyalah.jpg'); /* Ganti dengan path ke gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
        }
        .container {
            max-width: 500px;
            margin: 0 auto;
            padding: 40px;
            background-color: rgba(255, 255, 255, 0.8); /* Tambahkan alpha (transparansi) untuk latar belakang konten */
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            text-align: center;
        }
        h2 {
            font-size: 32px;
            color: #333;
            margin-bottom: 30px;
        }
        label {
            font-weight: bold;
            font-size: 18px;
            color: #666;
        }
        .error {
            color: red;
            margin-bottom: 20px;
            font-size: 16px;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 15px;
            margin-bottom: 20px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            font-size: 18px;
        }
        input[type="submit"] {
            width: 100%;
            background-color: #4caf50;
            color: white;
            padding: 15px 0;
            border: none;
            border-radius: 5px;
            cursor: pointer;
            font-size: 18px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #45a049;
        }
        .btn-back {
            margin-top: 20px;
            display: inline-block;
            text-decoration: none;
            background-color: #4caf50; /* Warna latar belakang */
            color: white; /* Warna teks */
            padding: 10px 20px;
            border-radius: 5px;
            font-size: 18px;
            transition: background-color 0.3s;
        }

        .btn-back:hover {
            background-color: #45a049; /* Warna latar belakang saat dihover */
        }

        .back-arrow::before {
            content: '\2190'; /* Unicode untuk panah kiri */
            margin-right: 10px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Login Pengguna</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <div class="error"><?php echo $loginErr;?></div>
            <div>
                <label for="username">Username:</label><br>
                <input type="text" id="username" name="username" placeholder="Masukkan username" required>
            </div><br>
            <div>
                <label for="password">Password:</label><br>
                <input type="password" id="password" name="password" placeholder="Masukkan password" required>
            </div><br>
            <div>
                <input type="submit" value="Login">
            </div>
        </form>
        <a href="registrasi.php" class="btn-back"><span class="back-arrow"></span></a>
    </div>
</body>
</html>
