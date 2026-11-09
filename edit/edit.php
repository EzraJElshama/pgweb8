<?php
$id = $_POST['id'];
$kecamatan = $_POST['kecamatan'];
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];
$luas = $_POST['luas'];
$penduduk = $_POST['penduduk'];

// Konfigurasi database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luaspddk";

// Buat koneksi
$conn = new mysqli($servername, $username, $password, $dbname);

// Periksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query untuk memperbarui data
$sql = "UPDATE luaspddkkec SET 
        kec = '$kecamatan', 
        lat = '$latitude', 
        `long` = '$longitude', 
        luas = '$luas', 
        penduduk = '$penduduk' 
        WHERE id = $id";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    header("Location: ../index.php"); // Mengarahkan kembali ke index utama di luar folder edit
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
?>