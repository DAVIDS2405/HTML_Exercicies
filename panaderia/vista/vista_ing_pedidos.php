<?php 
$status = session_status();
if($status == PHP_SESSION_NONE){
    //There is no active session
    session_start();
    
}

?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Pedido de compra | Panaderia</title>
<meta name="description" content="Menu Ajax Demo..."/>
<link rel="stylesheet" href="css/font-awesome.min.css">
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css">
<link rel="stylesheet" href="css/styles.css">
<script src="https://code.jquery.com/jquery-3.2.1.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


<style>
    html {
        min-height: 100%;
        position: relative;
    }
    body {
        margin: 0;
        margin-bottom: 40px;
    }
    footer2{
        background-color: black;
        position: absolute;
        bottom: 0;
        width: 100%;
        height: 70px;
        color: white;
        text-align: center;
        padding-bottom: 20px;
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
<script type="text/javascript">

    function grabar_pedido(xtot){
       
        var xid = document.getElementById('idcli').value;   
        var fec=$('#fecha').val();  
                        
        location.href="../controlador/controlador_pedido.php?opcion=4&idcli="+xid+"&fec="+fec+"&tot="+xtot;

    }   
    $(document).ready(function() {

        function loadTableData(){
            $.ajax({
                url : "../controlador/controlador_detalle.php",
                type : "GET",
                data:{opcion:1},                  
                success:function(data){
                    $("#central").html(data);
                }
            });
        }
                
        $('#div-btn1').click(function(e) {                
            e.preventDefault();                                        
            var xidpan = document.getElementById('idpane').value;
            var xcan = $('#forma input[name="txtCan"]').val();
            //var xdescto = document.getElementById('txtDescto').value;
            var xdescto = $('#descuento').html();            
            
            $.ajax({
                type: "GET",
                cache:false,
                url: "../controlador/controlador_detalle.php",                
                data:{opcion:2,idpan:xidpan,txtCan:xcan,txtDescto:xdescto},                
                success: function(response) {
                    //alert("Datos insertados correctamente");  
                    $("#lineaForm")[0].reset();                  
                    loadTableData();             
                }                  
            });                                   
        });
            

        $('#idcli').on('click', function() {                 
            var xidcli = document.getElementById('idcli').value;           
            $.ajax({
                type: "GET",
                cache:false,
                url: "../controlador/controlador_cliente.php",                
                data:{opcion:6,idcli:xidcli},
                success: function(a) {
                    $('#mostrar').html(a);                                
                }                  
            });                        
            
        });
        
        $('#idpane').on('click', function() {     
            var xidcli = document.getElementById('idcli').value;
            var xidpane = document.getElementById('idpane').value;
           
            $.ajax({
                type: "GET",
                cache:false,
                url: "../controlador/controlador_cliente.php",                
                data:{opcion:10,idcli:xidcli, idpan:xidpane},
                success: function(a) {
                    $('#descuento').html(a);                    
            
                }
                  
            });                        
            
        });

    });

</script>
</head>

<body>
<div class="container">
        <img src="../images/banner-panaderia.jpg" class="img-responsive" style="width: 100%;height: 300px"/>
        <h3 style="text-align: center;margin-top: 30px;margin-bottom: 30px; color: #5F4C0B"" >PEDIDO DE PANES </h3>        
</div>
<div class="container">
      
    <div class="row" style="margin-top:20px">
        <div class="col-4">
            Selección de cliente
        </div>
        <div class="col-2">
            Antiguedad
        </div>
        <div class="col-2">
            Fecha de compra
        </div>
        <div class="col-2">
            Usuario
        </div>
    </div>
    <!-- Datos del cliente -->
    <div class="row" style="margin-top:10px">
        <div class="col-4">
            <select name ="idcli" id="idcli" class="form-control" >
                <?php
                    include_once '../controlador/controlador_cliente.php';
                    combo_clientes();
                ?>
            </select>
        </div>
        <div class="col-2">
                <div id="mostrar">
                
                </div>            
        </div>
        <div class="col-2">
            <input type="date" value="<?php echo date('Y-m-d');  ?>" id="fecha" name="fecha" class="form-control">
        </div>
        <div class="col-2">
            <input type="text" class="form-control" value="<?php  echo $_SESSION['usuario']; ?>" readonly >
           
        </div>
        <div class="col-2" style="text-align:right">
                <button onclick="location.href='../controlador/controlador_pedido.php?opcion=1';" style="border: 1px solid #BDBDBD;" ><img src="../images/regresar.png" height="35" width="60">  </button>
                
        </div>
    </div>

    <!-- Item de pedido -->
    <div class="row" style="margin-top:20px; color:blue;">
        <div class="col-4">
            Selección de pan
        </div>
        <div class="col-2">
            Cantidad
        </div>
        <div class="col-2">
            Descuento (%)
            
        </div>
    </div>

    <form class="form-horizontal" id="lineaForm" >
        <div class="row" id="forma" style="margin-top:10px">
            <div class="col-4">
                <select name ="idpane" id="idpane" class="form-control" >
                    <?php
                        include_once '../controlador/controlador_pan.php';                    
                        combo_panes();
                    ?>
                </select>
            </div>
            <div class="col-2">
                <input type="number" min=1 value="1" id="txtCan" name="txtCan" class="form-control">
            </div>
            <div class="col-2">
                <div id="descuento">
                   0.00
                </div>
                
            </div>
            <div class="col-2">
                <a class="btn btn-secondary" id="div-btn1" href="#">Aceptar</a>
            </div>
            
        </div>
    </form>
    <div class="row" style="margin-top:20px">
        <div id="content" class="col-lg-12">
            
            <div id="central">
                
            </div>
        </div>
    </div>
    <div class="row" id="btn" style="margin-top:15px;">
        <div class="col-3">
                <button class="btn btn-primary" onclick="grabar_pedido(<?php if (isset($_SESSION['total_pedido'])) {echo $_SESSION['total_pedido'];} else{echo 0;} ?>);" >Grabar pedido</button>
        </div>

    </div>
</div>



</body>
<footer>
    <br>
    Todos los derechos reservados david basantes
    </footer>
</html>
