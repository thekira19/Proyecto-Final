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
    if (empty($_GET["id"])||empty($_GET["editar"])) {
        header('Location: ./../../');
    }
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <title>Editar</title>
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
        <?php 
            if (!empty($_GET["id"])&&!empty($_GET["editar"])) {
              $_SESSION["usuario"]->conexion=conectar();  
              $nuevo=$_SESSION["usuario"]->editar($_GET["id"]); 
        ?>
        <div class="container-fluid">
            <div class="container-flat-form">
                <div class="title-flat-form title-flat-blue">Actualizar Usuario</div>
                <form autocomplete="off" action="./../administracion/" method="post" name="form">
                    <div class="row">
                       <div class="col-xs-12 col-sm-8 col-sm-offset-2">
                            <div class="group-material">
                                <input type="hidden" name="id" value="<?php echo $nuevo['idUsuario'];?>">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el usuario" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Usuario" name="usuario" value="<?php echo $nuevo['usuario']; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Usuario</label>
                            </div> 
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el nombre" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Nombre" name="nombre" value="<?php echo $nuevo['nombre']; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Nombres</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí los apellidos" required="" pattern="[a-zA-ZáéíóúÁÉÍÓÚñÑ ]{1,50}" maxlength="50" data-toggle="tooltip" data-placement="top" title="Apellidos del usuario" name="apellido" value="<?php echo $nuevo['apellido'] ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Apellidos</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el email" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Email" name="email" value="<?php echo $nuevo['email']; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Email</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general check-representative" placeholder="Escribe aquí el número de celular" pattern="[0-9-]{1,12}" required="" maxlength="12" data-toggle="tooltip" data-placement="top" title="Solamente números" name="celular" value="<?php echo $nuevo['celular'] ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Celular</label>
                            </div>
                            <div class="group-material">
                                <input type="search" list="listapaises" class="material-control tooltips-general" placeholder="Escribe aquí el Pais" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Pais" name="pais" value="<?php echo $nuevo['pais']; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Pais</label>
                            </div>
                            <div class="group-material">
                                <input type="text" class="material-control tooltips-general" placeholder="Escribe aquí el Patrocinador" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Patrocinador" name="patrocinador" value="<?php echo $nuevo['patrocinador']; ?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Patrocinador</label>
                            </div>
                            <div class="group-material">
                                <input type="date" class="material-control tooltips-general" placeholder="Escribe aquí la Fecha de Fin" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha Fin" name="fecha" value="<?php echo date('Y-m-d', strtotime($nuevo["fin"]));?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Fecha</label>
                            </div>
                            <div class="group-material">
                                <input type="time" class="material-control tooltips-general" placeholder="Escribe aquí la Hora de Fin" required="" maxlength="50" data-toggle="tooltip" data-placement="top" title="Fecha Fin" name="hora" value="<?php echo date('H:i', strtotime($nuevo["fin"]));?>">
                                <span class="highlight"></span>
                                <span class="bar"></span>
                                <label>Hora</label>
                            </div>

                            <div class="group-material">
                                <span>Nivel</span>
                                <select class="material-control tooltips-general" data-toggle="tooltip" data-placement="top" title="Elige el nivel de Usuario" name="nivel">
                                    <option value="0" <?php if($nuevo['nivel']==0){echo 'selected';}?> >
                                        Pendiente
                                    </option>
                                    <option value="1" <?php if($nuevo['nivel']==1){echo 'selected';}?> >
                                        Aceptado
                                    </option>
                                    <option value="2" <?php if($nuevo['nivel']==2){echo 'selected';}?> >
                                        Administrador
                                    </option>
                                    <option value="3" <?php if($nuevo['nivel']==3){echo 'selected';}?> >
                                        Baneado
                                    </option>
                                    <option value="4" <?php if($nuevo['nivel']==4){echo 'selected';}?> >
                                        Expirado
                                    </option>
                                    <option value="5" <?php if($nuevo['nivel']==5){echo 'selected';}?> >
                                        Rechazado
                                    </option>
                                </select>
                            </div>
                            <p class="text-center">
                                <button type="submit" class="btn btn-primary"><i class="zmdi zmdi-floppy"></i> &nbsp;&nbsp; Guardar Cambios</button>
                            </p> 
                       </div>
                    </div>
                </form>
            </div>
        </div>
        <?php }?>
    </div>
    <?php require('./../../pagina/paises.php');?>
    <?php require('./../../pagina/script.php');?>
</body>
</html>