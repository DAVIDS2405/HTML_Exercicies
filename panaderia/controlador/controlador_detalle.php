<?php
include_once '../modelo/modelo_detalle.php';

//Obtener la variable
$xop = $_GET['opcion'];

switch ($xop){
    case 1:                
        listado_detalle();
        break;
    case 2:        
        ingresar_detalle();       
        break;
    case 5:
        eliminar_detalle();
        //listado_detalle();
        break;
    case 12:       
        actualizar_pedido_detalle();
        break;
    case 13:
        listado_detalle2();
        break; 
}

function listado_detalle(){
    $reg = new modelo_detalle();
    $RegistrosPanes = $reg ->ListadoDetalles();    
    include_once '../vista/vista_detalles.php';
}

function listado_detalle2(){
    $xidped=$_GET['xped'];
    $reg = new modelo_detalle();
    $RegistrosPanes = $reg ->ListadoDetalles2($xidped);    
    include_once '../vista/vista_detalles2.php';
}

function ingresar_detalle(){    
    
    $xid = $_GET['idpan'];
    $xcan = $_GET['txtCan'];
    $xdescto = $_GET['txtDescto'];
           
    $reg = new modelo_detalle();
    $reg ->setIdpan($xid);
    $reg ->setCan($xcan);
    $reg ->setDescto($xdescto);
  
    $reg->ingresar_detalle(); 
  
}

function eliminar_detalle(){
    $id = $_GET['borrarId'];
    $reg = new modelo_detalle();
    $reg -> Eliminar_Detalle($id);    
    //include_once '../vista/vista_pedidos.php';
}


//Usado en el recojo de panes
function actualizar_pedido_detalle(){
    $xiddet = $_GET['iddet'];   
    $xidpan = $_GET['idpan'];    
    $xcanpan = $_GET['canpan'];    
   
    $reg = new modelo_detalle();
    $reg->setIddet($xiddet);
    $reg->setIdpan($xidpan);    
    $reg ->setCan($xcanpan);

    $reg-> actualizar_detalle();    
}
?>


