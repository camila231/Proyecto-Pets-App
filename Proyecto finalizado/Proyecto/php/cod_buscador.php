<html>
<head>
<link  href="../css/ver_historia_clinica.css" rel="stylesheet" type="text/css">
</head>
</html>
<?php
/**
 * Conexión a la base de datos
 * @var $username
 * @var $servername
 * @var $password
 * @var $dbname
 * @var $conexion
 */
	$servername = "localhost";
    $username = "root";
  	$password = "";
	$dbname = "pets_app";

	$conexion = new mysqli($servername, $username, $password, $dbname);
      if($conexion->connect_error){
        die("Conexión fallida: ".$conexion->connect_error);
      }

    $salida = "";
/**
 * Consulta de busqueda en la tabla historia clínica
 * @var $query
 * @var $resultado
 */
    $query = "SELECT * FROM tbl_historia_clinica ";

    if (isset($_POST['consulta'])) {
    	$q = $conexion->real_escape_string($_POST['consulta']);
    	$query = "SELECT codigo_de_mascota,id_propietario,nombre_mascota,fecha_consulta FROM 
        tbl_historia_clinica WHERE id_propietario LIKE '%" .$q."%'
		 OR nombre_mascota  LIKE '%" .$q."%' OR fecha_consulta LIKE '%" .$q."%' ";
    }

    $resultado = $conexion->query($query);
/**
 * Si existe lo que esta buscando  en la consulta, lo muestra en la tabla
 */
    if ($resultado->num_rows>0) {
    	$salida.="<table id='borde'>
    			<thead>
    				<tr>
    					<td>Identificación:</td>
    					<td>Nombre:</td>
						<td>fecha consulta:</td>
						<td></td>
    				</tr>

    			</thead>
    			
    	<tbody>";

    	while ($fila = $resultado->fetch_assoc()) {
    		$salida.="<tr>
    					<td>".$fila['id_propietario']."</td>
    					<td>".$fila['nombre_mascota']."</td>
						<td>".$fila['fecha_consulta']."</td>
						<td><button class='boton'><a  href='../vistas/editar.php?historia=".$fila['codigo_de_mascota']." 
						'>Ver</a></button></td>
					
    				</tr>";

    	}
    	$salida.="</tbody></table>";
	}
/**
 * Sino encuentra datos en la busqueda, muestra un mensaje
 */else{
    	$salida.="No hay ninguna historia clínica con esos datos.";
	}
	
    echo $salida;

    $conexion->close();
?>