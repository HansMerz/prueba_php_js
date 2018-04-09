<?php 
include ("../config/config.php"); 
$sql = "SELECT * FROM datos WHERE id = (SELECT MAX(id) FROM datos)";
$rs = mysqli_query($link, $sql) or die("Error al intentar ejecutar la instrucción SQL ".mysql_error());
if($rs) {
?>
<h4 class="lead"><strong>PERSONA REGISTRADA</strong></h4>
  <table id="tblRegistros" width="724" border="1">
    <tr>
      <th>ID</th>
      <th>Nombre</th>
      <th>Teléfono</th>            
    </tr>
   <?php while($row = mysqli_fetch_array($rs)) { ?>
    <tr>
      <td><?php echo $row["id"]; ?></td>
      <td><?php echo $row["nombre"]; ?></td>
      <td><?php echo $row["tel"]; ?></td>      
    </tr>
 
	<?php
     }
	 ?>
  </table>
<?php
	} else {
		echo '<p>No hay registros para mostrar</p>';
	}
	mysqli_close($link);
?>