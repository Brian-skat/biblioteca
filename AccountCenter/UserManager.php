<!DOCTYPE html>
<html>
 <head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <!--/////////////////////////////////////////////////////////////////////////-->
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.0/jquery.min.js"></script>
  <link rel="stylesheet" href="../css/Accounts.css" type="text/css"/>
  <script src="../js/main.js"></script>
  <!--/////////////////////////////////////////////////////////////////////////-->
  <title>User Verification</title>
 </head>
 <body onload="ComprobationAccount(false)">
  <div class="Panel" id="Login">
   <h1>Login</h1>
   <form name="Check" class="Form" onsubmit="Login(); return false;">
    <!--Nombre-->
    <div class="Group">
     <label for="Lname">Nombre:</label>
     <input class="Field" id="Lname" type="text" name="Name" value="" required/>
    </div>
    <!--Password-->
    <div class="Group">
     <label for="Lpass">Contraseña:</label>
     <input class="Field" id="Lpass" type="password" name="Password" value="" required/>
    </div>
    <button class="Button">Entrar</button>
    <input class="SecondButton" type="button" value="Registrarme" onclick="Mostrar_Registro();" />
   </form>
  </div>
  <div class="Panel" id="Register">
   <h1>Registro</h1>
   <form name="Check" class="Form" onsubmit=" Register(); return false;">
    <!--Nombre-->
    <div class="Group">
     <label for="Rname">Nombre:</label>
     <input class="Field" id="Rname" type="text" name="Name" value="" required/>
    </div>
    <!--Gmail-->
    <div class="Group">
     <label for="RGmail">Gmail:</label>
     <input class="Field" id="RGmail" type="email" name="Password" value="" required/>
    </div>
    <!--Password-->
    <div class="Group">
     <label for="Rpass">Contraseña:</label>
     <input class="Field" id="Rpass" type="password" name="Password" value="" required/>
    </div>
    <!--Verificar Password-->
    <div class="Group">
     <label for="Rverficationpass">Confirmar Contraseña:</label>
     <input class="Field" id="Rverficationpass" type="password" name="Password" value="" required/>
    </div>
    <button class="Button">Entrar</button>
    <input class="SecondButton" type="button" value="Iniciar Sesion" onclick="Mostrar_InicioDeSesion()"/>
   </form>
  </div>
  <div class="Window" id="Window">
   <p id="error"></p>
   <input type="button" value="Aceptar" onclick="HideError();" />
  </div>
 </body>
</html>
