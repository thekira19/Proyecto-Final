<?php

function conectar(){
	$localhost="localhost";
	$user="root";
	$pass="cesar12345";
	$db_nombre="asd";
	$con = new mysqli($localhost,$user,$pass,$db_nombre);
	if ($con->connect_error) {
    	die("Connection failed: " . $conn->connect_error);
	}
	return $con;
}
?>