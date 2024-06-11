<?php
$Account = htmlspecialchars($_GET['Name']);
$Password = htmlspecialchars($_GET['Pass']);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "Libreria";

$conn = new mysqli($servername, $username, $password, $dbname);
$sql = "SELECT * FROM accounts WHERE Name = '$Account'";  
$result = $conn->query($sql);
if ($result->num_rows > 0) 
{
  while($row = $result->fetch_assoc()) 
  {
   $resultado = mysqli_query($conn, "SELECT * FROM accounts WHERE Name = '$Account'");
   $fila = mysqli_fetch_assoc($resultado); 
    if($fila['Password'] === $Password)
    {
     echo 'Responsive 000';
    }
    else
    {
     echo 'Responsive -001';
    }
  }
} 
else 
{
echo 'Responsive -002';
}
$conn->close();
