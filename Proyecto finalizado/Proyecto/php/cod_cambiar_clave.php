<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include "conexion.php";
    /**
     * Se definen 3 variables
     * @var String $clave_propietario           Clave del propietario, tipo cadena de caracteres.
     * @var String $nuevaPass                   Nueva clave del propietario, tipo cadena de caracteres.
     * @var String $confirmarPass               Confirmar contraseña del propietario, tipo cadena de caracteres.
     */
    if (isset($_POST['btn_cambiar'])) {
        $clave_propietario = $_POST['clave_propietario'];
        $nuevaPass = $_POST['nuevaPassword'];
        $confirmarPass = $_POST['confirmarPassword'];
        /**
         * Si nuevapass es igual a confirmarpass
         */
        if ($nuevaPass == $confirmarPass) {
            /**
             * Sentencia sql para  actualizar datos en la tabla propietario
             */
            $sql = mysqli_query($conexion, "UPDATE tbl_propietario SET clave_propietario = '$nuevaPass' 
            WHERE clave_propietario = '$clave_propietario' ") or die (mysqli_error($conexion));

            echo "<script> alert('Contraseña actualizada');</script>";
            echo "<script>window.location='../vistas/inicio_de_sesion.php';</script>";   
        }
        /**
         * Sino son iguales no se realiza la sentencia sql de actualizar datos en la tabla propietario
         */
        else{
            echo "<script type='text/javascript'>alert('Las contraseñas no coinciden')</script>"; 
            echo "<script>window.location='../vistas/cambiar_clave.php';</script>";

        }
    }
?>