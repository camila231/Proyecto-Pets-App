<?php 
  /**
   * Se incluye la conexión de la base de datos
   */
  include '../php/conexion.php';
  /**
   * Se definen 8 variables
   * @var Integer $codigo_de_mascota      codigo de mascota, tipo entero
   * @var Date $fecha_consulta            fecha consulta tipo fecha
   * @var String $nombre_mascota          nombre de la mascota, tipo cadena de caracteres
   * @var Date $fecha_de_nacimiento       fecha de nacimiento de la mascota, tipo fecha
   * @var String $raza                    raza de la mascota, tipo cadena de caracteres
   * @var String $sexo                    sexo de la mascota, tipo cadena de caracteres
   * @var String $diagnostico_mascota     diagnostico mascota, tipo cadena de caracteres
   * @var String $motivo_consulta         motivo de la consulta, tipo cadena de caracteres
   */
  $codigo_de_mascota =$_POST['codigo_mascota_editar'];
  $fecha_consulta =$_POST['fecha_editar'];
  $nombre_mascota=$_POST['nombre_mascota_editar'];
  $fecha_de_nacimiento =$_POST['fecha_nacimiento_editar'];
  $raza = $_POST['raza_editar'];
  $sexo =$_POST['sexo_editar'];
  $diagnostico_mascota =$_POST['diagnostico_editar'];
  $motivo_consulta =$_POST['motivo_editar'];
  /**
   * Sentencia sql para actualizar datos de la tabla historia clínica
   */
  $sql = "UPDATE tbl_historia_clinica SET fecha_consulta='$fecha_consulta',nombre_mascota ='$nombre_mascota',
  fecha_de_nacimiento ='$fecha_de_nacimiento',raza = '$raza',sexo ='$sexo',diagnostico_mascota='$diagnostico_mascota',
  motivo_consulta ='$motivo_consulta' WHERE codigo_de_mascota='$codigo_de_mascota'";
  $result = mysqli_query($conexion,$sql) or die (mysqli_error($conexion)); 
  echo "<script>alert('Se actualizo exitosamente.')</script>";
  echo "<script> window.location = '../vistas/ver_historia_clinica.php'</script>";

?>