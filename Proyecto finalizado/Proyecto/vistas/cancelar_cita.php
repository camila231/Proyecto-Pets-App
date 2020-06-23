<?php
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
    <link rel="stylesheet" href="../css/cancelar_cita.css">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Cancelar cita</title>
</head>
<body>
<div id="container">
<?php require_once '../header/header_propietario.php'; ?>
        <div id="cancelar"> 
          <center><h1>Solicitar cita</h1></center>
       <table>
        <tr>
            <th>Dirección</th>
            <th>Barrio</th>
            <th>Tipo de consulta</th>
            <th><center>Fecha y hora</center></th>
            <th>Cancelar</th>
            </tr>
            <?php
            include '../php/conexion.php';
/**
 * Id para llamar la identificación del propietario de esa sesión
 */
            $id = $_SESSION['propietario'];
/**
 * Consulta en la base de datos de la tabla reservar cita
 */
            $query = mysqli_query($conexion,"SELECT * FROM tbl_solicitar_cita WHERE identificacion_propietario = '$id' and leido = 0");
/**
 * Ciclo para mostrar los datos de la consulta
 */
            while($row = mysqli_fetch_array($query)){
              ?>
            <tr>
            <form  action="../php/cod_borrar_citas.php"  method="POST" >
            <textarea hidden name="codigo" id="" cols="30" rows="10"><?php echo $row['codigo_solicitar'];?></textarea>
            <td><?php echo $row['direccion'];?></td>
            <td><?php echo $row['barrio'];?></td>
            <td><?php echo $row['tipo_consulta'];?></td>
            <td><?php echo $row['fecha_solicitar'];?></td>
            <td><input type="submit" value="Cancelar"class="boton" name="borrar_solicitar"><td>
            </form>
        </tr>
        <?php }  ?>
      </table>
        </div>
        <div id="reservar">
        <center><h1>Reservar cita</h1></center>
        <table>
          <center>
        <tr>
            <th>Fecha</th>
            <th>Hora</th>
            <th>Tipo de consulta</th>
            <th><center>Veterinario</center></th>
            <th>Cancelar</th>
            </tr> 
            </center>
            <?php
            include '../php/conexion.php';
/**
 * Id para llamar la identificación del propietario de esa sesión
 */
            $id = $_SESSION['propietario'];
/**
 * Consulta en la base de datos de la tabla reservar cita
 */
            $query = mysqli_query($conexion,"SELECT * FROM tbl_reservar_cita WHERE identificacion_propietario = '$id' ");
/**
 * Ciclo para mostrar los datos de la consulta
 */
            while($row = mysqli_fetch_array($query)){
              ?>
            <tr>
            <form  action="../php/cod_borrar_citas.php"  method="POST" >
            <textarea hidden name="codigo_reserva" id="" cols="30" rows="10"><?php echo $row['codigo_reservar'];?></textarea>
            <td><?php echo $row['fecha_reserva'];?></td>
            <td><?php echo $row['hora_reserva'];?></td>
            <td><?php echo $row['tipo_consulta'];?></td>
            <td><?php echo $row['veterinario'];?></td>
            <td><input type="submit" value="Cancelar" class="boton" name="borrar_reserva"></td>
            </form>
        </tr>
        <?php }  ?>
      </table>
        </div>
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