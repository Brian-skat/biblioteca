<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Libreria";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
}
$sql = "SELECT * FROM libros";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()){
        echo $row['Libro'] . '|' . $row['Author'] . '|' . $row['Disponible'] . '|' . $row['Usuario'] . '&'; 
        
    }

}
$conn->close();