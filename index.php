<?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "luaspddk"; //disesuaikan dengan database phpMyAdmin


$conn = new mysqli($servername, $username, $password, $dbname);

// Memeriksa koneksi
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

$sql = "SELECT * FROM luaspddkkec";
$result = $conn->query($sql);
echo "<a href='input/index.html'>Input</a>";

if ($result->num_rows > 0) {
    echo "<table border='1px'><tr>
            <th>id</th>
            <th>Kecamatan</th>
            <th>Latitude</th>
            <th>Longitude</th>
            <th>Luas (Km2)</th>
            <th>Jumlah Penduduk</th>
            <th colspan='2'>Aksi</th></tr>";

    while($row = $result->fetch_assoc()) {
        echo "<tr>
        <td>".$row["id"]."</td>
        <td>".$row["kec"]."</td>
        <td>".$row["lat"]."</td>
        <td>".$row["long"]."</td>
        <td>".$row["luas"]."</td>
        <td align='right'>".$row["penduduk"]."</td>
        <td><a href='delete.php?id=".$row["id"]."'>hapus</a></td>
        <td><a href='edit/index.php?id=".$row["id"]."'>edit</a></td>
            </tr>";
    }
    echo "</table>";
} else {
    echo "0 results";
}

$conn->close();
?>
