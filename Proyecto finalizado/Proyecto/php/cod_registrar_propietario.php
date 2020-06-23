<?php
	/**
    *Se incluye la conexión de la base de datos
    */
	include "conexion.php";
	/**
       * Se incluye la vista de registrar propietario, para que de la alerta que sale cuando un propietario se registra
       * exitosamente
       */
	include "../vistas/registrar_propietario.php";
	/**
	 * Se definen 11 variables
	 * @var String $identificacion_propietario			Identificación del propietario, tipo cadena de caracteres
	 * @var String $nombre_1							Primer nombre del propietario, tipo cadena de caracteres
	 * @var String $nombre_2							Segundo nombre del propietario, tipo cadena de caracteres
	 * @var String $apellido_1							Primer apellido del propietario, tipo cadena de caracteres
	 * @var String $apellido_2							Segundo apellido del propietario, tipo cadena de caracteres
	 * @var String $email_propietario					Email del propietario, tipo cadena de caracteres
	 * @var String $direccion							Dirección del propietario, tipo cadena de caracteres
	 * @var String $celular_1							Celular del propietario, tipo cadena de caracteres
	 * @var String $usuario_propietario					Usuario del propietario, tipo cadena de caracteres
	 * @var String $clave_propietario					Clave del propietario, tipo cadena de caracteres
	 * @var String $confirmar							Confirmar clave del propietario, tipo cadena de caracteres
	 */
	$identificacion_propietario = $_POST['identificacionpropietario'];
	$nombre_1 = $_POST['nombre1'];
	$nombre_2 = $_POST['nombre2'];
	$apellido_1 = $_POST['apellido1'];
	$apellido_2 = $_POST['apellido2'];
	$email_propietario = $_POST['emailpropietario'];
	$direccion = $_POST['direccion'];
	$celular_1 = $_POST['celular1'];
	$usuario_propietario = $_POST['usuariopropietario'];
	$clave_propietario = $_POST['clavepropietario'];
	$confirmar = $_POST['verificarcontraseña'];	
	/**
	* Sentencia sql para insertar datos en la tabla propietario
	*/
	$sql = "INSERT INTO tbl_propietario (identificacion_propietario,nombre_1,nombre_2,apellido_1,apellido_2,email_propietario,direccion,celular_1,usuario_propietario,clave_propietario)
	VALUES ('$identificacion_propietario','$nombre_1','$nombre_2','$apellido_1','$apellido_2',
	'$email_propietario','$direccion','$celular_1','$usuario_propietario','$clave_propietario')"or 
	die (mysqli_error($conexion));
	/**
	* @var $consulta			Consulta sql en la base de datos para que no se repitan usuarios
	*/
	$consulta = mysqli_query($conexion, "SELECT * FROM tbl_propietario WHERE usuario_propietario = 
	'$usuario_propietario'");
	/**
    * Si consulta es mayor a 0 mostrar una alerta informando que el usuario ya se encuentra registrado
    */
	if(mysqli_num_rows($consulta)>0){
		echo '<script>
			alert("El usuario ya se encuentra registrado");
			window.history.go(-1);
			</script>';
		exit;
	} 
	/**
	 * @var $result			Realiza la consulta en la base de datos
	 */
	$result = mysqli_query($conexion, $sql);

	if(!$sql){ 
		echo '<script>
			alert("Error al resgitrarse, intente de nuevo.");
			window.history.go(-1);
		</script>';
	}else{
		echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.js"></script>';
        echo '<script src="../js/alertas.js"></script>';
        echo "<script lenguaje = javascript> propietario(); </script>";
	}
	/**
    * Cierra la conexión abierta en la base de datos.
    */
	mysqli_close($conexion);
?>