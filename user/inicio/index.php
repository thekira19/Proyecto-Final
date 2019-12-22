<?php
    require("./../../php/conexion.php");
    require("./../../php/clases.php");
    require("./../../php/seguridad.php");
    destruir_sesion();
    $_SESSION['usuario']->conexion=conectar();
    $_SESSION['usuario']->conectar();
    verificar_sesion();
    if($_SESSION["usuario"]->nivel!=1&&$_SESSION["usuario"]->nivel!=0&&$_SESSION["usuario"]->nivel!=5&&$_SESSION["usuario"]->nivel!=4){
        verificar();
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Inicio</title>
    <meta charset='UTF-8'>
    <meta name='viewport' content='width=device-width, initial-scale=1'>
    <link rel='Shortcut Icon' type='image/x-icon' href='assets/icons/book.ico' />
    <script src='./../../js/sweet-alert.min.js'></script>
    <link rel='stylesheet' href='./../../css/sweet-alert.css'>
    <link rel='stylesheet' href='./../../css/material-design-iconic-font.min.css'>
    <link rel='stylesheet' href='./../../css/normalize.css'>
    <link rel='stylesheet' href='./../../css/bootstrap.min.css'>
    <link rel='stylesheet' href='./../../css/jquery.mCustomScrollbar.css'>
    <link rel='stylesheet' href='./../../css/style.css'>
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
                        if($_SESSION["usuario"]->nivel==1){
                            require './../../pagina/afiliados.php';
                        }
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
                    <span class='all-tittles'><?php echo $_SESSION["usuario"]->usuario; ?></span>
                </li>
                <figure>
                   <img src='./../../assets/img/user01.png' alt='user-picture' class='img-responsive img-circle center-box'>
                </figure>
                
                <li class='mobile-menu-button visible-xs' style='float: left !important;'>
                    <i class='zmdi zmdi-menu'></i>
                </li>
                <li>
                    <div id="clock">
                <?php 
                    if($_SESSION['usuario']->nivel==5){
                        echo 'Rechazado';
                    }else{
                        echo 'No Activado';
                    }
                ?>
                    </div>
                </li>
            </ul>
        </nav>
        <div class='container'>
            <div class='page-header'>
              <h1 class='all-tittles'>NOMBRE  
                  <small><?php echo $_SESSION["usuario"]->nombre."  ".$_SESSION["usuario"]->apellido; ?></small>
              </h1>
              <h1 class='all-tittles'>PATROCINADOR  
                  <small><?php echo $_SESSION["usuario"]->patrocinador; ?></small>
              </h1>
            </div>
        </div>
    </div>
    <?php require('./../../pagina/script.php');?>
</body>
</html>