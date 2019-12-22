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
    if (!empty($_GET["id"])&&!empty($_GET["option"])) {
        $_SESSION["usuario"]->conexion=conectar();
        if($_GET["option"]==1){
            $date = new DateTime();
            $date->modify('-5 hours');
            $date->modify('+0 minute');
            $date->modify('-0 second');
            $inicio=$date->format('Y-m-d H:i:s');
            $date->modify('+30 days');
            $fin=$date->format('Y-m-d H:i:s');
            $_SESSION["usuario"]->actualizar_nivel($_GET["id"],$_GET["option"],$inicio,$fin);
        }else{
            $date = new DateTime();
            $date->modify('-5 hours');
            $date->modify('+0 minute');
            $date->modify('-0 second');
            $inicio=$date->format('Y-m-d H:i:s');
            $_SESSION["usuario"]->actualizar_nivel($_GET["id"],$_GET["option"],NULL,$inicio);
        }   
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
                    <img src='../../assets/img/logo.png' alt='Biblioteca' class='img-responsive center-box' style='width:55%;'>
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
                <li  class='tooltips-general exit-system-button' data-href='./../../index.php?option=1' data-placement='bottom' title='Salir del sistema'>
                    <i class='zmdi zmdi-power'></i>
                </li>
                <li style='color:#fff; cursor:default;'>
                    <span class='all-tittles'>
                    <?php echo $_SESSION["usuario"]->usuario; ?>
                    </span>
                </li>
                <figure>
                   <img src='../../assets/img/user01.png' alt='user-picture' class='img-responsive img-circle center-box'>
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
        <?php
            $_SESSION["usuario"]->conexion=conectar();
            $datos=$_SESSION["usuario"]->mis_referidos();
            $size=count($datos);
            if($size>0){
        ?>
            <h2 class="text-center all-tittles">Mis Afiliados</h2>
            <div class="div-table">
                <div class="div-table-row div-table-head">
                    <div class="div-table-cell">#</div>
                    <div class="div-table-cell">Usuario</div>
                    <div class="div-table-cell">Nombre</div>
                    <div class="div-table-cell">Email</div>
                    <div class="div-table-cell">Celular</div>
                    <div class="div-table-cell">Estado</div>
                </div>
                <?php  
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
                        <?php
                        if($datos[$i]["nivel"]==5){
                        ?>
                            <div class="div-table-cell">
                                <button class="btn btn-danger" onclick="janelaPopUp.abre('rechazado','p red','Solicitud Rechazada','chosse a configuration and click the color!',undefined,'./index.php?id=<?php echo $datos[$i]["idUsuario"];?>&option=1','Cancelar','Aceptar')">Rechazado</button>
                            </div> 
                        <?php
                        } 
                        else if($datos[$i]["nivel"]==4){
                        ?>
                            <div class="div-table-cell">
                                <button class="btn btn-danger" onclick="janelaPopUp.abre('terminado','p red','Tiempo Terminado','chosse a configuration and click the color!',undefined,'./index.php?id=<?php echo $datos[$i]["idUsuario"];?>&option=1','Cancelar','Activar')">Expirado</button>
                            </div> 
                        <?php
                        }
                        else if($datos[$i]["nivel"]==3){
                        ?>
                            <div class="div-table-cell">
                                <button class="btn btn-dark" >    Baneado</button>
                            </div> 
                        <?php
                        }
                        else if($datos[$i]["nivel"]==2){
                        ?>
                            <div class="div-table-cell">
                                <button class="btn btn-primary" >    Admin</button>
                            </div> 
                        <?php
                        }else if($datos[$i]["nivel"]==1){
                        ?>
                            <div class="div-table-cell">
                                <button class="btn btn-success" onclick="janelaPopUp.abre('aceptado','p green','Solicitud Aceptada','chosse a configuration and click the color!',undefined,'./index.php?id=<?php echo $datos[$i]["idUsuario"];?>&option=5','Cancelar','Rechazar')">    Aceptado</button>
                            </div> 
                        <?php
                        }
                        else{
                        ?>
                            <div class="div-table-cell">
                                <button class="btn btn-warning" onclick="janelaPopUp.abre('pendiente','p orange','Solicitud Pendiente','chosse a configuration and click the color!','./index.php?id=<?php echo $datos[$i]["idUsuario"];?>&option=5','./index.php?id=<?php echo $datos[$i]["idUsuario"];?>&option=1','Rechazar','Aceptar')">    Pendiente</button>
                            </div> 
                        <?php

                        }
                        ?>
                    </div>
                <?php
                    }
                ?> 
            </div>
        <?php 
            }else{
        ?>      
            <h2 class="text-center all-tittles"> No tiene Afiliados </h2>
        <?php } ?>            
        </div>
    </div>
    <?php require('./../../pagina/script.php');?>
</body>
</html>