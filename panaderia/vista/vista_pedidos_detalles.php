<?php 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
    
}
?>
<!doctype html>
<html lang="es">
  <head>
     
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
    <!-- Jquery -->
    <script src="https://code.jquery.com/jquery-3.2.1.js"></script>
  </head>

  <script type="text/javascript">
    function grabar_recojo(xped){
        
        location.href="../controlador/controlador_recojo.php?opcion=4&idped="+xped;
    }
  
    $(document).ready(function() {
                       
        $(document).on("click",".devolver-btn",function(){
            if (confirm("¿Estás seguro de recoger?")) {
                var xid = $(this).data('id'); 
                var xpan = $(this).data('uid');                
                var xcan = $(this).parents("tr").find("td")[4].innerHTML;
                //var xcan = document.getElementById('txtDev').value;                
                //var xcan = document.getElementsByName('txtDev').value;                
                alert("cantidad  : "+xcan);

                $.ajax({
                    url :"../controlador/controlador_detalle.php",
                    type:"GET",
                    cache:false,
                    data:{opcion:12,iddet:xid,idpan:xpan,canpan:xcan},
                    success:function(data){
                        $("#post").html(data);
                    }
                    
                });
            }
        });
        
    });

</script>

<body>
  
<!-- para ejemplo simple -->
<div class="container">
    <img src="../images/banner-panaderia.jpg" class="img-responsive" style="width: 100%;height: 300px">
    <h3 style="text-align: center;margin-top: 20px;margin-bottom: 15px;color: #5F4C0B" >RECOJOS DE PANES EN PEDIDOS </h3>
    <div class="row">
        <div class="col-6">
            Nº de Pedido : <input type="text" id="idPed" name ="idPed" value="<?php echo $_SESSION['nro_pedido'] ?>" size=7  readonly >
            
        </div>
        
        <div class="col-6" style="text-align:right">
            <button onclick="window.close();" style="border: 1px solid #BDBDBD;" ><img src="../images/regresar.png" height="35" width="60">  </button>
            
        </div>
    </div>
</div>
<div class="container" style="margin-top:15px">

    <div id="post">

    </div>

    <table id="tablaING" class="table" style="width:100%">
        <thead>
                <tr>
                                
                    <th>PAN</th>
                    <th>CANTIDAD</th>
                    <th>PRECIO</th>
                    <th>DESCTO</th>
                    <th>IMPORTE</th> 
                    <th>DEVOLUCIÓN</th>                               
                    <th>Aceptar</th>
                </tr>
        </thead>      
        <tbody>                
            <?php
                //La estructura foreach trabaja con colecciones o arreglos
                $tot=0;
                $tot_pan=0;
                $i=1;
                foreach($RegistrosRecojos as $reg){
                    echo '<tr id="fila"'.$i.'>';
                                            
                    echo '<td>'.$reg['nom_pan'].'</td>';                       
                    echo '<td>'.$reg['can_pan'].'</td>';
                    echo '<td>'.($reg['imp_pan']/$reg['can_pan']).'</td>';
                    echo '<td>'.$reg['descto'].'</td>';
                    echo '<td>'.$reg['imp_pan'].'</td>';
                    echo '<td><input type="text" name="txtDev" id="txtDev" size=7 value="0"></td>';                              
                    echo "<td><button class='btn btn-warning btn-sm devolver-btn' data-id='{$reg['id_det']}' data-uid='{$reg['id_pan']}' >Devolver</button></td>";
                    echo '</tr>';
                    $tot = $tot + $reg['imp_pan'];
                    $tot_pan = $tot_pan + $reg['can_pan'];
                    $_SESSION['total_pedido']=$tot;
                }
                echo '<tr>';                                           
                echo '<td>Totales</td>';                       
                echo '<td>'.$tot_pan.' panes</td>';
                echo '<td></td>';
                echo '<td></td>';
                echo '<td>'.$tot.' soles</td>';
                echo '<td></td>';
                echo '</tr>';
            ?> 
            
        
        </tbody>
            
    </table>
        
    
    <div class="row" id="btn" style="margin-top:15px;">
        <div class="col-3">
                <button class="btn btn-primary" onclick="grabar_recojo(<?php echo $_SESSION['nro_pedido'] ?>);" >Grabar recojo</button>
        </div>

    </div>
</div>
    </body>
    
</html>