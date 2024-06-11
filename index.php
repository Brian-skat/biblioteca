<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--/////////////////////////////////////////////////////////////////////////-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.4/Chart.js"></script>
  <link rel="stylesheet" type="text/css" href="css/Style.css">
  <script src="js/main.js"></script>
  <!--/////////////////////////////////////////////////////////////////////////-->
  <link rel="shortcut icon" href="" type="image/ico">
  <title>biblioteca</title>
 </head>
 <body onload="ComprobationAccount(true); ListadeLibros()">
  <p class="biblioteca">Biblioteca</p>
  <div class="Salir">
   <img src="src/Usuario.png" width="90" height="90" alt="Usuario"/>
   <input type="button" value="" name="Logout" onclick="Logout();" />
  </div>
  <div class="Filtrodelibros">
    <p>nombre:</p>
    <input type="text" name="Filtro" id="Nva"/>
    <input type="button" value="Search" onclick="FiltrarLibros()"/>
  </div> 
  <div class="NuevoLibro">
    <p>Nuevo Libro:</p>
    <input type="text" name="book" id="namebook"/>
    <input type="button" value="Add" onclick="CrearLibro()" />
  </div>
  <div id="estanteria">
   
  </div>
 </body>
</html>
