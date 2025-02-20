<!-- filepath: /c:/xampp/php/htdocs/web sekolah/fetch_siswa.php -->
<?php
header('Content-Type: application/json');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "school";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Fetch data from the database
$sql = "SELECT id, nama, kelas, nis, alamat FROM siswa";
$result = $conn->query($sql);

$siswa_data = array();
if ($result->num_rows > 0) {
    // Output data of each row
    while($row = $result->fetch_assoc()) {
        $siswa_data[] = $row;
    }
} else {
    $siswa_data = array();
}

$conn->close();

echo json_encode($siswa_data);
?>