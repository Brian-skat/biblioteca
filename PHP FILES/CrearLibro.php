<?php
$nombre = htmlspecialchars($_GET['htmlbook']);
$author = htmlspecialchars($_GET['htmlauthor']);
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Libreria";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM libros WHERE Libro = '$nombre'";  
$result = $conn->query($sql);

if ($result->num_rows > 0) 
{
 while($row = $result->fetch_assoc()) 
 {
  echo "Responsive 000";
 }  
} 
else 
{
 $sql = "INSERT INTO libros (Libro, Author, Disponible, Usuario)
 VALUES ('$nombre', '$author', 'true', '')";
 if (mysqli_query($conn, $sql)) 
 {
     echo 'Responsive 001';
 } 
 else 
 {
     echo "Responsive -001";
 }
}

$conn->close();   