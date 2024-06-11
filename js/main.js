//NOT IS MY CODE--------------------------------------------------
//Formulario de Cuentas de Usuario [Creado por !"%&"!$]

function Login(){
 let Nombre = document.getElementById("Lname").value;
 let password = document.getElementById("Lpass").value;

 fetch('../PHP FILES/Login.php?Name='+Nombre+'&Pass='+password)
 .then(response => response.text())
 .then(respuesta => {
  switch (respuesta) {
   case 'Responsive 000':
    localStorage.setItem("Username", Nombre);
    localStorage.setItem("Password", password);
    window.location.href = "../index.php";
   break;
   case 'Responsive -001':
    ShowError('Contraseña Incorrecta');
   break;
   case 'Responsive -002':
    ShowError('Usuario Inexistente');
   break;
  }
 })
 .catch(error => {
   ShowError(error);
 });
}
function Register(){
 let Nombre = document.getElementById("Rname").value;
 let Email = document.getElementById("RGmail").value;
 let password = document.getElementById("Rpass").value;
 let Repassword = document.getElementById("Rverficationpass").value;

 if(Repassword.value === password.value){
  fetch('../PHP FILES/Register.php?Name='+Nombre+'&Pass='+password+'&Email='+Email)
 .then(response => response.text())
 .then(respuesta => {
  console.log(respuesta);
  switch (respuesta) {
   case 'Responsive 000':
    ShowError('Ya existe una cuenta con ese nombre');
   break;
   case 'Responsive 001':
    localStorage.setItem("Username",Nombre);
    localStorage.setItem("Password",password);
    window.location.href = "../index.php";
   break;
   case 'Responsive -001':
    ShowError('Acceso Denegado');
   break;
  }

  })
  .catch(error => {
   ShowError(error);
 });
 }
 else{
   ShowError('Contraseñas no son las mismas');
 }
}

function Mostrar_Registro(){
 let Login = document.getElementById("Login");
 let Register = document.getElementById("Register");
 
 Login.style.animationName = "hideFrom";
 Login.style.animationDuration = "1s";

 //------------------------------------- 
 Register.style.animationName = "ShowFrom";
 Register.style.animationDuration = "1s";
 Register.style.opacity = "100%";
 
 Register.style.display = "block";
 Login.style.display = "none"; 
}
function Mostrar_InicioDeSesion(){
 let Login = document.getElementById("Login");
 let Register = document.getElementById("Register");
  
 Register.style.animationName = "hideFrom";
 Register.style.animationDuration = "1s";

 
 //------------------------------------- 
 Login.style.animationName = "ShowFrom";
 Login.style.animationDuration = "1s";
 Login.style.opacity = "100%";
 
 Login.style.display = "block";
 Register.style.display = "none"; 
}

function HideError(){
 let Error = document.getElementById("Window");
  //------------------------------------- 
 Error.style.animationName = "HideFrom";
 Error.style.animationDuration = "0.5s";
 Error.style.opacity = "0%";
 
 Error.style.display = "none";
}
function ShowError(Message){

 if(Message.length < 42){
  let Text = document.getElementById("error");
  Text.innerHTML = Message;  
 }else{
  let Text = document.getElementById("error");
  Text.innerHTML = 'Error en el servidor';
 }
 
 let Error = document.getElementById("Window");
  //------------------------------------- 
 Error.style.animationName = "ShowFrom";
 Error.style.animationDuration = "0.5s";
 Error.style.opacity = "100%";
 
 Error.style.display = "block";
}

function ComprobationAccount(IsprincipalPage){
 if(localStorage.getItem('Username') !== null ||
    localStorage.getItem('Password') !== null
    ){
  if(localStorage.getItem('Username') === '' || 
  localStorage.getItem('Password') === '')
  {
     if(IsprincipalPage === true)
     {
      window.location.href = "../AccountCenter/UserManager.php";
     }
     else
     {

     }
  }
  else{
    if(IsprincipalPage === false)
    {
     window.location.href = "../index.php";
    }
    else
    {

    }
  }
 }
 else
 {
  if(IsprincipalPage === true)
  {
   window.location.href = "../AccountCenter/UserManager.php";
  }
  else
  {
   
  }
 }
}
function Logout(){
 localStorage.setItem('Username','');
 localStorage.setItem('Password','');
 ComprobationAccount(true);
}
//---------------------------------------------------------

