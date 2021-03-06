<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>CRUD</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<link rel="stylesheet" href="css/estilos.css">
	<script src = "../js/jquery-3.2.1.min.js"></script>	
	<script>
		$(document).ready(function(e) {				
		fondo($("#register"));				
			$("#register").click(function(){				
				
				$("#nombre").show();
				$("#tel").show();							
				fondo($("#register"));
				$("#btn").attr("value", "Registrar");
				$("#titulo").text("Registro de persona");
			});
			$("#search").click(function(){				
				
				$("#nombre").show();
				$("#tel").hide();				
				fondo($("#search"));
				$("#btn").attr("value", "Buscar");
				$("#titulo").text("Busqueda de persona");
			});
			$("#update").click(function(){				
				
				$("#nombre").show();
				$("#tel").show();													
				fondo($("#update"));
				$("#btn").attr("value", "Actualizar");	
				$("#titulo").text("Actualización de persona");
			});
			$("#delete").click(function(){				
				
				$("#nombre").show();
				$("#tel").hide();					
				fondo($("#delete"));				
				$("#btn").attr("value", "Eliminar");
				$("#titulo").text("Eliminación de persona");	
			});
			$("#btn").click(function(){				
					var url = "";
					var destino = ""; 
					if($("#btn").val() == "Registrar"){
						if($("#nombre").val().length == 0){
							alert("Ingresa el nombre por favor");
						}else if($("#tel").val().length == 0){
							alert("Ingresa el teléfono");
						}else{
							url = "insertar.php";
							destino = "views/insertar.view.php";
						}
					}else if($("#btn").val() == "Actualizar"){
						url = "buscar.php";
						destino = "views/actualizar.view.php";
					}else if($("#btn").val() == "Buscar"){
						if($("#nombre").val().length == 0){
							alert("Ingresa el ID para buscar");
						}else{							
							url = "buscar.php";
							destino = "views/buscar.view.php";
						}
					}else if($("#btn").val() == "Eliminar"){
						if($("#btn").val().length == 0){
							alert("Ingresa el ID para eliminar");
						}else{
							url = "eliminar.php";
							destino = "views/eliminar.view.php";
						}						
					}

					$.ajax({
						url: url,
						type: 'POST',
						data: $("#frmDatos").serialize(),
						dataType: 'json', 
						success: function(data){
							console.log(data.nombre);
							if(data.res == "si"){
								alert(data.msj);
								$("#mostrar").load(destino);
							}else{
								alert("Registro no guardado");
							}
						}, 
						error: function(){
							alert("Upppppps! Ocurrió un error");
						} 
					});				
				return false;
			});

		});
		function fondo(x){
			$("#search").removeClass("activo");
			$("#register").removeClass("activo");
			$("#update").removeClass("activo");
			$("#delete").removeClass("activo");
			x.addClass("activo");
		}		
	</script>
</head>
<body>
	<h2 class="display-2" id="titulo">Registro de persona</h2>	
	<hr>
    <div class="col" id="botones">
    	<button id="register" class="btnReg">Registrar</button>
    	<button id="search" class="btnBus">Buscar</button>
    	<button id="update" class="btnAct">Actualizar</button>
    	<button id="delete" class="btnEli">Eliminar</button>
    </div>
    <div class="container-fluid" id="form">
        <form action="" method="post" id="frmDatos">        	
            <input type="text" name="nombre" id="nombre"  placeholder="Nombre:"/>
            <input type="number" name="tel" id="tel" placeholder="Teléfono"/>
            <input type="submit" class="btn btn-primary" name="btn" id="btn" value="Registrar"/>
        </form>
        
    </div>
    <div id="mostrar">
    	
    </div>
</body>
</html>