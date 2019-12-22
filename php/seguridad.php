<?php
	session_start();
	function verificar(){
		if($_SESSION["usuario"]==NULL){
			header('Location: ./../../index.php?option=1');
		}
		else if($_SESSION["usuario"]->nivel==2){
			header('Location: ./../../admin/inicio/');
		}
		else if($_SESSION["usuario"]->nivel==3){
			header('Location: ./../../index.php?option=1&&ban='.$_SESSION["usuario"]->usuario);
		}
		else if($_SESSION["usuario"]->nivel==1||$_SESSION["usuario"]->nivel==0||$_SESSION["usuario"]->nivel==5||$_SESSION["usuario"]->nivel==4){
			header('Location: ./../../user/inicio/');
		}
		else{
			header('Location: ./../../index.php?option=1');	
		}
	}
	function verificar_index(){
		if($_SESSION["usuario"]==NULL){
			header('Location: ./index.php?option=1');
		}
		else if($_SESSION["usuario"]->nivel==2){
			header('Location: ./admin/inicio/');
		}
		else if($_SESSION["usuario"]->nivel==3){
			header('Location: ./index.php?option=1&&ban='.$_SESSION["usuario"]->usuario);	
		}
		else if($_SESSION["usuario"]->nivel==1||$_SESSION["usuario"]->nivel==0||$_SESSION["usuario"]->nivel==5||$_SESSION["usuario"]->nivel==4){
			header('Location: ./user/inicio/');
		}
		else{
			header('Location: ./index.php?option=1');	
		}
	}
	function verificar_sesion(){
		if($_SESSION['usuario']->estado==0){
			header('Location: ./../../index.php?option=1');
		}
	}
	function destruir_sesion(){
		if($_SESSION["usuario"]->nivel==NULL){
       		session_destroy();
       		header('Location: ./../../');
    	}
	}
?>