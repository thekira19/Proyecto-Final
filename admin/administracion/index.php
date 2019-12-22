<?php
    require("./../../php/conexion.php");
    require("./../../php/clases.php");
    require("./../../php/seguridad.php");
    destruir_sesion();
    $_SESSION["usuario"]->conexion=conectar();
    $_SESSION['usuario']->conectar();
    verificar_sesion();
    if($_SESSION["usuario"]->nivel!=2){
        verificar();
    }
    if (!empty($_GET["id"])&&!empty($_GET["off"])) {
          $_SESSION["usuario"]->conexion=conectar();  
          $_SESSION["usuario"]->off($_GET["id"]); 
    }
    if (!empty($_POST["id"])&&!empty($_POST["usuario"])&&!empty($_POST["nombre"])&&!empty($_POST["apellido"])&&!empty($_POST["email"])&&!empty($_POST["celular"])&&!empty($_POST["pais"])&&!empty($_POST["patrocinador"])&&!empty($_POST["fecha"])&&!empty($_POST["hora"])&&!empty($_POST["nivel"])){
            $_SESSION["usuario"]->conexion=conectar();
            $id=$_POST["id"];
            $usuario=$_POST["usuario"];
            $nombre=$_POST["nombre"];
            $apellido=$_POST["apellido"];
            $email=$_POST["email"];
            $celular=$_POST["celular"];
            $pais=$_POST["pais"];

            $nombre=strtolower($nombre);
            $nombre=ucwords($nombre);
            $apellido=strtolower($apellido);
            $apellido=ucwords($apellido);

            $date = date('Y-m-d H:i:s', strtotime($_POST["fecha"].' '.$_POST["hora"]));
            $nivel=$_POST["nivel"];
            $patrocinador=$_POST["patrocinador"];
            $_SESSION['usuario']->actualizar_usuario($id,$usuario,$nombre,$apellido,$email,$celular,$pais,$date,$nivel,$patrocinador);
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Afiliados</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <?php require './../../pagina/css.php';?>
</head>
<body>
    <div class='navbar-lateral full-reset'>
        <div class='visible-xs font-movile-menu mobile-menu-button'></div>
        <div class='full-reset container-menu-movile custom-scroll-containers'>
            <div class='logo full-reset all-tittles'>
                <i class='visible-xs zmdi zmdi-close pull-left mobile-menu-button' style='line-height: 55px; cursor: pointer; padding: 0 10px; margin-left: 7px;'></i> 
                SISTEMAS
            </div>
            <div class='full-reset' style='background-color:#772626; padding: 10px 0; color:#fff;'>
                <figure>
                    <img src='./../../assets/img/logo.png' alt='Biblioteca' class='img-responsive center-box' style='width:55%;'>
                </figure>
                <p class='text-center' style='padding-top: 15px;'>SISTEMA</p>
            </div>
            <div class='full-reset nav-lateral-list-menu'>
                <ul class='list-unstyled'>
                    <?php 
                        require './../../pagina/inicio.php';
                        require './../../pagina/afiliados.php';
                        require './../../pagina/administracion.php';
                    ?>
                </ul>
            </div>
        </div>
    </div>
    <div class='content-page-container full-reset custom-scroll-containers'>
        <nav class='navbar-user-top full-reset'>
            <ul class='list-unstyled full-reset'>
                <li  class='tooltips-general exit-system-button' data-href='./../index.php?option=1' data-placement='bottom' title='Salir del sistema'>
                    <i class='zmdi zmdi-power'></i>
                </li>
                <li style='color:#fff; cursor:default;'>
                    <span class='all-tittles'>
                    <?php echo $_SESSION["usuario"]->usuario; ?>
                    </span>
                </li>
                <figure>
                   <img src='./../../assets/img/user01.png' alt='user-picture' class='img-responsive img-circle center-box'>
                </figure>
                
                <li class='mobile-menu-button visible-xs' style='float: left !important;'>
                    <i class='zmdi zmdi-menu'></i>
                </li>
                <li></li>
                <li>
                    <div id="clock">No Activado</div>
                </li>
            </ul>
        </nav>
        <div class="container-fluid">
            <h2 class="text-center all-tittles">Administrar Cuentas</h2>
            <div class="div-table">
                <div class="div-table-row div-table-head">
                    <div class="div-table-cell">#</div>
                    <div class="div-table-cell">Usuario</div>
                    <div class="div-table-cell">Nombre</div>
                    <div class="div-table-cell">Email</div>
                    <div class="div-table-cell">Celular</div>
                    <div class="div-table-cell">Pais</div>
                    <div class="div-table-cell">Fecha</div>
                    <div class="div-table-cell">Patrocinador</div>
                    <div class="div-table-cell">En Linea</div>
                    <div class="div-table-cell">Estado</div>
                </div>
                <?php
                    $_SESSION["usuario"]->conexion=conectar();  
                    $datos=$_SESSION["usuario"]->all_datos();
                    $size=count($datos);
                    for($i=0;$i<$size;$i++){
                ?>
                    <div class="div-table-row">
                        <div class="div-table-cell">
                            <?php echo $i+1;?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["usuario"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["nombre"].' '.$datos[$i]["apellido"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["email"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["celular"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["pais"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["fin"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php echo $datos[$i]["patrocinador"];?>
                        </div>
                        <div class="div-table-cell">
                            <?php 
                            if($datos[$i]["estado"]){
                            ?>
                                <button class="btn btn-success" onclick="janelaPopUp.abre('Activo','p green','Desconectar Usuario','¿Desea desconectar este usuario?',undefined,'./index.php?id=<?php echo $datos[$i]["idUsuario"];?>&off=1','No','Si')">On</button>
                            <?php
                            }else{
                            ?>
                                <button class="btn btn-danger">Off</button>
                            <?php
                            }
                            ?>
                        </div>
                        <div class="div-table-cell">
                        <?php
                        if($datos[$i]["nivel"]==5){
                        ?>
                                <button class="btn btn-danger" >Rechazado</button> 
                        <?php
                        } 
                        else if($datos[$i]["nivel"]==4){
                        ?>
                                <button class="btn btn-danger" >Expirado</button> 
                        <?php
                        }
                        else if($datos[$i]["nivel"]==3){
                        ?>
                                <button class="btn btn-dark" >    Baneado</button>
                        <?php
                        }
                        else if($datos[$i]["nivel"]==2){
                        ?>
                                <button class="btn btn-primary" >    Admin</button> 
                        <?php
                        }else if($datos[$i]["nivel"]==1){
                        ?>
                                <button class="btn btn-success" >    Aceptado</button>
                        <?php
                        }
                        else{
                        ?>
                            <button class="btn btn-warning">    Pendiente</button> 
                        <?php
                        }
                        ?>
                        </div>
                        <div class="div-table-cell">
                            <button class="btn btn-info" onclick="janelaPopUp.abre('Editar','p purple','Editar Usuario','¿Desea editar este usuario?',undefined,'./../editar/index.php?id=<?php echo $datos[$i]['idUsuario'];?>&editar=1','No','Si')"> <i class="zmdi zmdi-refresh"></i></button>
                    </div>
                    </div>
                <?php
                    }
                ?> 
            </div>                  
        </div>
    </div>
    <?php require('./../../pagina/script.php');?>
</body>
</html>