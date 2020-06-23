<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include "../php/conexion.php";
    /**
     * Se incluye la vista de reservar citas para llamar la identificación de la sesión del propietario
     */
    include "../vistas/reservar_cita.php";
    /**
     * Se definen 7 variables
     * @var String $id
     * @var String $direccion           Dirección tipo cadena de caracteres
     * @var String $barrio              Barrio tipo cadena de caracteres
     * @var String $fecha               Fecha tipo cadena de caracteres
     * @var String $hora                Hora tipo cadena de caracteres
     * @var String $tipo_Consulta       tipo de consulta tipo cadena de caracteres
     * @var String $veterinario         veterinario tipo cadena de caracteres
     * @var String $atendido            Atendido tipo cadena de caracteres
     */
    /**
     * Si le da click en el botón reservar
     */
    if (isset($_POST['btn_reservar'])) {
        /**
         * La variable id es para traer la identificación del propietario
         */
        $id = $_SESSION['propietario'];
        $direccion = $_POST['direccion'];
        $barrio = $_POST['barrio'];
        $fecha =$_POST['fecha'];
        $hora =$_POST['hora'];
        $tipo_Consulta = $_POST['tipo_Consulta'];
        $veterinario = $_POST['veterinario'];
        $id_veterinario = $_POST['id_veterinario'];
        $atendido = 'No';
        /**
         * Sentencia sql para insertar datos en la tabla reservar cita
         */       
        $query = mysqli_query($conexion,"INSERT INTO tbl_reservar_cita(direccion_reserva,barrio_reserva,fecha_reserva,
        hora_reserva,tipo_Consulta,veterinario,id_v,atendido,identificacion_propietario) 
        VALUES ('$direccion','$barrio','$fecha','$hora','$tipo_Consulta','$veterinario','$id_veterinario','$atendido','$id')") 
        or die(mysqli_error($conexion));    
        /**
         * Si se inserta correctamente le muestra una alerta
         */
        if ($query) {
                echo '<script>
                alert("Su cita se reservo exitosamente.");
                window.history.go(-1);
                </script>';
        }
            
    }

?>