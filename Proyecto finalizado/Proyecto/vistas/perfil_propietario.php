<?php
/**
 * Se requiere la conexión de la base de datos
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
    <link  href="../css/perfil_propietario.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="../js/sweetalert2@9.js"></script>
    <script src='../js/validarPerfilP.js'></script>
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Perfil propietario</title>
</head>
<body>
<!--Div que contiene otros div--> 
<div id="container">
<!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del propietario--> 
<?php require_once '../header/header_propietario.php'; ?>

    <div class="titulo"><h1><center>Perfil propietario</center></h1></div>
        <div class="columna-1">
            <?php
                /**
                 * Se incluye la conexión de la base de datos
                 */
                include '../php/conexion.php';
                /**
                 * Id para llamar la identificación del propietario de esa sesión
                 */
                $id = $_SESSION['propietario'];
                /**
                 * Consulta en la base de datos de la tabla propietario
                 */
                $query = mysqli_query($conexion,"SELECT * FROM tbl_propietario WHERE `identificacion_propietario` = '$id'");
                /**
                 * Ciclo para mostrar los datos de la consulta 
                 */
                 while($row = mysqli_fetch_array($query)){
            ?>
            <!--Formulario que contiene los datos que trae la consulta de la base de datos de la tabla propietario--> 
            <form action="../php/cod_editar_propietario.php" method="post" onsubmit="return perfilPropietario();">
                    <textarea hidden name="identificacionpropietario"  cols="30" rows="10"><?php echo $row['identificacion_propietario'];?></textarea>

                    <label for="fname" class="letra">Primer nombre</label>
                    <input type="text" class=" form1"  placeholder="" id="nombreUno" value="<?php echo $row['nombre_1'];?>" name="nombre1">

                    <label for="fname" class="letra">Segundo nombre</label>
                    <input type="text" class=" form1" placeholder="" id="nombreDos" value="<?php echo $row['nombre_2'];?>" name="nombre2">

                    <label for="fname" class="letra">Primer apellido</label>
                    <input type="text" class=" form1" placeholder="" id="apellidoUno" value="<?php echo $row['apellido_1'];?>" name="apellido1">

                    <label for="fname" class="letra">Segundo apellido</label>
                    <input type="text" class=" form1" placeholder="" id="apellidoDos" value="<?php echo $row['apellido_2'];?>" name="apellido2">

                    <label for="fname" class="letra">E-mail</label>
                    <input type="email" class=" form1" placeholder="" id="emailPropietario" value="<?php echo $row['email_propietario'];?>" name="emailpropietario">
        </div>
        <div class="columna-2">   
            <label for="fname" class="letra">Dirección</label>
            <input type="text" class=" form1" placeholder="" id="direccion" value="<?php echo $row['direccion'];?>" name="direccion">
            
            <label for="fname" class="letra">Celular</label>
            <input type="text" class=" form1" placeholder="" id="celularUno" value="<?php echo $row['celular_1'];?>" name="celular1">

            <?php
            }
            ?>  
        </div>
        <br>
        <input type="submit" id="boton" name="btn_actualizar" value="Actualizar">
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
 * Sino está la sesión  del propietario lo direccione al index
 */
else{
    header('Location: ../index.php');
}

?>