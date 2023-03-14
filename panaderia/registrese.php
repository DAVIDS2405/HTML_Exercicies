<!DOCTYPE html>
<html lang="es">
 <head>
 <link href="img/block.png" rel="shortcut icon" type="image/vnd.microsoft.icon" />
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
 </head>   
    <script>
        function cancelar(){
            location.href="index.html"
        }
        function caso(){
          var xtipo = document.getElementById("").value;

        }
        function grabar(){
          var xtipo= document.getElementById('txtTipo').value;
          var xnro= document.getElementById('txtNro').value;
          var xnom= document.getElementById('txtNombre').value;
          var xcorreo= document.getElementById('txtCorreo').value;
          var xdir= document.getElementById('txtDir').value;
          var xusu= document.getElementById('txtUsuario').value;
          var xcon= document.getElementById('txtContra').value;
         
          location.href="controlador/controlador_cliente.php?opcion=4&txtTipo="+xtipo+"&txtNro="+xnro+"&txtNombre="+xnom+"&txtCorreo="+xcorreo+"&txtDir="+xdir+"&txtUsuario="+xusu+"&txtContra="+xcon;
        }
    </script>
<style>
body {font-family: Arial, Helvetica, sans-serif;}
* {box-sizing: border-box;}

/* Full-width input fields */
input[type=text], input[type=password] {
  width: 100%;
  padding: 15px;
  margin: 5px 0 22px 0;
  display: inline-block;
  border: none;
  background: #f1f1f1;
}

/* Add a background color when the inputs get focus */
input[type=text]:focus, input[type=password]:focus {
  background-color: #ddd;
  outline: none;
}

/* Set a style for all buttons */
button {
  background-color: #04AA6D;
  color: white;
  padding: 14px 20px;
  margin: 8px 0;
  border: none;
  cursor: pointer;
  width: 100%;
  opacity: 0.9;
}

button:hover {
  opacity:1;
}

/* Extra styles for the cancel button */
.cancelbtn {
  padding: 14px 20px;
  background-color: #f44336;
}

/* Float cancel and signup buttons and add an equal width */
.cancelbtn, .signupbtn {
  float: left;
  width: 50%;
}

/* Add padding to container elements */
.container {
  padding: 15px;
}

/* The Modal (background) */
.modal {
  display: none; /* Hidden by default */
  position: fixed; /* Stay in place */
  z-index: 1; /* Sit on top */
  left: 0;
  top: 0;
  width: 100%; /* Full width */
  height: 100%; /* Full height */
  overflow: auto; /* Enable scroll if needed */
  background-color: #474e5d;
  padding-top: 5px;
}

/* Modal Content/Box */
.modal-content {
  background-color: #fefefe;
  margin: 5% auto 15% auto; /* 5% from the top, 15% from the bottom and centered */
  border: 1px solid #888;
  width: 40%; /* Could be more or less, depending on screen size */
}

/* Style the horizontal ruler */
hr {
  border: 1px solid #f1f1f1;
  margin-bottom: 15px;
}
 
/* The Close Button (x) */
.close {
  position: absolute;
  right: 35px;
  top: 15px;
  font-size: 40px;
  font-weight: bold;
  color: #f1f1f1;
}

.close:hover,
.close:focus {
  color: #f44336;
  cursor: pointer;
}

/* Clear floats */
.clearfix::after {
  content: "";
  clear: both;
  display: table;
}

/* Change styles for cancel button and signup button on extra small screens */
@media screen and (max-width: 300px) {
  .cancelbtn, .signupbtn {
     width: 50%;
  }
}
</style>
<body onload="document.getElementById('id01').style.display='block'" style="width:auto;">

<div id="id01" class="modal">
  <form class="modal-content" action="" method="POST">
    <div class="container">
    <img src="images/cesta_pan.jpg" alt="70" width="150"/>
      <h4>Lupita's Bakery</h4>
      <h2 style="color:cornflowerblue">Registrese</h2>
      <hr>
      <div class="row">
          <div class="col">
            <label for=""><b>Tipo de usuario</b></label>
                <select class="form-control" name="txtTipo" id="txtTipo" onchange="caso()">
                    <option value="1">Tienda</option>
                    <option value="2">Persona Natural</option>
                </select>
          </div>
          <div class="col">
            <label for=""><b>DNI / RUC</b></label>
            <input type="text" placeholder="Ingrese documento" class="form-control" id="txtNro" name="txtNro" required>
          </div>
      </div>
    

    
      <div class="row">
          <div class="col">
            <label for=""><b>Nombre</b></label>
            <input type="text" placeholder="Ingrese nombre" id="txtNombre" name="txtNombre" required>
          </div>
          <div class="col">
            <label for=""><b>Correo</b></label>
            <input type="text" placeholder="Ingrese correo" id="txtCorreo" name="txtCorreo" required>
          </div>
      </div>
      <label for=""><b>Dirección</b></label>
      <input type="text" placeholder="Ingrese dirección" id="txtDir" name="txtDir" required>
      <div class="row">
          <div class="col">
            <label for=""><b>Usuario</b></label>
            <input type="text" placeholder="Ingrese usuario" id="txtUsuario" value="" name="txtUsuario" required>
          </div>
          <div class="col">
            <label for=""><b>Contraseña</b></label>
            <input type="password" placeholder="Ingrese contraseña" id="txtContra" value="" name="txtContra" required>
          </div>
      </div>
      
      <div class="row">
        <div class="col">
            <button type="button" onclick="cancelar()" class="btn btn-secondary">Cancelar</button>
        </div>
        <div class="col">
            <button type="button" onclick="grabar()" class="btn btn-primary">Aceptar</button>
        </div>
      </div>
    </div>
  </form>
</div>

<script>
// Get the modal
var modal = document.getElementById('id01');

// When the user clicks anywhere outside of the modal, close it
window.onclick = function(event) {
  if (event.target == modal) {
    modal.style.display = "index.php";
  }
}
</script>

</body>
</html>
