<!DOCTYPE html>
<html>
<body>
<h2>Form Edit</h2>
<?php
    $servername = "localhost";
    $username = "root";
    $password = "";
    $dbname = "luaspddk"; 

    $conn = new mysqli($servername, $username, $password, $dbname);

    // Cek koneksi
    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    }

    // Pastikan parameter id ada di URL untuk mencegah error
    if (isset($_GET['id']) && $_GET['id'] != '') {
        $id = $_GET['id'];
        $sql = "SELECT * FROM luaspddkkec WHERE id = $id";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<form action='edit.php' onsubmit='return validateForm()' method='post'>";
            while($row = $result->fetch_assoc()) {
                echo "<input type='hidden' name='id' value='".$row['id']."'><br>";
                echo "<label for='kec'>Kecamatan:</label><br>";
                echo "<input type='text' id='kec' name='kecamatan' value='".$row['kec']."'><br>";
                
                echo "<label for='lat'>Latitude:</label><br>";
                echo "<input type='text' id='lat' name='latitude' value='".$row['lat']."'><br>";
                
                echo "<label for='long'>Longitude:</label><br>";
                echo "<input type='text' id='long' name='longitude' value='".$row['long']."'><br>";
                
                echo "<label for='luas'>Luas:</label><br>";
                echo "<input type='text' id='luas' name='luas' value='".$row['luas']."'><br>";
                
                echo "<label for='jml_pddk'>Jumlah Penduduk:</label><br>";
                echo "<input type='text' id='jml_pddk' name='penduduk' value='".$row['penduduk']."'><br><br>";
            }
            echo "<input type='submit' value='Submit'>";
            echo "</form>";
        } else {
            echo "Data tidak ditemukan.";
        }
    } else {
        echo "ID tidak valid atau belum dipilih.";
    }
?>

<p id="informasi"></p>

<script>
    function validateForm() {
        let luas = document.getElementById("luas").value;
        let text = "";
        if (isNaN(luas) || luas < 1) {
            text = "Data luas harus angka dan tidak boleh bernilai negatif";
            document.getElementById("informasi").innerHTML = text;
            event.preventDefault();
            return false;
        }
        return true;
    }
</script>
</body>
</html>