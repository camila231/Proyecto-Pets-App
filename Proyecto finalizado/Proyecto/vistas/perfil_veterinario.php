<?php
/**
 * Se incluye la conexión a la base de datos
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
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/perfil_veterinario.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Perfil veterinario</title>
</head>
<body>    
<div id="container">
    <!--Se requiere la carpeta header que contiene el menú navegador de la sesión veterinario --> 
    <?php require_once '../header/header_veterinario.php'; ?>
    <!--Div que contiene el titulo--> 
    <div class="titulo"><h1><center>Perfil veterinario</center></h1></div>
    <div class="columna-1">
        <?php
            include '../php/conexion.php';
            /**
             * Id para llamar la identificación del veterinario de esa sesión
             */
            $id_p = $_SESSION['veterinario'];
            /**
             * Consulta en la base de datos de la tabla veterinario
             */
            $query = mysqli_query($conexion,"SELECT * FROM tbl_veterinario WHERE `identificacion_veterinario` = '$id_p'");
            /**
             * Ciclo para mostrar los datos de la consulta
             */
            while($row = mysqli_fetch_array($query)){
        ?>
        <form action="../php/cod_editar_veterinario.php" method="POST">
            <textarea hidden name="identificacionveterinario" id="" cols="30" rows="10"><?php echo $row['identificacion_veterinario'];?></textarea>
            <label for="fname" class="letra">Primer nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer nombre" name="nombre1" value="<?php echo $row['nombre_1'];?>">

            <label for="fname" class="letra">Segundo nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo nombre" name="nombre2" value="<?php echo $row['nombre_2'];?>">

            <label for="fname" class="letra">Primer apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer apellido" name="apellido1" value="<?php echo $row['apellido_1'];?>">

            <label for="fname" class="letra">Segundo apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo apellido" name="apellido2" value="<?php echo $row['apellido_2'];?>">

            <label for="fname" class="letra">E-mail</label>
            <input type="email" class=" form1" placeholder="Ingrese su correo e-mail" name="emailveterinario" value="<?php echo $row['email_veterinario'];?>">
    
    </div>
    <div class="columna-2">    
        <label for="fname" class="letra">Telefono</label>
        <input type="text" class=" form1" placeholder="Ingrese su número de telefono" name="telefono1" value="<?php echo $row['telefono_1'];?>">

        <label for="fname" class="letra">Celular</label>
        <input type="text" class=" form1" placeholder="Ingrese su número de celular" name="celular1" value="<?php echo $row['celular_1'];?>">

        <?php
        /**
         * } Se cierra el ciclo
         */
        }
        ?>  
    </div>
        <!--Br para salto de línea--> 
        <br>
        <input type="submit" name="btn" id="boton" value="Actualizar">
        <br>
        </form>
        <!--Fin del formulario --> 
    </div>
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