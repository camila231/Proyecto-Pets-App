<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include "../php/conexion.php";
    /**
     * Se definen 2 variables
     * @var Integer $codigo_solicitar       codigo solicitar tipo entero.
     * @var Integer $leido                  leido tipo entero.
     */
    /**
     * Si le da click en el botón aceptar
     */
    if (isset($_POST['aceptar'])){
        $codigo_solicitar = $_POST['codigo_solicitar'];
        $leido = 1;
        /**
         * Sentencia sql para  actualizar datos en la tabla solicitar cita
         */
        $query=mysqli_query($conexion,"UPDATE tbl_solicitar_cita SET leido = '$leido'
         WHERE codigo_solicitar='$codigo_solicitar'") or die (mysqli_error($conexion));
         echo "<script> window.location = '../vistas/datos_notificacion.php'</script>";
    }
?>