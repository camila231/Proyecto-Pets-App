<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include 'conexion.php';
    /**
     * Se incluye la vista de agregar mascota para llamar la identificación de la sesión del propietario
     */
    include '../vistas/agregar_mascotas.php';

    /**
     *Se definen 9 variables
    *@var String $id
    *@var String $nombre_mascota               Nombre de la mascota, tipo cadena de caracteres
    *@var String $raza_mascota                 Raza de la mascota, tipo cadena de caracteres
    *@var String $color_mascota                Color de la mascota, tipo cadena de caracteres
    *@var String $tamano_mascota               Tamaño de la mascota, tipo cadena de caracteres
    *@var Date   $fecha_nacimiento             Fecha de nacimiento de la mascota, tipo cadena de caracteres
    *@var String $foto_mascota                 Foto  de la mascota, tipo cadena de caracteres
    *@var $ruta
    *@var $destino
    */
    /**
    *La variable id es para llamar la identificación de la sesión propietario
    */
    $id = $_SESSION['propietario'];
    $nombre_mascota = $_POST['nombre_mascota'];
    $raza_mascota = $_POST['raza_mascota'];
    $color_mascota = $_POST['color_mascota'];
    $tamano_mascota =$_POST['tamano_mascota'];
    $fecha_nacimiento = $_POST['fecha_nacimiento_mascota'];
    /**
     *Subir una imagen
    */
    $foto_mascota = $_FILES["foto_mascota"]["name"];
    $ruta = $_FILES["foto_mascota"]["tmp_name"];
    $destino="../img_mascotas/";
    $destino= $destino."/".$foto_mascota;
    /**
     *move_uploaded_file si la imagen es valida se inserta la url y se sube el archivo a la carpeta img_mascotas
    */
    move_uploaded_file($ruta,$destino);
    /**
     * Sentencia sql para insertar datos en la tabla mascota
     */
    mysqli_query($conexion ,"INSERT INTO tbl_mascota(nombre_mascota,raza_mascota,color_mascota,
    tamano_mascota,fecha_nacimiento,foto_mascota, identificacion_propietario) VALUES ('$nombre_mascota','$raza_mascota',
    '$color_mascota','$tamano_mascota','$fecha_nacimiento','$destino','$id')") or die (mysqli_error($conexion));
    echo '<script>
    alert("Se agrego correctamente su mascota.");
    window.history.go(-1);
    </script>';
?>