<?php
include_once '../modelo/modelo_pan.php';

//Obtener la variable
$xop = $_GET['opcion'];

switch ($xop){
    case 1:
        listado_pan();
        break;
    case 2:
        ingresar_pan();
        listado_pan();
        break;        
    case 3:
        editar_pan();        
        break;
    case 4:
        modificar_pan();        
        listado_pan();
        break;
    case 5:
        eliminar_pan();        
        listado_pan();
        break;    
}
function listado_pan(){
    $reg = new modelo_pan();
    $RegistrosPanes = $reg ->ListadoPanes();    
    include_once '../vista/vista_panes.php';
}
function editar_pan(){
    $xid = $_GET['id'];    
    $reg = new modelo_pan();
    $RegistrosPanes = $reg-> editar_pan($xid);    
    include_once '../Vista/vista_edi_pan.php';
}

function eliminar_pan(){
    $xid = $_GET['id'];    
    $reg = new modelo_pan();
    $reg-> eliminar_pan($xid);    
    
}


function ingresar_pan(){    
    $xnom = $_POST['txtNom'];
    $xdes = $_POST['txtDes'];
    $xpre = $_POST['txtPre'];
    $ximg = $_FILES['txtImg']['name'];
    $xest = 'A';
    
    $reg = new modelo_pan();
    $reg ->setNom($xnom);
    $reg ->setDes($xdes);
    $reg ->setPre($xpre);
    $reg ->setImg($ximg);
    $reg ->setEst($xest);
    
    $ruta = $_FILES['txtImg']['tmp_name'];
    $destino = '../Fotos/Pan/';
    
    //Subimos y preguntamos si está OK
    if (!copy($ruta, $destino.$ximg)){
        echo 'Subida de imagen fallida';
    }    
    $reg->ingresar_pan();    
}

function modificar_pan(){  
    
    $xid = $_POST['txtId'];
    $xnom = $_POST['txtNom'];
    $xdes = $_POST['txtDes'];
    $xpre = $_POST['txtPre'];
    $ximg = $_FILES['txtImg']['name'];
    $xest = $_POST['txtEst'];
    
    $reg = new modelo_pan();
    $reg ->setId($xid);
    $reg ->setNom($xnom);
    $reg ->setDes($xdes);
    $reg ->setPre($xpre);
    $reg ->setImg($ximg);
    $reg ->setEst($xest);
    
    $ruta = $_FILES['txtImg']['tmp_name'];
    $destino = '../Fotos/Pan/';
    //Subimos y preguntamos si está OK
    if (!copy($ruta, $destino.$ximg)){
        echo 'Subida de imagen fallida';
    }    
    $reg->modificar_pan();    
}

function combo_panes(){
    $reg= new modelo_pan();
    $panes = $reg ->ListadoPanes();
    
    foreach ($panes as $fila){                
        echo "<option value=".$fila['id_pan'].">".$fila['nom_pan']."</option>";                
    }
}

?>

