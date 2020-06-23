<?php
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/ver_historia_clinica.css" rel="stylesheet" type="text/css">
    <script src="https://unpkg.com/ionicons@5.0.0/dist/ionicons.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Ver historia clínica</title>
</head>
<body>
<div id="containerT">
    <!--Div que contiene el header-->
    <div id="containerheader"> 
        <!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del veterinario -->
        <?php require_once '../header/header_veterinario.php'; ?>
    </div>
    <!--Br para un salto de línea-->
    <br>
    <!--Br para un salto de línea-->
    <br>
    <div class="form">
        <h1><center>Historias clínicas<center></h1>
        <!--Buscador-->
        <label for="caja_busqueda" hidden >Buscar</label>
        <input type="text" name="caja_busqueda" id="caja_busqueda"><ion-icon name="search"></ion-icon></input>
    </div>
        <!--Br para un salto denlínea-->
        <br>
    <!--Div que llama por el id datos la tabla que contiene las historias clínicas para así mirar si encuentra datos 
    en la tabla-->
    <div id="datos"></div>

<script type="text/javascript" src="../js/jquery.min.js"></script>
<script type="text/javascript" src="../js/buscador.js"></script>
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
