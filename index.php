<?php
	require("./php/conexion.php");
	require("./php/clases.php");
	require("./php/seguridad.php");
	if(!empty($_GET['fail'])){
		$_SESSION["usuario"]=NULL;
	}
	if (!empty($_GET["option"]&&$_SESSION["usuario"]!=NULL)) {
		$_SESSION["usuario"]->conexion=conectar();
		$_SESSION["usuario"]->cerrar_sesion();
		$_SESSION["usuario"]=NULL;   
	}
	if($_SESSION["usuario"]!=NULL){
		verificar_index();
	}
?>
<!DOCTYPE html>
<html lang="zxx" class="no-js">
<head>	
	<meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
	<link rel="shortcut icon" href="img/fav.png">
	<meta name="author" content="colorlib">
	<meta name="description" content="">
	<meta name="keywords" content="">
	<meta charset="UTF-8">
	<title>Proyecto</title>
	<link rel="stylesheet" href="css/bootstrap.css">	
	<link rel="stylesheet" href="css/main.css">
	<link rel="stylesheet" href="css/estilos.css">
</head>
<body>
	<div class="container">
		<section class="banner-area relative">				
			<div class="container">
				<div class="row fullscreen align-items-center justify-content-between">
					<div class="col-lg-4 col-md-6 banner-right">
						<ul class="nav nav-tabs" id="myTab" role="tablist">
						  	<li class="nav-item">
							   <a class="nav-link <?php if(empty($_GET['link'])){echo 'active';}?>" id="flight-tab" data-toggle="tab" href="#flight" role="tab" aria-controls="flight" aria-selected="true">Iniciar Sesión</a>
							</li>
							<li class="nav-item">
							   <a class="nav-link <?php if(!empty($_GET['link'])){echo 'active';}?>" id="hotel-tab" data-toggle="tab" href="#hotel" role="tab" aria-controls="hotel" aria-selected="false">Registrarse</a>
							</li>
						</ul>
						<div class="tab-content" id="myTabContent">
							<div class="tab-pane fade <?php if(empty($_GET['link'])){echo 'show active';}?>" id="flight" role="tabpanel" aria-labelledby="flight-tab">
								<form class="form-wrap" action="./php/control.php" method="post">
									<input type="text" class="form-control" name="usuario" placeholder="Usuario" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Usuario'" required>									
									<input type="password" class="form-control" name="password" placeholder="Contraseña" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contraseña'" required>			
									<button type="submit" name="add_user"  class="primary-btn text-uppercase">Ingresar</button>									
								</form>
							</div>
							<div class="tab-pane fade <?php if(!empty($_GET['link'])){echo 'show active';}?>" id="hotel" role="tabpanel" aria-labelledby="hotel-tab">
								<form class="form-wrap" action="./php/registrar.php" method="post" onsubmit="return validar();">									<input type="text" class="form-control" id="usuario" name="usuario" placeholder="Usuario" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Usuario'" >
									<input type="text" class="form-control" id="nombre" name="nombre" placeholder="Nombre" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Nombre'" onkeypress="return soloLetras(event)">					
									<input type="text" class="form-control" id="apellido" name="apellido" placeholder="Apellido" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Apellido'" onkeypress="return soloLetras(event)">				
									<input type="text" class="form-control" name="email" placeholder="Correo electrónico" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Correo electrónico'" pattern="[A-Za-z0-9._%+-]+@[A-Za-z0-9.-]+\.[A-Za-z]{1,63}$" required>
									<input type="text" id="celular" class="form-control" name="celular" placeholder="Celular" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Celular'" >
									<input type="password" id="password" class="form-control" name="password" placeholder="Contraseña " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Contraseña'" >
									<input type="password" class="form-control" id="password2" name="password2" placeholder="Repetir contraseña " onfocus="this.placeholder = ''" onblur="this.placeholder = 'Repetir contraseña '" >
									<input type="search" list="listapaises" class="form-control" name="pais" placeholder="Pais" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Pais'" >
									<input type="text" class="form-control" name="patrocinador" placeholder="Patrocinador" onfocus="this.placeholder = ''" onblur="this.placeholder = 'Patrocinador'" value="<?php echo $_GET['link'];?>" >				
									<button type="submit" name="add_user"  class="primary-btn text-uppercase">Registrar</button>			
								</form>

							</div>
						</div>
					</div>
				</div>
			</div>					
		</section>
	</div>
	<?php require('./pagina/paises.php');?>
	<script src="./js/jquery-2.2.4.min.js"></script>
	<script src="./js/script.js"></script>
	<script src="./js/bootstrap.min.js"></script>
	<script src="./js/validar.js"></script>
	<?php 
		if(!empty($_GET['ban'])){
			echo "<script type='text/javascript'>
				janelaPopUp.abre('Baneado','p red','Usuario Baneado','El usuario ".$_GET['ban']." esta banedo en la pagina, contactese con un administrador.',undefined,undefined,'Cancelar','Aceptar');
			</script>";
		}
	?>					
	</body>
</html>	
					