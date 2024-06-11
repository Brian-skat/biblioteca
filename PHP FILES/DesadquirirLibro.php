<?php
$Libro = htmlspecialchars($_GET['book']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Libreria";

$conn = new mysqli($servername, $username, $password, $dbname);
if ($conn->query("UPDATE libros SET Disponible = 'true', Usuario = '' WHERE Libro = '$Libro'") === TRUE) {
    echo 'Cambios realizados correctamente. + '.$Libro.' + '. $Usuario;
} else {
    echo 'Error al realizar los cambios: ' . $conn->error;
}

$conn->close();
