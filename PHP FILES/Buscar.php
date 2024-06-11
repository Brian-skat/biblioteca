<?php
$Search = htmlspecialchars($_GET['Search']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Libreria";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->connect_error) {
    die("Conexión fallida: " . $conn->connect_error);
} 
$sql = "SELECT * FROM libros WHERE Libro LIKE '%$Search%'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        echo $row['Libro'] . '|' . $row['Author'] . '|' . $row['Disponible'] . '|' . $row['Usuario'] . '&'; 
    }
} else {
    echo "No se encontraron registros para el nombre '$Search'.";
}
