<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/recuperar_contraseña.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Nueva clave</title>
</head>
<body>
<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include '../php/conexion.php';
    /**
     * Si le da en el botón enviar
     */
    if(isset($_POST['enviar'])){
        /**
         * Se definen 4 variables
         * @var  $rol
         * @var String $token
         * @var String $nuevaContraseña
         * @var $confirmarContraseña  
         */
        $rol = $_POST['rol'];
        $identificacion = $_POST['identificacion'];
        $nuevaContraseña = $_POST['nuevacontraseña'];
        $confirmarContraseña = $_POST['confirmarcontraseña'];
        /**
         * Si el rol es igual al propietario
         */
        if($rol == 'propietario') {
            /**
             * Si la nueva contraseña es igual a confirmar contraseña
             */
        if($nuevaContraseña = $confirmarContraseña){
        $contraseña = $nuevaContraseña;
                    /**
                     * @var $propietario
                     * Se realiza consulta sql a la base de datos para actualizar la tabla propietario 
                     */
                $propietario = mysqli_query($conexion,"UPDATE tbl_propietario SET clave_propietario = '$contraseña' WHERE identificacion_propietario = '$identificacion'");
                echo "<script> alert ('Contraseña actualizada.'); </script>";
                    header ('location: ../vistas/inicio_de_sesion.php');
            
            }
            /**
             * Sino no se cambia la contraseña
             */
            else{
                $error = "Error al cambiar la contraseña";
                echo "<script type='text/javascript'>alert($error)</script>";
                }
        }
        /**
         * Si el rol es igual al administrador
         */
        if($rol == 'administrador') {
            /**
             * Si la nueva contraseña es igual a confirmar contraseña
             */
        if($nuevaContraseña = $confirmarContraseña){
        $contraseña = $nuevaContraseña;
                    /**
                     * @var $administrador
                     * Se realiza consulta sql a la base de datos para actualizar la tabla administrador
                     */
                $administrador = mysqli_query($conexion,"UPDATE tbl_administrador SET clave_administrador = '$contraseña' WHERE identificacion_administrador = '$identificacion'");
                echo "<script> alert ('Contraseña actualizada.'); </script>";
                    header ('location: ../vistas/inicio_de_sesion.php');
            
            }
            /**
             * Sino no se cambia la contraseña
             */
            else{
                $error = "Error al cambiar la contraseña";
                echo "<script type='text/javascript'>alert($error)</script>";
                }
        }
        /**
         * Si el rol es igual a veterinario
         */
        if($rol == 'veterinario') {
            /**
             * Si nueva contraseña es igual a confirmar contraseña
             */
            if($nuevaContraseña = $confirmarContraseña){
            $contraseña = $nuevaContraseña;
            /**
             * @var $veterinario
             * Se realiza consulta sql a la base de datos para actualizar la tabla veterinario
             */
            $veterinario = mysqli_query($conexion,"UPDATE tbl_veterinario SET clave_veterinario = '$contraseña' WHERE identificacion_veterinario = '$identificacion'");
            echo "<script> alert ('Contraseña actualizada.'); </script>";
                header ('location: ../vistas/inicio_de_sesion.php');
                
            }
            /**
             * Sino no se cambia la contraseña
             */
            else{
                    $error = "Error al cambiar la contraseña";
                    echo "<script type='text/javascript'>alert($error)</script>";
                }
        }
    }
?>
<!--Center para centrar el formulario --> 
<center>
    <!--Formulario para recuperar la contraseña--> 
    <form  action="#" method="POST">
        <h1>Recuperar contraseña</h1>
        <br>
        <label class="codigo">Identificación</label>
        <br>
        <input  type="text" name="identificacion"  required="yes">
        <br>
        <label class="nuevacontraseña" >Nueva contraseña</label>
        <br>
        <input  type="password" name="nuevacontraseña" autocomplete="off" required="yes">
        <br>
        <label>Confirmar contraseña</label>
        <br>
        <input  type="password" name="confirmarcontraseña"  required="yes">
        <br><br>
        <select class="rol" name="rol">
        <option  disabled selected>Rol</option>
        <option value="propietario" >Propietario</option>
        <option value="veterinario" >Veterinario</option>
        <option value="administrador" >Administrador</option>
        </select>
        <br>
        <input type="submit" class="button" value="Recuperar contraseña" name="enviar">
    </form>
    <!--Fin del formulario --> 
</center>
</body>
</html>