<?php
include_once 'conexion.php';

class Acciones{
    
    public $nombre = "";
    public $tel = "";
    private $id = "";
    public function insertar(){
        $con = new Conexion();
        try {
            $resul = $con->prepare("INSERT INTO datos VALUES(null, :nom, :tel )");
            $resul->execute(array(":nom"=>$this->nombre, ":tel"=>$this->tel));  
            $sql2 = "SELECT LAST_INSERT_ID() FROM datos";
            $resul2->$con->prepare($sql2);
            $resul2->execute();
            $res = $resul2->fetch();
            $this->id = $res[0];
            return true;                      
    } catch (Exception $e) {
      echo "<p>Error al insertar datos</p>";
      return false;
    }
    }
    public function actualizar($id){
        $con = new Conexion();
        try {
      $sql = "UPDATE datos SET nombre = :nom, tel = :tel WHERE id = :id";
            $resul = $con->prepare($sql);
            $resul->execute(array(":nom"=>$this->nombre, ":tel"=>$this->tel, ":id"=>$id));                        
    } catch (Exception $e) {
      echo "<p>Error al actualizar datos</p>";
    }
    }
    public function buscar(){
        $con = new Conexion();
        
        try {
            $sql = "SELECT * FROM datos where id = ?";
            $resul = $con->prepare($sql);
            if ($resul->execute(array($this->id))) {
                while ($fila = $resul->fetch()) {
                    return $fila;
                }
            }           
             
    } catch (Exception $e) {
      echo "<p>Error al buscar datos</p>";
    }
    }
    public function eliminar($id){
        $con = new Conexion();
        try {
            $sql = "DELETE FROM datos WHERE id = ? ";
            $resul = $con->prepare($sql);
            $resul->execute(array($id));                                        
    } catch (Exception $e) {
      echo "<p>Error al eliminar</p>";
    }
    }
}
?>