<?php
$Account = htmlspecialchars($_GET['Name']);
$Password = htmlspecialchars($_GET['Pass']);
$Email = htmlspecialchars($_GET['Email']);

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
       echo "Responsive 000";
      }  
} 
else 
{
        function generarCodigo($longitud) {
            $caracteres = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
            $max = strlen($caracteres) - 1;
            $codigo = '';
            for ($i = 0; $i < $longitud; $i++) {
                $codigo .= $caracteres[mt_rand(0, $max)];
            }
            return $codigo;
        }
        $longitud_codigo = 10; // Puedes ajustar este valor según tus necesidades
        $ID = generarCodigo($longitud_codigo);
        
        $sql_verificar = "SELECT * FROM accounts WHERE ID = '$ID'";
        $resultado = $conn->query($sql_verificar);
        
        while ($resultado->num_rows > 0) {
            $ID = generarCodigo($longitud_codigo);
            $resultado = $conn->query("SELECT ID FROM accounts WHERE ID = '$ID'");
            echo'no encontrado';
        }
         

        $sql = "INSERT INTO accounts (Name, Email, Password, ID)
        VALUES ('$Account', '$Email', '$Password', '$ID')";
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
