<?php

class Conexion extends PDO{
    
    function __construct(){
        try {
            $db = new PDO('mysql:host=localhost; dbname=prueba','root','');
            echo "Conexiòn establecida";
        } catch (Exception $e) {
            die("Error ". $e->GetMessage());
        }
        
    }
    
}