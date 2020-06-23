<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include "../php/conexion.php";
    /**
     * Se definen 5 variables
     * @var String $direccion       dirección tipo cadena de caracteres
     * @var String $barrio          barrio tipo cadena de caracteres
     * @var String $tipo_Consulta   tipo de consulta, tipo cadena de caracteres
     * @var Integer $leido          leido tipo entero
     * @var String $identificacion_propietario  identificación del propietario, tipo cadena de caracteres
     */
    if (isset($_POST['btn_solicitar'])) {
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $tipo_Consulta = $_POST['tipo_Consulta'];
        $leido = 0;
        $identificacion_propietario = $_POST['identificacion_propietario'];
        /**
         * Sentencia sql para insertar datos en la tabla solicitar cita
         */
        $query = mysqli_query($conexion,"INSERT INTO tbl_solicitar_cita(direccion,barrio,tipo_Consulta,leido
        ,identificacion_propietario)
        VALUES ('$direccion','$barrio','$tipo_Consulta','$leido','$identificacion_propietario'
        )") or die(mysqli_error($conexion));   
        /**
         * Si la sentencia se ejecuta correctamente, se insertan los datos en la tabla solicitar cita
         */ 
        if ($query) {
            echo "<script>alert('Solicito su cita inmediata correctamente.')</script>";
            echo "<script> window.location = '../vistas/solicitar_cita.php'</script>";
        }
        /**
         * Sino se ejecuta correctamente la sentencia va mostar un error
         */
                else{
                    echo "Error";
                }
    }
?>