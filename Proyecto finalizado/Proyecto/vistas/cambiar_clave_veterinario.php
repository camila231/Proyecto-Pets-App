<?php
/**
 * Se incluye la conexión de la base de datos
 */
include '../php/conexion.php';
session_start();
/**
 * Si la sesión del veterinario esta iniciada
 * va dejar ver esta vista
 */
if (isset($_SESSION['veterinario'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@9"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cambiar_clave.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script type="text/javascript" src='../js/validacionesFormularios.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Cambiar contraseña</title>
</head>
<body >
<div id="container">
<!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del veterinario--> 
    <?php require_once '../header/header_veterinario.php'; ?>
    <!--Div que contiene el formulario para cambiar la contraseña--> 
    <div class="cambiar">
      <center><h1>Cambiar Clave</h1></center>
        <!--Br para dar un salto de línea--> 
        <br>
        <!--Formulario para cambiar la contraseña--> 
        <form action="../php/cod_cambiar_clave_veterinario.php" method="POST" onsubmit="return claveVeterinario();">
            <input type="text" name="clave_veterinario" id="clave" placeholder="Ingrese su contraseña actual">
            <input type="password" name="nuevaPassword" id="claveNueva" placeholder="Nueva contraseña">
            <input type="password" name="confirmarPassword" id="confirmar" placeholder="Confirmar contraseña">
            <input type="submit" name="btn_cambiar" id="boton" value="Cambiar contraseña">
        </form>
        <!--Fin del formulario--> 
    </div> 
</div>  
</body>
</html>
<?php
}
/**
 * Sino está la sesión del veterinario lo direccione al index
 */
else{
    header('Location: ../index.php');
}
?>