function CrearLibro(){
 var Bookname = document.getElementById("namebook").value;
 var Author = localStorage.getItem('Username');
 fetch('../PHP FILES/CrearLibro.php?htmlbook='+Bookname+'&htmlauthor='+Author)
.then(Response => Response.text())
.then(Respuesta => 
{
ListadeLibros();
}).catch(error => 
{

})
}
function ListadeLibros(){
 fetch('../PHP FILES/ActualizarLista.php?')
.then(Response => Response.text())
.then(Respuesta => 
{
 var NuevaLista = document.getElementById('estanteria');
 NuevaLista.innerHTML = '';
 var BaseDeDatos = Respuesta.split('&');
 var Libro;
 for (var i = 0; i < BaseDeDatos.length-1; i++) {
   Libro = BaseDeDatos[i].split('|');
   var libroNuevo = "'"+Libro[0]+"'";
   
   if(Libro[2] === 'true'){
    NuevaLista.innerHTML += '<div class="Book" style="top: '+i*10+'px"> \
    <p>Libro: ['+Libro[0]+']<br><br><br><br><br> Author: ['+Libro[1]+'] <br></p> \
    <input type="button" value="adquirir" onclick="Adquirirlibro('+libroNuevo+');"/> \
   </div>';
    
   }
   else{
   if(Libro[3] !== localStorage.getItem('Username')){
    NuevaLista.innerHTML += '<div class="Book" style="top: '+i*10+'px"> \
    <p>Libro: ['+Libro[0]+']<br><br><br><br><br> Author: ['+Libro[1]+'] <br></p> \
    <b>No Disponible</b> \
   </div>';
   }
   else{
    NuevaLista.innerHTML += '<div class="Book" style="top: '+i*10+'px"> \
    <p>Libro: ['+Libro[0]+']<br><br><br><br><br> Author: ['+Libro[1]+'] <br></p> \
    <input type="button" value="desadquirir" onclick="Desadquirirlibro('+libroNuevo+');"/> \
   </div>';
  }
 }
}
}).catch(error => 
{

})
}
function Adquirirlibro(Nombre){
 var Usuario = localStorage.getItem('Username');
 fetch('../PHP FILES/AdquirirLibro.php?book='+Nombre+'&user='+Usuario)
.then(Response => Response.text())
.then(Respuesta => 
{
 ListadeLibros();
}).catch(error => 
{
 
});
}
function Desadquirirlibro(Nombre){
 fetch('../PHP FILES/DesadquirirLibro.php?book='+Nombre)
.then(Response => Response.text())
.then(Respuesta => 
{
 ListadeLibros();
}).catch(error => 
{
 
});
}
function FiltrarLibros(){
 var Nombre = document.getElementById("Nva").value;
  if(Nombre !== '' ){
   fetch('../PHP FILES/Buscar.php?Search='+Nombre)
  .then(Response => Response.text())
  .then(Respuesta => 
  {
   console.warn(Respuesta);
   var NuevaLista = document.getElementById('estanteria');
   NuevaLista.innerHTML = '';
   
   var BaseDeDatos = Respuesta.split('&');
   var Libro;
   for (var i = 0; i < BaseDeDatos.length-1; i++) {

     Libro = BaseDeDatos[i].split('|');
     var libroNuevo = "'"+Libro[0]+"'";

     if(Libro[2] === 'true'){
      NuevaLista.innerHTML += '<div class="Book" style="top: '+i*10+'px"> \
      <p>Libro: ['+Libro[0]+']<br><br><br><br><br> Author: ['+Libro[1]+'] <br></p> \
      <input type="button" value="adquirir" onclick="Adquirirlibro('+libroNuevo+');"/> \
     </div>';

     }
     else{
     if(Libro[3] !== localStorage.getItem('Username')){
      NuevaLista.innerHTML += '<div class="Book" style="top: '+i*10+'px"> \
      <p>Libro: ['+Libro[0]+']<br><br><br><br><br> Author: ['+Libro[1]+'] <br></p> \
      <b>No Disponible</b> \
     </div>';
     }
     else{
      NuevaLista.innerHTML += '<div class="Book" style="top: '+i*10+'px"> \
      <p>Libro: ['+Libro[0]+']<br><br><br><br><br> Author: ['+Libro[1]+'] <br></p> \
      <input type="button" value="desadquirir" onclick="Desadquirirlibro('+libroNuevo+');"/> \
     </div>';
    }
   }
  }}).catch(error => {

  });
  }
else{
  ListadeLibros();
}
}