<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UAS";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Koneksi Gagal silahkan cek xampp control: " . $conn->connect_error);
}

// Pesan sukses
$successMessage = "";

// Jika form disubmit
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Ambil data dari form
    $username = $_POST['username'];
    $password = $_POST['password'];

    // Query untuk menambahkan pengguna baru ke database
    $query = "INSERT INTO login (username, password) VALUES ('$username', '$password')";

    // Jalankan query
    if ($conn->query($query) === TRUE) {
        $successMessage = "Pengguna berhasil didaftarkan.";
    } else {
        echo "Error: " . $query . "<br>" . $conn->error;
    }

    // Tutup koneksi database
    $conn->close();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrasi Pengguna</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('iyalah.jpg'); /* Ganti dengan path ke gambar latar belakang Anda */
            background-size: cover;
            background-position: center;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }
        .container {
            background-color: rgba(255, 255, 255, 0.8); /* Tambahkan alpha (transparansi) untuk latar belakang konten */
            padding: 40px;
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
        .success-message {
            color: green;
            margin-top: 20px;
        }
        p {
            margin-top: 20px;
            font-size: 16px;
        }
        a {
            color: #4caf50;
            text-decoration: none;
        }
        a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <h2>Registrasi Pengguna</h2>
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
            <label for="username">Username:</label><br>
            <input type="text" id="username" name="username" placeholder="Masukkan username" required><br>
            <label for="password">Password:</label><br>
            <input type="password" id="password" name="password" placeholder="Masukkan password" required><br><br>
            <input type="submit" value="Daftar">
        </form>
        <div class="success-message"><?php echo $successMessage; ?></div>
        <p>Sudah punya akun? <a href="login1.php">Login disini</a></p>
    </div>
</body>
</html>
