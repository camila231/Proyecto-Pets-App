<?php 
    /**
     * Se incluye la conexión de la base de datos
     */
    include '../php/conexion.php';
    /**
     * Se define 1 variable
     * @var String $identificacion_veterinario      identificacion del veterinario, tipo cadena de caracteres.
     * Si se obtiene hora
     */
    if(isset($_GET['hora'])){
        $identificacion_veterinario = $_GET['hora'];
        /**
         * Sentencia sql para borrar datos de la tabla horario
         */
        $query = mysqli_query($conexion ,"DELETE FROM tbl_horario WHERE codigo_hora = $identificacion_veterinario") 
        or die (mysqli_error($conexion));   
        /**
         * Si la sentencia se ejecuta correctamente borra los datos y lo direcciona a la pagina veterinario
         */
        if ($query) {
            echo '<script>
            alert("Se elimino correctamente.");
            window.history.go(-1);
            </script>';
            
        }
        /**
         * Sino muestra error
         */
        else{
            echo "Error";
        }

    }
?>