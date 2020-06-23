<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include "conexion.php";
    /**
     * Se definen 3 variables
     * @var String $clave_administrador         Clave del administrador, tipo cadena de caracteres.
     * @var String $nuevaPass                   Nueva clave del administrador, tipo cadena de caracteres.
     * @var String $confirmarPass               Confirmar clave del administrador, tipo cadena de caracteres.
     */
    if (isset($_POST['btn_cambiar'])) {
        $clave_administrador = $_POST['clave_administrador'];
        $nuevaPass = $_POST['nuevaPassword'];
        $confirmarPass = $_POST['confirmarPassword'];
        /**
         * Si nuevapass es igual a confirmarpass
         */
            if ($nuevaPass == $confirmarPass) {
                /**
                 * Sentencia sql para  actualizar datos en la tabla administrador
                 */
                $sql = mysqli_query($conexion, "UPDATE tbl_administrador SET clave_administrador = '$nuevaPass' 
                WHERE clave_administrador = '$clave_administrador' ") or die (mysqli_error($conexion));

                echo "<script> alert('Contraseña actualizada');</script>";
                echo "<script>window.location='../vistas/inicio_de_sesion.php';</script>";
                    
            }
            /**
             * Sino son iguales no se realiza la sentencia sql de actualizar datos en la tabla administrador
             */
            else{
                echo "<script type='text/javascript'>alert('Las contraseñas no coinciden')</script>"; 
                echo "<script>window.location='../vistas/clave_administrador.php';</script>";
            }
    }
?>