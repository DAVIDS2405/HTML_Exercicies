<?php
session_start();
include_once '../modelo/modelo_cliente.php';

$xop = $_GET['opcion'];

switch ($xop){
    case 1:
        listar_clientes();
        break;
    case 4:
        registro();
        break;
    case 5:
        eliminar_cliente();                
        listar_clientes();
        break;
    case 6:
        buscar_cliente();
        break;
    case 10;
        buscar_descuento();
        break;
}

function registro(){
   
    $tipo=$_GET['txtTipo'];
    $nro=$_GET['txtNro'];
    $nom=$_GET['txtNombre'];
    $correo=$_GET['txtCorreo'];
    $dir=$_GET['txtDir'];
    $usu=$_GET['txtUsuario'];
    $cla=$_GET['txtContra'];
    $iddis=1;
    $fec=date('Y-m-d');
    $est='A';

    $reg = new modelo_cliente();
    $reg->setTipo($tipo);
    $reg->setNro($nro);
    $reg->setNom($nom);
    $reg->setCorreo($correo);
    $reg->setDir($dir);
    $reg->setIddis($iddis);
    $reg->setUsu($usu);
    $reg->setCla($cla);
    $reg->setFec($fec);
    $reg->setEst($est);

    $reg->registro();
    header('Location: ../index.html');
}

function listar_clientes(){
    //Ir al modelo y obtener los datos del clientes
    //$reg es un objeto
    $reg = new modelo_cliente();
    $registros = $reg->listar_clientes();
    //Mostrar los datos en la vista
    include_once '../vista/vista_clientes.php';   
}

function eliminar_cliente(){
    $xid = $_GET['id'];    
    $reg = new modelo_cliente();
    $reg-> eliminar_cliente($xid);    
    
}

function buscar_cliente(){
    $xid = $_GET['idcli'];    
    $reg = new modelo_cliente();
    $data = $reg-> buscar_cliente($xid);    
    foreach($data as $reg){        
        $fec= $reg['fec_reg'];         
    }    
    echo intval(date('Y-m-d')) - intval(date("Y", strtotime($fec))) ." años";    
}

function buscar_descuento(){
    $xidcli = $_GET['idcli'];
    $xidpan = $_GET['idpan'];    
    $reg = new modelo_cliente();
    $data = $reg-> buscar_descuento($xidcli, $xidpan);    
    foreach($data as $reg){        
        $descto = $reg['descuento'];         
    }
    if (isset($descto))    
        echo $descto;    
}




function combo_clientes(){
    $reg= new modelo_cliente();
    $clientes = $reg ->listar_clientes();
    
    foreach ($clientes as $fila){                
        echo "<option value=".$fila['id_cliente'].">".$fila['nombre']."</option>";                
    }
}

function combo_clientes2($cli){    
    $reg= new modelo_cliente();
    $clientes = $reg ->listar_clientes();
    
    foreach ($clientes as $fila){
        if ($cli == $fila['nombre']){
            echo "<option value=".$fila['id_cliente']." selected >".$fila['nombre']."</option>";
        }else{
            echo "<option value=".$fila['id_cliente'].">".$fila['nombre']."</option>";
        }
        
    }
}

?>
