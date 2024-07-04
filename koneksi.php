<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "UAS";
// Create connection
$conn = new mysqli($servername, $username, $password,$dbname);

// Check connection
if ($conn->connect_error) {
  die("Koneksi Gagal silahkan cek xampp control: " . $conn->connect_error);
}
#echo "Connected successfully";
function cek_crud($conn,$sql){
if ($conn->query($sql) === TRUE) {
  echo "Perintah Berhasil";
} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
}

#class table bootsrap
$bo="table table-striped table-bordered table-hover";
?>