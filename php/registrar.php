<?php 
	require("./conexion.php");
	require("./clases.php");
	require("./seguridad.php");
	if (empty($_POST["usuario"])||empty($_POST["nombre"])||empty($_POST["apellido"])||empty($_POST["email"])||empty($_POST["celular"])||empty($_POST["password"])||empty($_POST["password2"])||empty($_POST["pais"])||empty($_POST["patrocinador"])) {
		  header("Location: ./../");
	}else{
		$usuario=$_POST['usuario'];
		$nombre=$_POST['nombre'];
		$apellido=$_POST['apellido'];
		$email=$_POST['email'];
		$celular=$_POST['celular'];
		$password=$_POST['password'];
		$pais=$_POST['pais'];
		$patrocinador=$_POST['patrocinador'];

		$nombre=strtolower($nombre);
		$nombre=ucwords($nombre);
		$apellido=strtolower($apellido);
		$apellido=ucwords($apellido);

		$user=new usuarios(conectar());
		$user->constructor($usuario,$nombre,$apellido,$email,$celular,0,$password,$pais,$patrocinador);
		if($user->insertar()){
			$_SESSION["usuario"]=$user;
			$_SESSION["usuario"]->conexion=conectar();
			$_SESSION["usuario"]->activo();
			header("Location: ./../");
		}else{
			header("Location: ./../index.php?fail=1");
		}
	}
?>