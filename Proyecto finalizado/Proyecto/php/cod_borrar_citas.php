<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include 'conexion.php';
    /**
     * Se define 1 variable
     * @var Integer $codigo_solicitar      Codigo solicitar, tipo entero.
     * Si le da click en el botón solicitar cita
     */
    if(isset($_POST['borrar_solicitar'])){
        $codigo_solicitar = $_POST['codigo'];
        /**
         * Sentencia sql para borrar datos de la tabla solicitar cita
         */
        $eliminar=mysqli_query($conexion,"DELETE FROM tbl_solicitar_cita WHERE codigo_solicitar='$codigo_solicitar'") or die ('error al eliminar');
        echo '<script>
    alert("Se elimino correctamente su solicitud de cita.");
    window.history.go(-1);
    </script>';
    }
    /**
     * Se define 1 variable
     * @var Integer $codigo_reservar      Codigo reservar, tipo entero.
     * Si le da click en el botón reservar cita
     */
    elseif(isset($_POST['borrar_reserva'])){
        $codigo_reservar = $_POST['codigo_reserva'];
        /**
         * @var $eliminar    Sentencia sql para borrar datos de la tabla solicitar cita
         */
        $eliminar=mysqli_query($conexion,"DELETE FROM tbl_reservar_cita WHERE codigo_reservar='$codigo_reservar'") or die (mysqli_error($conexion));
        echo '<script>
    alert("Se elimino correctamente su reserva de cita.");
    window.history.go(-1);
    </script>';
    }
?>