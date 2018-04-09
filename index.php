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
				$("#id").hide();
				$("#nombre").show();
				$("#tel").show();							
				fondo($("#register"));
				$("#btn").attr("value", "Registrar");
				alert($("h2"));
			});
			$("#search").click(function(){				
				$("#id").show();
				$("#nombre").hide();
				$("#tel").hide();				
				fondo($("#search"));
				$("#btn").attr("value", "Buscar");
			});
			$("#update").click(function(){				
				$("#id").show();
				$("#nombre").show();
				$("#tel").show();													
				fondo($("#update"));
				$("#btn").attr("value", "Actualizar");	
			});
			$("#delete").click(function(){				
				$("#id").show();
				$("#nombre").hide();
				$("#tel").hide();					
				fondo($("#delete"));				
				$("#btn").attr("value", "Eliminar");	
			});
			$("#btn").click(function(){
				if($("#nombre").val().length == 0){
					alert("Ingresa el nombre por favor");
				}else if($("#tel").val().length == 0){
					alert("Ingresa el teléfono");
				}else{
					var url = "";
					var destino = ""; 
					if($("#btn").val() == "Registrar"){
						url = "insertar.php";
						destino = "views/insertar.view.php";
					}else if($("#btn").val() == "Actualizar"){
						url = "actualizar.php";
						destino = "views/actualizar.view.php";
					}else if($("#btn").val() == "Buscar"){
						url = "buscar.php";
						destino = "views/buscar.view.php";
					}else if($("#btn").val() == "Eliminar"){
						url = "eliminar.php";
						destino = "views/eliminar.view.php";
					}

					$.ajax({
						url: url,
						type: 'post',
						data: $("#frmDatos").serialize(),
						dataType: 'json', 
						success: function(data){
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
				}
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
	<h2 class="display-2">Registro de persona</h2>	
	<hr>
    <div class="col" id="botones">
    	<button id="register" class="btnReg">Registrar</button>
    	<button id="search" class="btnBus">Buscar</button>
    	<button id="update" class="btnAct">Actualizar</button>
    	<button id="delete" class="btnEli">Eliminar</button>
    </div>
    <div class="container-fluid" id="form">
        <form action="" method="post" id="frmDatos">
        	<input type="text" name="id" id="id" placeholder="ID:" >
            <input type="text" name="nombre" id="nombre"  placeholder="Nombre:"/>
            <input type="number" name="tel" id="tel" placeholder="Teléfono"/>
            <input type="submit" class="btn btn-primary" name="btn" id="btn" value="Registrar"/>
        </form>
        
    </div>
    <div id="mostrar">
    	
    </div>
</body>
</html>