<?php
// Penanganan dan Pengambilan Data dari Form Input
// Menggunakan null coalescing (??) sebagai fallback untuk mencegah munculnya peringatan error
$kec = $_POST['kecamatan'] ?? '';
$luas = $_POST['luas'] ?? 0;
$penduduk = $_POST['jumlah_penduduk'] ?? 0;
$lat = $_POST['latitude'] ?? 0;
$long = $_POST['longitude'] ?? 0;

// Konfigurasi Koneksi Database
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luaspddk";

// Pembuatan koneksi 
$conn = new mysqli($servername, $username, $password, $dbname);

// Pemeriksaan koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Eksekusi query untuk memasukkan data ke dalam tabel luaspddkkec
$sql = "INSERT INTO luaspddkkec (id, kec, lat, `long`, luas, penduduk)
        VALUES ('$id', '$kec', '$lat', '$long', '$luas', '$penduduk')";

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