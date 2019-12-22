<?php
	require("./conexion.php");
	require("./clases.php");
	require("./seguridad.php");
	if (empty($_POST["usuario"])||empty($_POST["password"])) {
		  header('Location: ./../');
	}else{
		$user=new usuarios(conectar());
		$usuario=$_POST["usuario"];
		$password=$_POST["password"];
		if($user->iniciar_sesion($usuario,$password)){
			$_SESSION["usuario"]=$user;
			if($_SESSION["usuario"]->nivel==3){
				header('Location: ./../index.php?ban=1');
			}
			else if($_SESSION["usuario"]->nivel==2){
				header('Location: ./../admin/inicio/');
			}
			else{
				header('Location: ./../user/inicio/');
			}
		}else{
			$_SESSION["usuario"] = NULL;
			header('Location: ./../index.php');
		}
	}
?>

