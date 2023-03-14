<?php session_start();
include_once '../modelo/modelo_pedido.php';

$xop = $_GET['opcion'];

switch ($xop){
    case 1:
        listar_pedidos();
        break;
    case 4:
        registro_pedido();
        listar_pedidos();
        break;
    case 5:
        eliminar_pedido();
        listar_pedidos();
        break;  
     
}

function registro_pedido(){
   
    $cli=$_GET['idcli'];
    $fec=$_GET['fec'];
    $tot=$_GET['tot'];
    $est='A';
    
    $reg = new modelo_pedido();
    $reg->setIdcli($cli);
    $reg->setFec($fec);
    $reg->setTot($tot);
    $reg->setEst($est);

    $reg->registro_pedido();
    
    $registros= $reg->contar_pedidos();

    foreach ($registros as $fila){
        
        $xnp= $fila['cantidad'];
        
    }
    $reg -> actualizar($xnp);
}

function eliminar_pedido(){
    $xid = $_GET['id'];    
    $reg = new modelo_pedido();
    $reg-> eliminar_pedido($xid);    
}

function listar_pedidos(){
    //ir al modelo y obtener los datos del clientes
    //$reg es un objeto
    $reg = new modelo_pedido();
    $RegistrosPedidos = $reg->listar_pedidos();
    //Mostrar los datos en la vista
    include_once '../vista/vista_pedidos.php';   
}



?>
