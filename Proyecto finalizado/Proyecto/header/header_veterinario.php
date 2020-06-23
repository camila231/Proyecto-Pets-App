<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script src="https://use.fontawesome.com/5e676b5ade.js"></script>
    <link  href="../css/header_veterinario.css" rel="stylesheet" type="text/css">
    
    <title>Document</title>
</head>
<body>
<!--Div que contiene el menú de navegación de la sesión del veterinario-->
    <div class="menu">
    <header>
    <div id="logo"><img src="../images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a></div>
            <nav class="nav">
                <ul>
                    <li><a href="../vistas/pagina_veterinario.php">Inicio</a>
                    </li>
                    <li><a href="../vistas/perfil_veterinario.php">Perfil</a>
                    </li>
                      <li><a target="_blank" href="http://localhost:6677/">Chat</a>
                    </li>
                    <li><a href="#">Historia clínica</a>
                    <center>
                        <ul>
                           <li><a href="../vistas/historia_clinica1.php">Crear</a></li>
                           <li><a href="../vistas/ver_historia_clinica.php">Ver</a></li>
                        </ul>
</center>
                      </li>
                      <li><a href="../vistas/cambiar_clave_veterinario.php">Cambiar contraseña</a>
                    </li>
                    <?php
                    /**
                     * @var $consulta       Consulta para traer los datos de la tabla solicitar cita
                     * @var $contar         contrar los datos que trae la consulta
                     */
                    $consulta = mysqli_query($conexion,"SELECT * from tbl_solicitar_cita WHERE  leido = 0");
                    $contar = mysqli_num_rows($consulta);
                    ?>
                      <li id="notificacion"><a href="../vistas/datos_notificacion.php" ><i class="fa fa-bell" id="notificacion"></i><?php echo $contar;?></a>
                    </li>
                    <li><a href="../php/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>	
    </div>
</body>
<script type="text/javascript" src='../js/modal.js'></script>
</html>