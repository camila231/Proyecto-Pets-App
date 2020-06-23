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
/**
 * Si se obtiene la historia
 */
if($_GET['historia']){
    /**
     * @var $codigoMascota       Variable para obtener la historia
     */
    $codigoMascota = $_GET['historia'];
    /**
     * @var $query         Variable para realizar la consulta en la base de datos de la tabla historia clinica
     */
    $query = mysqli_query($conexion,"SELECT * FROM tbl_historia_clinica where `codigo_de_mascota` = $codigoMascota");
    /**
     * @var $consulta        Variable para contar las historias clinica
     */
    $consulta = mysqli_num_rows($query);
    /**
     * Si la consulta es = a 0
     * Lo direcciona a la vista ver historia clinica
     */
    if($consulta == 0){
        header ('location: ../php/ver_historia_clinica.php');

}   }else{
    header('location: editar.php');
}
/**
 * Si le de la clic en el botón submit
 */
if(isset($_POST['submit'])){
/**
 * @var $fecha_consulta
 * @var $nombre_mascota
 * @var $fecha_de_nacimiento
 * @var $raza
 * @var $sexo
 * @var $diagnostico_mascota
 * @var $motivo_consulta
 */
$fecha_consulta =$_POST['fecha_editar'];
$nombre_mascota=$_POST['nombre_mascota_editar'];
$fecha_de_nacimiento =$_POST['fecha_nacimiento_editar'];
$raza = $_POST['raza_editar'];
$sexo =$_POST['sexo_editar'];
$diagnostico_mascota =$_POST['diagnostico_editar'];
$motivo_consulta =$_POST['motivo_editar'];
   /**
    * @var $sql             Variable para realizar una sentencia en la base de datos, para actualizar la tabla historia clincia
    */
   $sql = mysqli_query($conexion, "UPDATE tbl_historia_clinica SET fecha_consulta='$fecha_consulta',nombre_mascota ='$nombre_mascota',
   fecha_de_nacimiento ='$fecha_de_nacimiento',raza = '$raza',sexo ='$sexo',diagnostico_mascota='$diagnostico_mascota',
   motivo_consulta ='$motivo_consulta' WHERE codigo_de_mascota='$codigoMascota'" or die (mysqli_error($sql)));
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/editar.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Editar historia clinica</title>
</head>
<body>
<!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del veterinario--> 
<?php require_once '../header/header_veterinario.php'; ?>
<!--Br para un salto de línea--> 
<br>
    <div class="container">
        <form action="../php/codeditar.php" method="POST">
        <h1 class="titulo"><center><img src="../images/icono.png" class="icono">Historia clínica</center></h1>
        <br>
        <?php
                        /**
                         * Ciclo para mostrar los datos de la consulta
                         */
                        while($row = mysqli_fetch_array($query)){
                          ?>
        <div class="container1">
            <input type="text" value="<?php echo $row['codigo_de_mascota'];?>" name="codigo_mascota_editar" hidden>
            <label for="fname" class="letra">Nombre de la mascota</label>
            <input type="text" class="form1"  name="nombre_mascota_editar" value="<?php echo $row['nombre_mascota'];?>">

            <label for="fname" class="letra">Raza</label>
            <input type="text" class="form1" name="raza_editar" value="<?php echo $row['raza'];?>">

            <label for="fname" class="letra">Fecha de nacimiento de la mascota</label>
            <input type="text" class="form1" name="fecha_nacimiento_editar" value="<?php echo $row['fecha_de_nacimiento'];?>">

            <label for="fname" class="letra">Diagnostico</label>
            <input type="text" class="form3" name="diagnostico_editar" value="<?php echo $row['diagnostico_mascota'];?>">
        </div>
        <div class="container2">
             <label for="fname" class="letra">Fecha de consulta</label>
            <input type="text" class="form1"  name="fecha_editar" value="<?php echo $row['fecha_consulta'];?>"> 

            <label for="fname" class="letra">Sexo</label>
            <select id="sexo" name="sexo_editar" value="<?php echo $row['sexo'];?>">
                <option value="au">Hembra</option>
                <option value="ca">Macho</option>
            </select>

            <label for="fname" class="letra">Motivo de la consulta</label>
            <input type="text" class="form3"  name="motivo_editar" value="<?php echo $row['motivo_consulta'];?>">
        </div>
        <br>
        <input type="submit" class="boton" name="submit" value="Actualizar">
        <br>
        <?php
        }
        ?>        
    </form>
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