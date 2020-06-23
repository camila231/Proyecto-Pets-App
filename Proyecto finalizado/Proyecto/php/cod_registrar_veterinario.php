<?php
      /**
      *Se incluye la conexión de la base de datos
      */
      include "conexion.php";
      /**
       * Se incluye la vista de registrar veterinario, para que de la alerta que sale cuando un veterinario se registra
       * exitosamente
       */
      include "../vistas/registrar_veterinario.php";
      
      /**
       * Se definen 11 variables
       * @var String $identificacion_veterinario      Identificación del veterinario, tipo cadena de caracteres.
       * @var String $nombre_1                        Primer nombre del veterinario, tipo cadena de caracteres.
       * @var String $nombre_2                        Segundo nombre del veterinario, tipo cadena de caracteres.
       * @var String $apellido_1                      Primer apellido del veterinario, tipo cadena de caracteres.
       * @var String $apellido_2                      Segundo apellido del veterinario, tipo cadena de caracteres.
       * @var String $email_veterinario               Email del veterinario, tipo cadena de caracteres.
       * @var String $telefono_1                      Telefono del veterinario, tipo cadena de caracteres.
       * @var String $celular_1                       Celular del veterinario, tipo cadena de caracteres.
       * @var String $usuario_veterinario             usuario del veterinario, tipo cadena de caracteres.
       * @var String $clave_veterinario               clave del veterinario, tipo cadena de caracteres.
       * @var String $estado                          estado del veterinario, tipo cadena de caracteres.
       */
      $id = $_SESSION['administrador'];
      $identificacion_veterinario = $_POST['identificacionveterinario'];
      $nombre_1 = $_POST['nombre1'];
      $nombre_2 = $_POST['nombre2'];
      $apellido_1 = $_POST['apellido1'];
      $apellido_2 = $_POST['apellido2'];
      $email_veterinario = $_POST['emailveterinario'];
      $telefono_1 = $_POST['telefono1'];
      $celular_1 = $_POST['celular1'];
      $usuario_veterinario = $_POST['usuarioveterinario'];
      $clave_veterinario = $_POST['claveveterinario'];
      $disponibilidad = 'No disponible';
      $estado = 'Inactivo';
      $confirmarclave = $_POST['confirmarclave'];
      /**
       *Subir una imagen
      */
      $foto = $_FILES["foto"]["name"];
      $ruta = $_FILES["foto"]["tmp_name"];
      $destino="../img_veterinarios/";
      $destino= $destino."/".$foto;
      /**
      *move_uploaded_file si la imagen es valida se inserta la url y se sube el archivo a la carpeta img_mascotas
      */
      move_uploaded_file($ruta,$destino);
      /**
       * @var $sql                 Sentencia sql para insertar datos de la tabla veterinario
       */
      $sql = "INSERT INTO tbl_veterinario(identificacion_veterinario,nombre_1,nombre_2,
      apellido_1,apellido_2,email_veterinario,telefono_1,celular_1,foto,usuario_veterinario,clave_veterinario,disponibilidad,estado,identificacion_administrador)
      VALUES ('$identificacion_veterinario','$nombre_1','$nombre_2','$apellido_1','$apellido_2',
      '$email_veterinario','$telefono_1','$celular_1','$destino','$usuario_veterinario','$clave_veterinario','$disponibilidad','$estado','$id')"
      or die (mysqli_error($conexion)); 
      /**
      * @var $consulta              Consulta sql en la base de datos para que no se repitan usuarios
      */
      $consulta = mysqli_query($conexion, "SELECT * FROM tbl_veterinario WHERE usuario_veterinario = 
      '$usuario_veterinario'");
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
       * @var $result         Realiza la consulta en la base de datos
       */
      $result = mysqli_query($conexion, $sql);
      if(!$sql){ 
            echo '<script>
                  alert("Error al registrarse, intente de nuevo.");
                  window.history.go(-1);
                  </script>';
      }else{

            echo '<script src="https://cdn.jsdelivr.net/npm/sweetalert2@9.js"></script>';
            echo '<script src="../js/alertas.js"></script>';
            echo "<script lenguaje = javascript> veterinario(); </script>";
      }
      /**
       * Cierra la conexión abierta en la base de datos.
       */
      mysqli_close($conexion);
?>
