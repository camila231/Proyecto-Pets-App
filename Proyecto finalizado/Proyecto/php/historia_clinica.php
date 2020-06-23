<?php
    /**
    * Se incluye la conexión de la base de datos
    */
    include "conexion.php";
    /**
     * Se definen 8 variables
     * @var String  $nombre_mascota                 Nombre de la mascota, tipo cadena de caracteres
     * @var Date    $fecha_consulta                 Fecha de la mascota, tipo cadena de caracteres
     * @var Date    $fecha_de_nacimiento            Fecha de nacimiento de la mascota, tipo cadena de caracteres
     * @var String  $identificacionpropietario      Identificacion del propietario, tipo cadena de caracteres
     * @var String  $raza                           Raza de la mascota, tipo cadena de caracteres
     * @var String  $sexo                           Sexo de la mascota, tipo cadena de caracteres
     * @var String  $diagnostico_mascota            Diagnostico de la mascota, tipo cadena de caracteres
     * @var String  $motivo_consulta                Motivo de la consulta, tipo cadena de caracteres
    */
    $nombre_mascota =$_POST['nombre_mascota_historia'];
    $fecha_consulta =$_POST['fecha_historia'];
    $fecha_de_nacimiento =$_POST['fecha_nacimiento'];
    $identificacionpropietario =$_POST['idpropietario'];
    $raza =$_POST['raza_historia'];
    $sexo =$_POST['sexo_historia'];
    $diagnostico_mascota =$_POST['diagnostico_historia'];
    $motivo_consulta =$_POST['motivo_historia'];
    /**
    * Sentencia sql para insertar datos en la tabla historia clinica
    */
    mysqli_query($conexion ,"INSERT INTO tbl_historia_clinica(nombre_mascota,fecha_consulta,fecha_de_nacimiento,raza,
    sexo,diagnostico_mascota,motivo_consulta,id_propietario) VALUES ('$nombre_mascota','$fecha_consulta','$fecha_de_nacimiento','$raza',
    '$sexo','$diagnostico_mascota','$motivo_consulta','$identificacionpropietario')") or die ("<h2> Error al envio </h2>");
    echo "<script>alert('Se creo exitosamente.')</script>";
    header('location:../vistas/ver_historia_clinica.php');
    /**
     * @var $idveterinario          Identificación del veterinario, tipo cadena de caracteres.
     */
    $idveterinario = $_POST['idveterinario'];
    /**
     * @var String $id         Se realiza la consulta para trear la información de la última historia clinica y almacenar
     * en $id el codigo de mascota.
     */
    $id=mysql_query($conexion,"SELECT * FROM tbl_historia_clinica ORDER by codigo_de_mascota Desc LIMIT 1") 
    or die (mysqli_error($conexion));
    /**
     * @var $row    Se almacena el resultado de la consulta $id
     */
    $row =mysqli_fetch_array($id);
    /**
     * @var Int $codigo_m       Código de la historia clínica, tipo entero
     */
    $codigo_m =$row['codigo_de_mascota'];
    /**
     * @var $query          Sentencia sql para insertar datos en la tabla historia clinica veterinario
     */
    $query=mysqli_query($conexion,"INSERT INTO tbl_historia_clinica_veterinario(codigo_de_mascota,
    identificacion_veterinario) VALUES
    ($codigo_m,$idveterinario)") or die (mysqli_error($conexion));
?>
