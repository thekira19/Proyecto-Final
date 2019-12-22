<?php
	class  usuarios{
  		public $idUsuario;
  		public $usuario;
  		public $nombre;
  		public $apellido;
  		public $email;
  		public $celular;
  		public $nivel;
  		public $password;
  		public $pais;
  		public $inicio;
  		public $fin;
  		public $patrocinador;
  		public $estado;
  		public $conexion;

  		public function __construct($conexion)
  		{
  	 		 $this->conexion=$conexion;
  		}
  		public function constructor($usuario,$nombre,$apellido,$email,$celular,$nivel,$password,$pais,$patrocinador)
  		{
      		$this->usuario=$usuario;
      		$this->nombre=$nombre;
      		$this->apellido=$apellido;
      		$this->email=$email;
      		$this->celular=$celular;
      		$this->nivel=$nivel;
      		$this->password=password_hash($password, PASSWORD_DEFAULT,['cost'=>10]);
      		$this->pais=$pais;
      		$this->patrocinador=$patrocinador;
      		$this->estado=1;
  		}
      public function conectar(){
          $consulta="SELECT * FROM usuarios WHERE usuario='$this->usuario' and password='$this->password'";
          $registro=mysqli_query($this->conexion,$consulta);
          $this->conexion->close();
          $validar=mysqli_num_rows($registro);
         if($validar!=0){
            $reg=mysqli_fetch_array($registro);
            $this->idUsuario=$reg['idUsuario'];
            $this->usuario=$reg['usuario'];
            $this->nombre=$reg['nombre'];
            $this->apellido=$reg['apellido'];
            $this->email=$reg['email'];
            $this->celular=$reg['celular'];
            $this->nivel=$reg['nivel'];
            $this->password=$reg['password'];
            $this->pais=$reg['pais'];
            $this->patrocinador=$reg['patrocinador'];
            $this->inicio=$reg['inicio'];
            $this->fin=$reg['fin'];
            $this->estado=$reg['estado'];
            return true;
          }else{
            return false;
          }
      }
  		public function iniciar_sesion($usuario,$password)
  		{
  			 $consulta="SELECT * FROM usuarios WHERE usuario='$usuario'";
			   $registro=mysqli_query($this->conexion,$consulta);
			   $validar=mysqli_num_rows($registro);
			   if($validar!=0){
            $reg=mysqli_fetch_array($registro);
            if(password_verify($password, $reg['password'])){
              $this->idUsuario=$reg['idUsuario'];
	  			    $this->usuario=$reg['usuario'];
      			  $this->nombre=$reg['nombre'];
      			  $this->apellido=$reg['apellido'];
      			  $this->email=$reg['email'];
      			  $this->celular=$reg['celular'];
      			  $this->nivel=$reg['nivel'];
      			  $this->password=$reg['password'];
      			  $this->pais=$reg['pais'];
      			  $this->patrocinador=$reg['patrocinador'];
              $this->inicio=$reg['inicio'];
              $this->fin=$reg['fin'];
      			  $this->estado=1;
              $this->activo();
      			  return true;
            }
            $this->conexion->close();
            return false;
			   }else{
            $this->conexion->close();
				    return false;
			   }
  		}
  		public function cerrar_sesion()
  		{
  			mysqli_query($this->conexion,"UPDATE usuarios SET estado=0 WHERE idUsuario=$this->idUsuario") or die("Problemas en consulta:".mysqli_error());
        $this->conexion->close();
  		}
  		public function eliminar($id)
  		{
        	$consulta="DELETE FROM usuarios WHERE id=$id";
        	$resultado=mysqli_query($this->conexion,$consulta);
          $this->conexion->close();  
  		}
  		public function actualizar()
  		{
        	$consulta="UPDATE usuarios SET usuario='$this->usuario',nombre='$this->nombre',apellido='$this->apellido',email=$this->email,celular='$this->celular',nivel=$this->nivel,password='$this->password',pais='$this->pais',inicio='$this->inicio',fin='$this->fin',patrocinador='$this->patrocinador' WHERE idUsuario=$this->idUsuario";
        	$resultado=mysqli_query($this->conexion,$consulta);
          $this->conexion->close();
  		}
  		public function insertar()
  		{
         $consulta="SELECT * FROM usuarios WHERE usuario='$this->usuario'";
         $registro=mysqli_query($this->conexion,$consulta);
         $validar=mysqli_num_rows($registro);
         if($validar){
            $this->conexion->close();
            return false;
         }
         $consulta="SELECT * FROM usuarios WHERE usuario='$this->patrocinador'";
         $registro=mysqli_query($this->conexion,$consulta);
         $validar=mysqli_num_rows($registro);
         if(!$validar){
            $this->conexion->close();
            return false;
         }
         $reg=mysqli_fetch_array($registro);
         $id=$reg['idUsuario'];
      	$consulta="INSERT INTO usuarios (usuario,nombre,apellido,email,celular,nivel,password,pais,patrocinador) VALUES ('$this->usuario','$this->nombre','$this->apellido','$this->email','$this->celular',$this->nivel,'$this->password','$this->pais','$this->patrocinador')";
      	$resultado=mysqli_query($this->conexion,$consulta)or die("Problemas al insertar nuevo Usuario:".mysqli_error());
        $this->iniciar_sesion($this->usuario,$this->password);
        $this->conexion=conectar();
        $this->conectar();
        $this->conexion=conectar();
        $consulta="INSERT INTO referidos(idPatrocinador,idReferido) VALUES ($id,$this->idUsuario)";
        $resultado=mysqli_query($this->conexion,$consulta)or die("Problemas al insertar Referidos:".mysqli_error());
          $this->conexion->close();
          return true;
  		}
  		public function mis_referidos()
  		{
    		$i=0;
    		$registro=mysqli_query($this->conexion,"SELECT usuarios.idUsuario,usuarios.usuario,usuarios.nombre,usuarios.apellido,usuarios.celular,usuarios.email,usuarios.nivel FROM referidos JOIN usuarios ON referidos.idReferido=usuarios.idUsuario WHERE referidos.idPatrocinador=$this->idUsuario") or die("Problemas en consulta:");
        $this->conexion->close();
    		while($reg=mysqli_fetch_array($registro)){
        		$datos[$i]["idUsuario"]=$reg['idUsuario'];
            $datos[$i]["usuario"]=$reg['usuario'];
        		$datos[$i]["nombre"]=$reg['nombre'];
        		$datos[$i]["apellido"]=$reg['apellido'];
        		$datos[$i]["email"]=$reg['email'];
        		$datos[$i]["nivel"]=$reg['nivel'];
        		$datos[$i++]["celular"]=$reg['celular'];
    		}
    		return $datos;
  		}
      public function all_datos()
      {
        $i=0;
        $registro=mysqli_query($this->conexion,"SELECT * FROM usuarios") or die("Problemas en consulta: de all_datos");
        $this->conexion->close();
        while($reg=mysqli_fetch_array($registro)){
            $datos[$i]["idUsuario"]=$reg['idUsuario'];
            $datos[$i]["usuario"]=$reg['usuario'];
            $datos[$i]["nombre"]=$reg['nombre'];
            $datos[$i]["apellido"]=$reg['apellido'];
            $datos[$i]["email"]=$reg['email'];
            $datos[$i]["nivel"]=$reg['nivel'];
            $datos[$i]["password"]=$reg['password'];
            $datos[$i]["pais"]=$reg['pais'];
            $datos[$i]["inicio"]=$reg['inicio'];
            $datos[$i]["fin"]=$reg['fin'];
            $datos[$i]["patrocinador"]=$reg['patrocinador'];
            $datos[$i]["estado"]=$reg['estado'];
            $datos[$i++]["celular"]=$reg['celular'];
        }
        return $datos;
      }
  		public function actualizar_nivel($id,$nivel,$fecha_inicio,$fecha_fin)
  		{
        	if($fecha_inicio!=NULL){
            $val=$this->editar($id);
              $this->conexion=conectar();
              if($val['inicio']==NULL){
                $result=mysqli_query($this->conexion,"UPDATE usuarios SET nivel=$nivel,inicio='$fecha_inicio',fin='$fecha_fin' WHERE idUsuario=$id");
              }else{
                  $result=mysqli_query($this->conexion,"UPDATE usuarios SET nivel=$nivel,fin='$fecha_fin' WHERE idUsuario=$id");
              }
          }else{
            $result=mysqli_query($this->conexion,"UPDATE usuarios SET nivel=$nivel,fin='$fecha_fin' WHERE idUsuario=$id");
          }
          $this->conexion->close();
  		}
  		public function editar($id)
  		{
      		$registro=mysqli_query($this->conexion,"SELECT * FROM usuarios WHERE idUsuario=$id") or die("Problemas en consulta: editar().".mysqli_error());
          $this->conexion->close();
        	while($reg=mysqli_fetch_array($registro)){
            $datos["idUsuario"]=$reg['idUsuario'];
            $datos["usuario"]=$reg['usuario'];
            $datos["nombre"]=$reg['nombre'];
            $datos["apellido"]=$reg['apellido'];
            $datos["email"]=$reg['email'];
            $datos["nivel"]=$reg['nivel'];
            $datos["password"]=$reg['password'];
            $datos["pais"]=$reg['pais'];
            $datos["inicio"]=$reg['inicio'];
            $datos["fin"]=$reg['fin'];
            $datos["patrocinador"]=$reg['patrocinador'];
            $datos["estado"]=$reg['estado'];
            $datos["celular"]=$reg['celular'];
        	}
      		return $datos;
  		}
  		public function actualizar_usuario($id,$usuario,$nombre,$apellido,$email,$celular,$pais,$fin,$nivel,$patrocinador)
  		{
          $val=$this->editar($id);
          $this->conexion=conectar();
          if($val['nivel']!=$nivel){
      		    if($nivel==4||$nivel==5){
                $date = new DateTime();
                $date->modify('-5 hours');
                $fin=$date->format('Y-m-d H:i:s');
              }
              else if($nivel==1){
                $date = new DateTime();
                $date->modify('-5 hours');
                $date->modify('+30 days');
                $fin=$date->format('Y-m-d H:i:s');
              }
          }
          $registro=mysqli_query($this->conexion,"UPDATE usuarios SET usuario='$usuario',nombre='$nombre',apellido='$apellido',email='$email',celular='$celular',pais='$pais',fin='$fin',nivel=$nivel,patrocinador='$patrocinador' WHERE idUsuario=$id") or die("Problemas en consulta: actualizar()".mysqli_error());
          $this->conexion->close();
  		}
  		public function activo()
  		{
				mysqli_query($this->conexion,"UPDATE usuarios SET estado=1 WHERE idUsuario=$this->idUsuario") or die("Problemas en consulta:".mysqli_error());
        $this->conexion->close();	
  		}
      public function off($id)
      {
        mysqli_query($this->conexion,"UPDATE usuarios SET estado=0 WHERE idUsuario=$id") or die("Problemas en consulta: en usuario->off()".mysqli_error());
        $this->conexion->close();  
      }
	}
?>

