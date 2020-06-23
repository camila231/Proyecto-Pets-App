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
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/reservar_cita.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <script src="https://use.fontawesome.com/5e676b5ade.js"></script>
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Reservar cita</title>
</head>
<body>
<div id="container">
 <!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del propietario-->
<?php require_once '../header/header_propietario.php'; ?>
<!--ventana modal --> 
<div class="popup">
<div class="popup-content">
<i class="fa fa-times close" ></i>
    <center><h2>Veterinarios disponible</h2></center>
    <br>
    <?php
    include '../php/conexion.php';
/**
 * Consulta a la base de datos de la tabla veterinario
 */
    $query = mysqli_query($conexion,"SELECT * FROM tbl_veterinario WHERE disponibilidad = 'Disponible'");
/**
 * Ciclo para mostrar los datos de la consulta
 */
    while($fila = mysqli_fetch_array($query)){
    ?>
    <center>
    <table>
        <tr>
        <th hidden>Cédula</th>
        <th hidden>Primer nombre</th>
        <th hidden>Segundo nombre</th>
        <th hidden>Primer apellido</th>
        <th hidden>Segundo apellido</th>
        <th hidden id="accion">Acción</th>
        </tr>
        <tr>
        <td hidden><?php echo $fila['identificacion_veterinario'];?><td>
            <td><?php echo $fila['nombre_1'];?> </td>
            <td><?php echo $fila['nombre_2'];?> </td>
            <td> <?php echo $fila['apellido_1'];?></td>
            <td><?php echo $fila['apellido_2'];?></td>
            <td><a href="../vistas/reservar_cita.php?nombre1=<?php echo $fila['identificacion_veterinario'];?>">Agregar</a></td>
        </tr>
<?php
    }
?>
    </table>
    </center>
</div>
</div>

<div class="columna1">
    <div class="reservar">
    <br>
    <form action="../php/cod_reservar_cita.php" method="POST" class="reservar_cita">
    <h1><center>Reservar citas</center></h1>
    <label>Veterinarios disponibles</label>
                <?php
/**
 * Id para llamar la identificación del propietario de esa sesión
 */
                $id = $_SESSION['propietario'];
/**
 * Si obtiene el nombre1
 */
                if(isset($_GET['nombre1'])){
/**
 * @var String $nombre
 */
                $nombre = $_GET['nombre1'];
/**
 * Se realiza la consulta a la base de datos de la tabla veterinario
 */
                $consulta = mysqli_query($conexion, "SELECT * FROM tbl_veterinario  WHERE identificacion_veterinario = '$nombre'");
/**
 * Ciclo para mostrar los datos de la consulta
 */
                while ($row = mysqli_fetch_array($consulta)){
                    ?>
                <input type="text"  id="disponible" placeholder="" value="<?php echo $row['nombre_1']?><?php echo $row['nombre_2']?><?php echo $row['apellido_1']?><?php echo $row['apellido_2']?>" name="veterinario">
                <input type="text"  placeholder="" hidden value="<?php echo $row['identificacion_veterinario']?>" name="id_veterinario">
                <?php
                } }
                ?><i class="fa fa-user-md"  id="open"  ></i>
                <br><br>
                <label>Dirección</label>
                <input type="text" placeholder="Ingrese su dirección" name="direccion"  onkeypress="return SoloNumerosYLetras(event)" onpaste="return false" required="yes">
                <label>Barrio</label>
                <input type="text" placeholder="Ingrese su barrio" name="barrio"  onkeypress="return SoloLetras(event)" onpaste="return false" required="yes">
               <label>Fecha</label>
                <input type="date" placeholder="" name="fecha"  onkeypress="return SoloNumeros(event)" onpaste="return false" required="yes">
                <label>Hora</label>
                <select name="hora">
                <option disabled selected>Hora disponible</option>
                <?php 
/**
 * Si obtiene el nombre1
 */
                if(isset($_GET['nombre1'])){
/**
 * @var String $nombre
 */
                $nombre = $_GET['nombre1'];
/**
 * Se realiza la consulta a la base de datos de la tabla horario de la identificación del veterinario que trae por la 
 * url desde la sesión del veterianrio
 */
                $horario = mysqli_query($conexion , "SELECT * FROM tbl_horario WHERE identificacion_veterinario ='$nombre'");
/**
 * Ciclo para mostrar datos de la consulta
 */
                while($rowhora = mysqli_fetch_array($horario)){
                    ?>
                    <option ><?php echo $rowhora['hora_1'] ?></option>
                 <?php
                } }
                ?>
                </select>
                <label>Tipo de consulta</label>
                <select name="tipo_Consulta">
                <option disable selected>Ingrese el tipo de consulta</option>
                <option>Vacunación</option>
                <option>Consulta general</option>
               </select>
               <button  name="btn_reservar">Reservar cita</button>
    </form>
    </div>
</div>
</div>
</body>
<script type="text/javascript" src='../js/modal.js'></script>
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