<?php

class conectar {
    public static function conexion(){
        try{
            //PDO es una librería
            $cnx = new PDO('mysql:host=localhost:3307;dbname=panaderia','root','');
            $cnx -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $cnx -> exec("SET CHARACTER SET UTF8");
            
        } catch (PDOException $ex) {
             echo 'Error de Base de datos : '.$ex ->getMessage();
             echo 'Linea de error : ' . $ex ->getLine();
        }    
        return $cnx;
    }
    
    public static function conexion_02(){
        try{
            //PDO es una librería
            $cnx_02 = new PDO('mysql:host=192.168.0.25;dbname=patente','remigio','');
            $cnx_02 -> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $cnx_02 -> exec("SET CHARACTER SET UTF8");
            
        } catch (PDOException $ex_02) {
             echo 'Error de Base de datos : '.$ex_02 ->getMessage();
             echo 'Linea de error : ' . $ex_02 ->getLine();
        }    
        return $cnx_02;
    }
}


