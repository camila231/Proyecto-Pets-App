<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/header_propietario.css" rel="stylesheet" type="text/css">
    <title>Document</title>
</head>
<body>
<!--Div que contiene el menú de navegación de la sesión del propietario-->
<div class="menu">
    <header>
    <div id="logo"><img src="../images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a></div>
            <nav class="nav">
                <ul>
                    <li><a href="../vistas/perfil_propietario.php">Perfil</a>
                    </li>
                    <li><a href="../vistas/agregar_mascotas.php">Mis mascotas</a>
                      </li>
                      <li><a target="_blank" href="http://localhost:6677/">Chat</a>
                    </li>
                      <li><a href="#">Servicios</a>
                        <ul>
                           <li><a href="../vistas/solicitar_cita.php">Solicitar cita</a></li>
                           <li><a href="../vistas/reservar_cita.php">Reservar cita</a></li>
                           <li><a href="../vistas/cancelar_cita.php">Cancelar cita</a></li>
                        </ul>
                      </li>
                      <li><a href="../vistas/cambiar_clave.php">Cambiar contraseña</a>
                    </li>
                    <li><a href="../php/salir.php">Cerrar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
    </div>
</body>
</html>