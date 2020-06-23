<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include "conexion.php";
    /**
     * Se definen 3 variables
     * @var String $clave_veterinario           Clave del veterinario, tipo cadena de caracteres.
     * @var String $nuevaPass                   Nueva clave del veterianrio, tipo cadena de caracteres.
     * @var String $confirmarPass               confirmar clave del veterinario, tipo cadena de caracteres.
     */
    if (isset($_POST['btn_cambiar'])) {
        $clave_veterinario = $_POST['clave_veterinario'];
        $nuevaPass = $_POST['nuevaPassword'];
        $confirmarPass = $_POST['confirmarPassword'];
        /**
         * Si nuevapass es igual a confirmarpass
         */
        if ($nuevaPass == $confirmarPass) {
            /**
            * Sentencia sql para  actualizar datos en la tabla veterinario
            */
            $sql = mysqli_query($conexion, "UPDATE tbl_veterinario SET clave_veterinario = '$nuevaPass' 
            WHERE clave_veterinario = '$clave_veterinario' ") or die (mysqli_error($conexion));

            echo "<script> alert('Contraseña actualizada');</script>";
            echo "<script>window.location='../vistas/inicio_de_sesion.php';</script>";
                
        }
            /**
             * Sino son iguales no se realiza la sentencia sql de actualizar
             */
            else{
                echo "<script type='text/javascript'>alert('Las contraseñas no coinciden')</script>"; 
                echo "<script>window.location='../vistas/cambiar_clave.php';</script>";

            }
    }
?>