<?php
//menggunakan method GET untuk mendapatkan id > menyimpan ke dalam variabel id
$id = $_GET['id'];

// Penyesuaian konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luaspddk";

//Pembuatan koneksi ke database
$conn = new mysqli($servername, $username, $password, $dbname);

//Pemeriksaan koneksi database
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

//eksekusi query untuk menghapus data berdasarkan id yang diterima dari method GET
$sql = "DELETE FROM luaspddkkec WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    echo "Record with id = $id deleted successfully";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}

//menutup koneksi ke database
$conn->close();

header("Location: index.php");
?>