<?php

    include 'http://localhost:8090/panaderia/modelo/modelo_tablas.php';

    function listado_usuarios(){
        $reg = new modelo_tablas();
        $usuarios = $reg->listado_usuarios();
        foreach($usuarios as $fila){
            echo '<option value='.$fila['id_usuario'].' >'.$fila['nom_usuario'].'</option>';
        }  
        
    }
    function listado_tipos(){
        $reg = new modelo_tablas();
        $tipos = $reg->listado_tipos();
        foreach($tipos as $fila){
            echo '<option value='.$fila['id_tipo'].' >'.$fila['nom_tipo'].'</option>';
        }  
        
    }

    function listado_roles(){
        $reg = new modelo_tablas();
        $tipos = $reg->listado_roles();
        foreach($tipos as $fila){
            echo '<option value='.$fila['id_rol'].' >'.$fila['nom_rol'].'</option>';
        }  
        
    }

    public function listado_roles2(){   
        echo '<option>Nose</option>';                     
    }

    public function listado_roles3($nomrol){   
        
        $reg = new modelo_tablas();
        $roles = $reg->listado_roles();
        foreach($roles as $fila){
            if ($nomrol == $fila['nom_rol']){
                echo '<option value='.$fila['id_rol'].' selected >'.$fila['nom_rol'].'</option>';
            }else{
                echo '<option value='.$fila['id_rol'].' >'.$fila['nom_rol'].'</option>';
            }            
        }           
    }

    function listado_distritos(){
        $reg = new modelo_tablas();
        $distritos = $reg->listado_distritos();
        foreach($distritos as $fila){
            echo '<option value='.$fila['id_dis'].' >'.$fila['nom_dis'].'</option>';
        }  
        
    }
    function listado_distritos2($nomdis){
        $reg = new modelo_tablas();
        $distritos = $reg->listado_distritos();
        foreach($distritos as $fila){
            if ($nomdis == $fila['nom_dis']){
                echo '<option value='.$fila['id_dis'].' selected >'.$fila['nom_dis'].'</option>';
            }else{
                echo '<option value='.$fila['id_dis'].' >'.$fila['nom_dis'].'</option>';
            }
            
        }  
        
    }
    
