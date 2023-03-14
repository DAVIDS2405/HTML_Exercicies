<?php
session_start();
include_once '../modelo/modelo_recojo.php';

$xop = $_GET['opcion'];

switch ($xop){
    case 1:
        listar_recojos();
        break;
    case 4:
        registro_recojo();
        listar_recojos();
        break;
    case 5:
        eliminar_recojo();
        listar_recojos();
        break;    

    case 10:
        listar_pedidos_recojos();
        break;
    case 11:
        listar_pedidos_detalle();
        break;            
}


function listar_recojos(){
    //ir al modelo y obtener los datos del clientes
    //$reg es un objeto
    $reg = new modelo_recojo();
    $RegistrosRecojos = $reg->listar_recojos();
    //Mostrar los datos en la vista
    include_once '../vista/vista_recojos.php';   
}

function registro_recojo(){   
    $xped = $_GET['idped'];
    $reg = new modelo_recojo();
    $reg->setIdped($xped);
    
    $reg->registro_recojo();    
}


function listar_pedidos_recojos(){
  
    //$reg es un objeto
    $reg = new modelo_recojo();
    $RegistrosRecojos = $reg->listar_pedidos_recojos();
    //Mostrar los datos en la vista
    include_once '../vista/vista_pedidos_recojos.php';   
}

function eliminar_recojo(){
    $xid = $_GET['id'];    
    $reg = new modelo_recojo();
    $reg-> eliminar_recojo($xid);    
}




function listar_pedidos_detalle(){
    $xid=$_GET['id'];
    $_SESSION['nro_pedido']=$xid;    
    $reg = new modelo_recojo();
    $RegistrosRecojos = $reg ->ListadoPedidosDetalles($xid);    
    include_once '../vista/vista_pedidos_detalles.php';
}

?>
