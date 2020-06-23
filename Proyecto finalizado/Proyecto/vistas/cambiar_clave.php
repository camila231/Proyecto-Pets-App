<?php
/**
 * Se incluye la conexión de la base de datos
 */
include '../php/conexion.php';
session_start();
/**
 * Si la sesión del propietario esta iniciada
 * va dejar ver esta vista
 */
if (isset($_SESSION['propietario'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="../css/cambiar_clave.css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Cambiar contraseña</title>
</head>
<body>
<!--Div que contiene el menú y otro div que contiene el formulario--> 
<div id="container">
    <!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del propietario--> 
    <?php require_once '../header/header_propietario.php'; ?>
        <!--Div que contiene el formulario para cambiar la contraseña del veterinario--> 
        <div class="cambiar">
            <h4>Cambiar Clave</h4>
            <!--Br para dar un salto de línea--> 
            <br>
            <!--Formulario para cambiar la contraseña del veterinario--> 
            <form action="../php/cod_cambiar_clave.php" method="POST">
                <input type="text" name="clave_propietario" id="" placeholder="Ingrese su contraseña actual">
                <input type="password" name="nuevaPassword" id="" placeholder="Nueva contraseña">
                <input type="password" name="confirmarPassword" id="" placeholder="Confirmar contraseña">
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
 * Sino está la sesión  del propietario lo direccione al index
 */
else{
    header('Location: ../index.php');
}

?>