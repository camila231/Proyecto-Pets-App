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
    <link  href="../css/historia_clinica.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <script type="text/javascript" src='../js/validacionesFormularios.js'></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Historia clínica</title>
</head>
<body>
<div id="containerheader"> 
    <!--Se queriere una carpeta que contiene el menú de navegación de la sesión del veterinario --> 
    <?php require_once '../header/header_veterinario.php'; ?>
</div>
<!--Br para salto de línea--> 
<br> <br>
 <div class="container">
        <form action="../php/historia_clinica.php" method="POST" onsubmit="return historia_clinica();">
        <h1 class="titulo"><center><img src="../images/icono.png" class="icono">Historia clínica</center></h1>
        <br>
        <div class="container1">
            <!--Se captura la identificación del veterinario que esta creando la historia clinica en un input oculto -->
            <input type="hidden" name="idveterinario" value="<?php echo $_SESSION['veterinario'];?>">
            <label for="fname" class="letra">Nombre de la mascota</label>
            <input type="text" class="form1" placeholder="Ingrese el nombre de la mascota" id="nombreMascota" name="nombre_mascota_historia"  onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Fecha de consulta</label>
            <input type="date" class="form1" placeholder="Año/dia/mes" name="fecha_historia" id="fechaConsulta" onkeypress="return SoloNumeros(event)" onpaste="return false" >

            <label for="fname" class="letra">Raza</label>
            <input type="text" class="form1" placeholder="Ingrese la raza" name="raza_historia" id="raza" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Motivo de la consulta</label>
            <input type="text" class="form3" placeholder="Ingrese el motivo de la consulta" id="motivoConsulta" name="motivo_historia"  onkeypress="return SoloLetras(event)" onpaste="return false" >
            
        </div><br>
        <div class="container2">
        <label for="fname" class="letra">Identificación del propietario</label>
            <input type="text" class="form1" placeholder="Ingrese la identificación del propietario" id="identificacion" name="idpropietario"  onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Fecha de nacimiento de la mascota</label>
            <input type="date" class="form1" placeholder="Año/dia/mes" name="fecha_nacimiento" id="fechaNacimiento" onkeypress="return SoloNumeros(event)" onpaste="return false" >

            <label for="fname" class="letra">Sexo</label>
            <select id="sexo"placeholder="Ingrese el sexo" name="sexo_historia" id="sexo" >
                <option value="au">Hembra</option>
                <option value="ca">Macho</option>
            </select>

            <label for="fname" class="letra">Diagnostico</label>
            <input type="text" class="form3" placeholder="Ingrese el diagnostico" id="diagnostico" name="diagnostico_historia"  onkeypress="return SoloLetras(event)" onpaste="return false" >
           
        </div>
        <br>
        <input type="submit" class="boton" name="btn" value="Crear">
        <br>
    </form>
</div>
</body>
</html>
<?php
}
/**
 * Sino está la sesión del veterinario  lo direccione al index
 */
else{
    header('Location: ../index.php');
}

?>