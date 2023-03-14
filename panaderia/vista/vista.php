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
      <title>Panes | Panadería</title>
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
    

  </head>
  <body>
  
<!-- para ejemplo simple -->
<div class="container" style="margin-top:15px">
<table id="tablaING" class="table" style="width:100%">
    <thead>
            <tr>
                               
                <th>PAN</th>
                <th>CANTIDAD</th>
                <th>PRECIO</th>
                <th>DESCTO</th>
                <th>IMPORTE</th>                               
                <th>Eliminar</th>
            </tr>
    </thead>      
    <tbody>
        
        
        <?php
            //La estructura foreach trabaja con colecciones o arreglos
            $tot=0;
                foreach($RegistrosPanes as $reg){
                    echo '<tr>';
                                           
                    echo '<td>'.$reg['nom_pan'].'</td>';                       
                    echo '<td>'.$reg['can_pan'].'</td>';
                    echo '<td>'.($reg['imp_pan']/$reg['can_pan']).'</td>';
                    echo '<td>'.$reg['descto'].'</td>';
                    echo '<td>'.$reg['imp_pan'].'</td>';
                    echo '<td style="text-align:center"><a href="../controlador/controlador_detalle.php?opcion=5&iddet='.$reg['id_det'].'"><img src="../images/eliminar.ico" width=25 height=25></a></td>';
                    echo '</tr>';
                    $tot=$tot+ $reg['imp_pan'];
                }

        ?> 

     
    </tbody>
        
    </table>
    <div class="row">
        <div class="col-3">
            <?php
                echo "Son ".$tot. " soles"
            ?>
        </div>

    </div>
    
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js" integrity="sha384-Q6E9RHvbIyZFJoft+2mJbHaEWldlvI9IOYy5n3zV9zzTtmI3UksdQRVvoxMfooAo" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js" integrity="sha384-OgVRvuATP1z7JjHLkuOU7Xw704+h835Lr+6QL9UvYjZE3Ipu6Tp75j7Bh/kR0JKI" crossorigin="anonymous"></script>

    
    
    <!-- extension BOTONES -->
    <script src="https://cdn.datatables.net/buttons/1.6.2/js/dataTables.buttons.min.js"></script>

    
  </div>
    </body>
    
</html>