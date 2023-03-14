<?php session_start();
?>
<!DOCTYPE html>

<html>
    <head>
        <meta charset="UTF-8">
        <title>Fotografías | Panadería</title>

      <!-- Bootstrap CSS -->
      <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
      <!-- datatables -->
      <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
      <!-- datatables extension SELECT -->
      <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    
    <!-- extension BOTONES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">



        !-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" integrity="sha384-WskhaSGFgHYWDcbwN70/dfYBj47jz9qbsMId/iRN3ewGhXQFZCSftd1LZCfmhktB" crossorigin="anonymous">

        <!-- Custom Css -->
        <link rel="stylesheet" href="../style.css" type="text/css" />

        <!-- Ionic icons -->
        <link href="https://unpkg.com/ionicons@4.2.0/dist/css/ionicons.min.css" rel="stylesheet"/>

        <!-- Google Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700,900" rel="stylesheet"/>

        <link rel="shortcut icon" href="../images/All_logo.ico" type="image/vnd.microsoft.icon" />
        <style>
            table.dataTable thead, table.dataTable tfoot {
             background: #DEAB2F;
            }
            footer{
                text-align: center;
                background:black;
                color: white;
                position: absolute;
                bottom: 0;
                height: 20px;
                width: 100%;
               
            }   
        </style>
        <script>
            function Registro(){
                location.href="../vista/vista_ing_foto.php";
            }
            function Reporte(){
                location.href="../vista/reporte_fotos.php";
            }
            
        </script>
    </head>
    
    <body>
       <!-- N A V B A R -->
        <nav class="navbar navbar-default navbar-expand-lg fixed-top custom-navbar">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon ion-md-menu"></span>
            </button>
            <img src="../images/logo.png" class="img-fluid nav-logo-mobile" alt="Company Logo">
            <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <div class="container">
                <img src="../images/logo.png" class="img-fluid nav-logo-desktop" alt="Company Logo">
                <ul class="navbar-nav ml-auto nav-right" data-easing="easeInOutExpo" data-speed="1250" data-offset="65">
                <li class="nav-item nav-custom-link">
                    <a class="nav-link" href="../menu.php">Inicio <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                  <a class="nav-link" href="../controlador/controlador_pan.php?opcion=1">Panes <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                  <a class="nav-link" href="../controlador/controlador_pedido.php?opcion=1">Pedidos <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                  <a class="nav-link" href="../controlador/controlador_recojo.php?opcion=1">Recojo <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                  <a class="nav-link" href="../controlador/controlador_cliente.php?opcion=1">Clientes <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                  <a class="nav-link" href="../controlador/controlador_seguridad.php?opcion=2">Usuarios <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link">
                  <a class="nav-link" href="../controlador/controlador_foto.php?opcion=1">Subir fotos <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                <li class="nav-item nav-custom-link btn btn-demo-small">
                    <a class="nav-link" href="../index.html">Logout <i class="icon ion-ios-arrow-forward icon-mobile"></i></a>
                </li>
                </ul>
            </div>
            </div>
        </nav>
                         
        <!-- E N D  N A V B A R -->
       
            
        <div class="container" style="margin-top:80px; margin-bottom:20px">
            
            <h5 style="margin-top:35px;text-align:center; margin-bottom:25px;">FOTOGRAFÍAS DE MOSTRADORES</h5>

            <div class="row" style="margin-bottom:15px">
              <div class="col-6">
                <input type="button" value="Subir fotos" class="btn btn-warning" name="btnRegistro" onclick="Registro();" />
                  
              </div>
              <div class="col-6" style="text-align:right">
                Usuario <input type="text" size=10 style="background-color:#E4E4E2;border: 1px solid #BDBDBD;" value="<?php echo $_SESSION['usuario'];  ?>" readonly >
            </div>
            </div>
        </div>

        <div class="container" style="margin-top:15px; margin-bottom:25px" >
        <!-- para ejemplo simple -->
        <table id="tablaING" class="display" style="width:100%">
          <thead>
            <tr>
              <th>ID</th>
              <th>Descripción</th>
              <th>Cliente</th>
              <th>Fecha</th>                
              <th>E</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
          </thead>
                      
              
          <tbody>
            <tr style="display:none;">
              <th>ID</th>
              <th>Descripción</th>
              <th>Cliente</th>
              <th>Fecha</th>                
              <th>E</th>
              <th>Editar</th>
              <th>Eliminar</th>
            </tr>
            
            <?php
              //La estructura foreach trabaja con colecciones o arreglos
              foreach ($RegistroFotos as $fila){
                echo '<tr>';
                echo '<td>'.$fila['id_foto'].'</td>';
                echo '<td>'.$fila['des_foto'].'</td>';
                echo '<td>'.$fila['nombre'].'</td>';
                echo '<td>'.$fila['fec_foto'].'</td>';                
                echo '<td>'.$fila['estado'].'</td>';
                echo '<td><a href="../controlador/controlador_foto.php?opcion=3&id='.$fila['id_foto'] .'"><img src="../images/editar.png" width=25 height=25 ></a></td>';
                echo '<td><a href="../controlador/controlador_foto.php?opcion=5&id='.$fila['id_foto'] .'"><img src="../images/eliminar.ico" width=25 height=25 ></a></td>';
                echo '</tr>';
              }
            ?> 
                  
          </tbody>
                
        </table>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
        <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

        <!-- datatables-->
        <script src="https://cdn.datatables.net/1.10.21/js/jquery.dataTables.min.js"></script>
        
        <!-- datatables extension SELECT -->
        <script src="https://cdn.datatables.net/select/1.3.1/js/dataTables.select.min.js"></script>
        
        <!-- extension BOTONES -->
        <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

        <script>
        $(document).ready(function () {
          //Llamar a datatable
          $('#tablaING').DataTable({
              language: {
                  "decimal": "",
                  "emptyTable": "No hay información",
                  "info": "Mostrando _START_ a _END_ de _TOTAL_ Entradas",
                  "infoEmpty": "Mostrando 0 to 0 of 0 Entradas",
                  "infoFiltered": "(Filtrado de _MAX_ total entradas)",
                  "infoPostFix": "",
                  "thousands": ",",
                  "lengthMenu": "Mostrar _MENU_ Entradas",
                  "loadingRecords": "Cargando...",
                  "processing": "Procesando...",
                  "search": "Buscar:",
                  "zeroRecords": "Sin resultados encontrados",
                  "paginate": {
                      "first": "Primero",
                      "last": "Ultimo",
                      "next": "Siguiente",
                      "previous": "Anterior"
                  }
              }
          });
        });  

        
        </script>
    </div>
   
    </body> 
    <footer>
            Todos los derechos david basantes
    </footer>
</html>

