<?php 
   /**
    * Se incluye la conexión de la base de datos
    */
   include 'conexion.php';
   /**
    * Se definen 6 variables
    * @var Integer $codigo_mascota           codigo mascota tipo entero
    * @var String $nombre_mascota_e          Nombre de la mascota, tipo cadena de caracteres
    * @var String $raza_mascota_e            Raza de la mascota, tipo cadena de caracteres
    * @var String $color_mascota_e           Color de la mascota, tipo cadena de caracteres
    * @var String $tamano_mascota_e          Tamaño de la mascota, tipo cadena de caracteres
    * @var Date $fecha_nacimiento_e          Fecha de nacimiento de la mascota, tipo fecha
    */
   /**
    * Si le da click en el botón actualizar
    */
   if (isset($_POST['btn_actualizar'])){
      $codigo_mascota = $_POST['codigo'];
      $nombre_mascota_e = $_POST['nombre_mascota'];
      $raza_mascota_e = $_POST['raza_mascota'];
      $color_mascota_e = $_POST['color_mascota'];
      $tamano_mascota_e = $_POST['tamano_mascota'];
      $fecha_nacimiento_e = $_POST['fecha_nacimiento_mascota'];
      // $foto_mascota_e = $_POST['foto_mascota'];
      /**
       * Sentencia sql para  actualizar datos en la tabla mascota
      */
         $actualizar=mysqli_query($conexion,"UPDATE tbl_mascota SET nombre_mascota='$nombre_mascota_e',raza_mascota ='$raza_mascota_e',
         color_mascota ='$color_mascota_e',tamano_mascota ='$tamano_mascota_e',fecha_nacimiento = '$fecha_nacimiento_e'
         WHERE codigo_mascota='$codigo_mascota'") or die (mysqli_error($conexion));
         echo '<script>
         alert("Se actualizo correctamente.");
         window.history.go(-1);
         </script>';
   }
   /**
    * Entonces si le da click en el botón eliminar
    */
   elseif(isset($_POST['btn_eliminar'])){
      $codigo_mascota = $_POST['codigo'];
      /**
      * Sentencia sql para  eliminar datos en la tabla mascota
      */
      $eliminar=mysqli_query($conexion,"DELETE FROM tbl_mascota WHERE codigo_mascota='$codigo_mascota'") or die ('error al eliminar');
      echo '<script>
    alert("Se elimino correctamente su mascota.");
    window.history.go(-1);
    </script>';
   }
?>