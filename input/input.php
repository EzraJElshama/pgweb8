<?php
// Menggunakan fallback '??' untuk mencegah error undefined key
$kec = $_POST['kecamatan'] ?? '';
$luas = $_POST['luas'] ?? 0;
$penduduk = $_POST['jumlah_penduduk'] ?? 0;
$lat = $_POST['latitude'] ?? 0;
$long = $_POST['longitude'] ?? 0;

// Sesuaikan dengan setting MySQL
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luaspddk";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Query disesuaikan dengan nama tabel (luaspddkkec) dan kolom database
$sql = "INSERT INTO luaspddkkec (kec, lat, `long`, luas, penduduk)
        VALUES ('$kec', '$lat', '$long', '$luas', '$penduduk')";

if ($conn->query($sql) === TRUE) {
    $conn->close();
    // Langsung redirect tanpa echo agar tidak terjadi error header
    header("Location: ../index.php");
    exit();
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
    $conn->close();
}
?>