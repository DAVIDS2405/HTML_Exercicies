<?php
include_once '../modelo/modelo_foto.php';

//Obtener la variable
$xop = $_GET['opcion'];

switch ($xop){
    case 1:
        listado_foto();
        break;
    case 2:
        ingresar_foto();
        listado_foto();
        break;        
    case 3:
        editar_foto();        
        break;
    case 4:
        modificar_foto();        
        listado_foto();
        break;
    case 5:
        eliminar_foto();        
        listado_foto();
        break;    
}
function listado_foto(){
    $reg = new modelo_foto();
    $RegistroFotos = $reg ->Listadofotos();    
    include_once '../vista/vista_foto.php';
}
function editar_foto(){
    $xid = $_GET['id'];    
    $reg = new modelo_foto();
    $Registrofotos = $reg-> editar_foto($xid);    
    include_once '../Vista/vista_edi_foto.php';
}

function ingresar_foto(){    
    $xdes = $_POST['txtDes'];
    $xidcli = $_POST['idcli'];
    $ximg = $_FILES['txtImg']['name'];
    
    $xfec = Date('Y-m-d');
    $xest = 'A';
    
    $reg = new modelo_foto();
    $reg ->setDes($xdes);
    $reg ->setImg($ximg);
    $reg->setIdcli($xidcli);
    $reg ->setFec($xfec);
    $reg ->setEst($xest);
    
    $ruta = $_FILES['txtImg']['tmp_name'];
    $destino = '../Fotos/';
    
    //Subimos y preguntamos si está OK
    if (!copy($ruta, $destino.$ximg)){
        echo 'Subida de imagen fallida';
    }    
    $reg->ingresar_foto();    
}

function modificar_foto(){  
    
    $xid = $_POST['txtId'];
    $xdes = $_POST['txtDes'];
    $ximg = $_FILES['txtImg']['name'];
    $xidcli = $_POST['idcli'];
    $xfec = $_POST['txtFec'];
    $xest = $_POST['txtEst'];
    
    $reg = new modelo_foto();
    $reg ->setId($xid);
    $reg ->setDes($xdes);
    $reg->setIdcli($xidcli);
    $reg ->setImg($ximg);
    $reg ->setFec($xfec);
    $reg ->setEst($xest);
    
    $ruta = $_FILES['txtImg']['tmp_name'];
    $destino = '../Fotos/';
    //Subimos y preguntamos si está OK
    if (!copy($ruta, $destino.$ximg)){
        echo 'Subida de imagen fallida';
    }    
    $reg->modificar_foto();    
}

function eliminar_foto(){
    $xid = $_GET['id'];    
    $reg = new modelo_foto();
    $reg-> eliminar_foto($xid);    
    
}

?>

