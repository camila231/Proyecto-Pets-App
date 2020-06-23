<?php
/**
 * Se incluye la conexión a la base de datos
 */
include '../php/conexion.php';
session_start();
/**
 * Si la sesión del administrador esta iniciada
 * va dejar ver esta vista
 */
if (isset($_SESSION['administrador'])) {
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/pagina_administrador.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Pagina Administrador</title>
</head>
<body>
<!--Menú navegador --> 
<div class="menu">
    <header>
        <div id="logo"><img src="../images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a></div>
            <nav class="nav">
            <ul>
            <li><a href="../vistas/pagina_administrador.php">Inicio</a>
            </li>
            <li><a href="../vistas/clave_administrador.php">Cambiar contraseña</a>
            </li>
            <li><a href="../php/salir.php">Cerrar sesión</a>
            </li>
            </ul>
            </nav>
    </header>
</div>
<!--Br para dar un salto de línea --> 
<br>
<!--titulo --> 
<center><h1>Habilitar y deshabilitar veterinarios</h1></center>
<br>
<!--Div que contiene otro div que tiene una tabla --> 
<div id="container">
    <div class="colum">
        <center>
<!--Tabla para mostrar los datos de los veterinarios que están almacenados en la base de datos --> 
        <table>
            <tr>
                <th>Identificación</th>
                <th>Nombres</th>
                <th>Apellidos</th>
                <th>Email</th>
                <th>Teléfono</th>
                <th>Celular</th>
                <th>Foto</th>
                <th>Estado</th>
                <th>Acción</th>
            </tr>
                <?php
            include '../php/conexion.php';
/**
 * Consulta a la base de datos de la tabla veterinario
 */
            $query = mysqli_query($conexion,"SELECT * FROM tbl_veterinario");
/**
 * Ciclo para mostrar los datos de la consulta
 */
            while($row = mysqli_fetch_array($query)){
              ?>
        <tr>
            <form  action="../vistas/pagina_administrador.php"  method="POST" >
                    <td><?php echo $row['identificacion_veterinario'];?></td>
                    <td><?php echo $row['nombre_1'];?> <?php echo $row['nombre_2'];?></td>
                    <td><?php echo $row['apellido_1'];?> <?php echo $row['apellido_2'];?></td>
                    <td><?php echo $row['email_veterinario'];?></td>
                    <td><?php echo $row['telefono_1'];?></td>
                    <td><?php echo $row['celular_1'];?></td>
                    <td id="foto"><?php echo '<img src="'.$row["foto"].'">';?></td>
                    <td><?php echo $row['estado'];?></td>
                    <td><input type="submit" value="Activo" class="activo" name="activo"><br><br>
                    <input type="submit" value="Inactivo" class="inactivo" name="inactivo"></td>
            </form>
        </tr>
                <?php }  ?>
        </table>
        </center>
    </div>
    <?php 
include '../php/conexion.php';
/**
 * Se define 1 variable
 * @var String $estado
 * Si le da click en el botón activo
 */
if (isset($_POST['activo'])){
    $estado = 'Activo';
/**
 * Sentencia sql para  actualizar datos en la tabla veterinario
 */
    mysqli_query($conexion,"UPDATE tbl_veterinario SET estado='$estado'");
/**
 * alerta y se direcciona a la misma vista
 */
    echo "<script>alert('Se activo exitosamente..')</script>";
    echo "<script> window.location = '../vistas/pagina_administrador.php'</script>";
}
/**
 * Se define 1 variable
 * @var String $estado
 * Si le da click en el botón activo
 */
else if (isset($_POST['inactivo'])){
    $estado = 'Inactivo';
/**
 * Sentencia sql para  actualizar datos en la tabla veterinario
 */
    mysqli_query($conexion,"UPDATE tbl_veterinario SET estado='$estado'");
/**
 * alerta y se direcciona a la misma vista
 */
    echo "<script>alert('Se inactivo exitosamente..')</script>";
    echo "<script> window.location = '../vistas/pagina_administrador.php'</script>";
}
?>
</div>
</body>
</html>
<?php
}
/**
 * Sino está la sesión  del administrador lo direccione al index
 */
else{
    header('Location: ../index.php');
}
?>