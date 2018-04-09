<?php

class conexion extends PDO{
    
    function __construct(){
        try {
            $db = new PDO('mysql:host=localhost; dbname=prueba','root','usbw');
            echo "Conexiòn establecida";
        } catch (Exception $e) {
            die("Error ". $e->GetMessage());
        }
        
    }
    
}