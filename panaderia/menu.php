<!doctype html>
<html lang="es-PE">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

    <!-- Custom Css -->
    <link rel="stylesheet" href="style.css" type="text/css" />

    <!-- Ionic icons -->
    <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet">

    <link rel="shortcut icon" href="images/All_logo.ico" type="image/vnd.microsoft.icon" />

    <title>Panadería Lupita's Bakery</title>
  </head>

  <body>

  <!-- N A V B A R -->
  <nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
      <span class="icon ion-md-menu"></span>
    </button>
    <img src="images/logo.png" class="img-fluid nav-logo-mobile" alt="Company Logo">
    <div class="collapse navbar-collapse" id="navbarNavDropdown">
      <div class="container">
      	<img src="images/logo.png" class="img-fluid nav-logo-desktop" alt="Company Logo">
        <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="menu.php">Inicio <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="controlador/controlador_pan.php?opcion=1">Panes <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="controlador/controlador_pedido.php?opcion=1">Pedidos <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="controlador/controlador_recojo.php?opcion=1">Recojo <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="controlador/controlador_cliente.php?opcion=1">Clientes <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="controlador/controlador_seguridad.php?opcion=2">Usuarios <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link">
            <a class="nav-link" href="controlador/controlador_foto.php?opcion=1">Subir fotos <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
          <li class="nav-item nav-custom-link btn btn-demo-small">
            <a class="nav-link" href="index.html">Logout <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
          </li>
        </ul>
      </div>
    </div>
  </nav>
  <!-- E N D  N A V B A R -->
  
  
  <!--  M A R K E T I N G -->
  <section id="marketing">
    <div class="container">
      <div class="row">
        <div class="col-md-5">
          <div class="content-box">
            <span>INTRANET</span>
            <h2 style="color: #5F4C0B">CENTRO DE DATOS</h2>
            <p>Sistema de ventas de canastas de panes</p>
            
          </div>
        </div>
        <div class="col-md-7">
            <img src="images/cesta_pan.jpg" class="img-fluid" alt="Demo image">
          
        </div>
      </div>
    </div>
  </section>
  <!-- E N D  M A R K E T I N G -->

  
  
  
  <!--  F O O T E R  -->
  <footer>
    <div class="container">
      <div class="row">
        <div class="col-md-3">
          <h5>Lupita's Bakery</h5>
          <ul>
            <li><a href="#">Historia</a></li>
            <li><a href="#">Participación comunitaria</a></li>
            <li><a href="#">Innovaciones</a></li>
            <li><a href="#">Mejoras</a></li>
            <li><a href="#">Clima laboral</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Nuestros productos</h5>
          <ul>
            <li><a href="#">Pan de trigo</a></li>
            <li><a href="#">Pan de centeno</a></li>
            <li><a href="#">Pan de maiz</a></li>
            <li><a href="#">Pan de semilla</a></li>
            <li><a href="#">Canastillas</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Descuentos</h5>
          <ul>
            <li><a href="#">Canastillas de 100 unidades</a></li>
            <li><a href="#">Por antiguedad</a></li>
            <li><a href="#">Por volumen de compra</a></li>
            <li><a href="#">Promociones fiesta cívicas</a></li>
            <li><a href="#">Campañas frecuentes</a></li>
          </ul>
        </div>
        <div class="col-md-3">
          <h5>Tiendas</h5>
          <p>Los clientes registrados tendrán un descuento según la venta realizadas, a menor devolución mayor descuento</p>
          <p><a href="mailto:fabiola.huarcaya@unmsm.edu.pe" class="external-links">fabiola.huarcaya@unmsm.edu.pe</a></p>
        </div>
      </div> 
      <div class="divider"></div>
      <div class="row">
        <div class="col-md-6 col-xs-12">
            <a href="#"><i class="icon ion-logo-facebook"></i></a>
            <a href="#"><i class="icon ion-logo-instagram"></i></a>
            <a href="#"><i class="icon ion-logo-twitter"></i></a>
            <a href="#"><i class="icon ion-logo-youtube"></i></a>
          </div>
          <div class="col-md-6 col-xs-12">
            <small>2023 &copy; Todos los derechos reservados - david basantes</small>
          </div>
      </div>
    </div>
  </footer>
  <!--  E N D  F O O T E R  -->
    

    <!-- External JavaScripts -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js" integrity="sha384-smHYKdLADwkXOn1EmN1qk/HfnUcbVRZyYmZ4qpPea6sjB/pTJ0euyQp0Mk8ck+5T" crossorigin="anonymous"></script>
  </body>
</html>