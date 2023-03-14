<?php 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
    
}

if ($_SESSION['idrol']!=1){
    header("Location: ../menu.php");
}
?>
<!doctype html>
<html lang="es">
  <head>
      <title>Recojos | Panadería</title>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- datatables -->
    <link rel="stylesheet" href="https://cdn.datatables.net/1.10.21/css/jquery.dataTables.min.css">
    <!-- datatables extension SELECT -->
    <link rel="stylesheet" href="https://cdn.datatables.net/select/1.3.1/css/select.dataTables.min.css">

    
    <!-- extension BOTONES -->
    <link rel="stylesheet" href="https://cdn.datatables.net/buttons/1.6.2/css/buttons.dataTables.min.css">
    <style>
        table.dataTable thead, table.dataTable tfoot {
           background: #C8ECF9;
       }
            footer{
                text-align: center;
                background:black;
                color: white;
                padding-bottom: 20px;
                width: 100%;
                margin-top: 20px;
            }              
    </style>
    
  </head>
  <body>
    <div class="container">
        <img src="../images/banner-panaderia.jpg" class="img-responsive" style="width: 100%;height: 300px">
        <h3 style="text-align: center;margin-top: 30px;margin-bottom: 30px;color: #5F4C0B" >RECOJOS DE PANES EN TIENDA </h3>
        <div class="row">
            <div class="col-6">
                <a href="../controlador/controlador_recojo.php?opcion=10" target="_blank"><button class="btn btn-info sm" >Nuevo recojo</button></a>
                
            </div>
            <div class="col-6" style="text-align:right">
                <button onclick="window.history.back();" style="border: 1px solid #BDBDBD;" ><img src="../images/regresar.png" height="35" width="60">  </button>
                
            </div>
        </div>
    </div>
      <div class="container" style="margin-top:15px">
<!-- para ejemplo simple -->
<table id="tablaING" class="display" style="width:100%">
    <thead>
            <tr>
                <th>ID</th>               
                <th>FECHA</th>
                <th>PEDIDO</th>
                <th>NOMBRE</th>
                <th>PANES</th>
                <th>TOTAL</th>
                <th>ESTADO</th>                
                <th>Ver</th>
                <th>Eliminar</th>
            </tr>
    </thead>
                
        
        <tbody>
            <tr style="display:none;">
                <th>ID</th>               
                <th>FECHA</th>
                <th>PEDIDO</th>
                <th>NOMBRE</th>
                <th>PANES</th>
                <th>TOTAL</th>
                <th>ESTADO</th>                
                <th>Ver</th>
                <th>Eliminar</th>
            </tr>
            
            <?php
                //La estructura foreach trabaja con colecciones o arreglos
                    foreach($RegistrosRecojos as $reg){
                        echo '<tr>';
                        echo '<td>'.$reg['id_recojo'].'</td>';                        
                        echo '<td>'.$reg['fec_recojo'].'</td>';                       
                        echo '<td>'.$reg['id_ped'].'</td>';                       
                        echo '<td>'.$reg['nombre'].'</td>';
                        echo '<td>'.$reg['tot_panes'].'</td>';
                        echo '<td>'.$reg['tot_recojo'].'</td>';
                        echo '<td>'.$reg['estado'].'</td>';                        
                        echo '<td style="text-align:center"><a href="../controlador/controlador_recojo.php?opcion=5&id='.$reg['id_recojo'].'"><img src="../images/devolución.png" width=25 height=25></a></td>';
                        echo '<td style="text-align:center"><a href="../controlador/controlador_recojo.php?opcion=5&id='.$reg['id_recojo'].'"><img src="../images/eliminar.ico" width=25 height=25></a></td>';
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
            <br>
            Todos los derechos reservados david basantes
    </footer>
</html>