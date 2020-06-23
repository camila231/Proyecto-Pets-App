<?php
/**
 * Se requiere la conexión de la base de datos
 */
require '../php/conexion.php';
/**
 * Se requiere librerias para utilizar PhpMailer
 */
require '../librerias/Exception.php';
require '../librerias/PHPMailer.php';
require '../librerias/SMTP.php';
/**
 * Si le da click en el botón enviar
 */
if(isset($_POST['enviar'])){
/**
 * @var String $email       correos de la tabla propietario
 * @var String $rol         
 */
  $email = $conexion ->real_escape_string($_POST['email']);
  $rol = $_POST['rol'];
/**
 * Si la variable rol es igual a propietario
 */
  if($rol == 'propietario') {
/**
 * Se realiza una consulta en la base de datos de la tabla propietario
 */
  $propietario = mysqli_query ($conexion, "SELECT * FROM tbl_propietario where email_propietario = '$email'");
/**
 * Si propietario es igual a 1
 * Se envia el correo para recuperar contraseña
 */
  if(mysqli_num_rows ($propietario) == 1) {
/**
 * @var String $nombre     
 */
    $nombre =mysqli_fetch_array($propietario);
/**
 * @var String $token       Crear un código único
 */
    $token = uniqid();
/**
 * Sentencia para actualizar datos de la tabla propietario
 */
    $actualizar = $conexion ->query("UPDATE tbl_propietario SET token = '$token' WHERE email_propietario = '$email'");
    $ruta = 'http://localhost/Pets_App/vistas/nueva_clave.php?nombre='.$nombre['nombre_1']."&token".$nombre['token'];
    $mensaje = " ". "<a href='$ruta'>Para cambiar tu contraseña da click aquí</a>";
  }else{
  echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
  echo "<script>window.location='..';</script>";
  }
  }
  /**
 * Si la variable rol es igual a administrador
 */
  if($rol == 'administrador') {
    /**
     * Se realiza una consulta en la base de datos de la tabla administrador
     */
      $administrador = mysqli_query ($conexion, "SELECT * FROM tbl_administrador where email = '$email'");
    /**
     * Si administrador es igual a 1
     * Se envia el correo para recuperar contraseña
     */
      if(mysqli_num_rows ($administrador) == 1) {
    /**
     * @var String $nombre     
     */
        $nombre =mysqli_fetch_array($administrador);
    /**
     * @var String $token       Crear un código único
     */
        $token = uniqid();
    /**
     * Sentencia para actualizar datos de la tabla administrador
     */
        $actualizar = $conexion ->query("UPDATE tbl_administrador SET token = '$token' WHERE email = '$email'");
        $ruta = 'http://localhost/Pets_App/vistas/nueva_clave.php?nombre='.$nombre['nombres']."&token".$nombre['token'];
        $mensaje = " ". "<a href='$ruta'>Para cambiar tu contraseña da click aquí</a>";
      }else{
      echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
      echo "<script>window.location='..';</script>";
      }
      }
/**
 * Si la variable rol es igual a veterinario
 */
  if($rol == 'veterinario') {
/**
 * Se realiza una consulta en la base de datos de la tabla veterinario
 */
    $veterinario = mysqli_query ($conexion, "SELECT * FROM tbl_veterinario where email_veterinario = '$email'");
/**
 * Si veterinario es igual a 1
 * Se envia el correo para recuperar contraseña
 */
    if(mysqli_num_rows ($veterinario) == 1) {
/**
 * @var String $nombre     
 */
      $nombre =mysqli_fetch_array($veterinario);
/**
 * @var String $token       Crear un código único
 */
      $token = uniqid();
/**
 * Sentencia para actualizar datos de la tabla veterinario
 */
      $actualizar = $conexion ->query("UPDATE tbl_veterinario SET token = '$token' WHERE email_veterinario = '$email'");
      $ruta = 'http://localhost/Pets_App/vistas/nueva_clave.php?nombre='.$nombre['nombre_1']."&token".$nombre['token'];
      $mensaje =  " ". "<a href='$ruta'>Para cambiar tu contraseña da click aquí</a>";
    }else{
    echo "<script>alert('Los datos son incorrectos, por favor revise e intente nuevamente');</script>";
    echo "<script>window.location='..';</script>";
    }
    }
			$mail = new PHPMailer\PHPMailer\PHPMailer();
			try{  
/**
 * Para usar el SMTP
 */
        $mail->isSMTP();
/**
 * Habilitar el Debug
 */
        $mail->SMTPDebug = 0;
/**
 * Configuración del servidor SMTP para envio
 */
        $mail->Host = 'smtp.gmail.com';
/**
 * Habilitar autenticacion SMTP
 */
        $mail->SMTPAuth = true;
/**
 * Puerto TCP para conexión
 */
			  $mail->Port = 587;
			  
        $mail->SMTPSecure = 'tls';
/**
 * Usuario del correo que se va utilizar para el envio
 */
        $mail->Username = "kevinparra2709@gmail.com";
/**
 * Clave del correo que se va utilizar para el envio
 */
        $mail->Password = "3117027938kevin";
/**
 * El mismo usuario del Username para ejecutar correctamente el correo PHP
 */
        $mail->setFrom('kevinparra2709@gmail.com', "PETS APP");
/**
 * Los correos donde va a llegar el mensaje 
 */
        $mail->addAddress($email);
/**
 * Establece el formato de HTML
 */
        $mail->isHTML(true);
/**
 * El asusto del mensaje
 */
        $mail->Subject = "Recuperar contraseña";
/**
 * Cuerpo del mensaje
 */
			  $mail->Body = "$mensaje";
        $mail-> CharSet = 'UTF8';    
/**
 * Envia el mensaje
 */ 
			  $mail->send();
			  if ($mail) {
				echo "<script> alert ('El correo se envio correctamente'); </script>";
        
			  }   
			} catch (Exception $e){
				echo 'hubo un error al enviar el mensaje', $mail->ErrorInfo;
			}
	   
		  }
	  ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <script type="text/javascript" src='../js/validarInicioDeSesion.js'></script>
    <link  href="../css/inicio_de_sesion.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Inicio de sesión</title>
</head>
<body>
<!--Se requiere la carpeta header que contiene el menú de navegación--> 
<?php require_once '../header/header.php'; ?>
<!--Div que contiene el formulario para iniciar sesión--> 
<div class="INICIO">
  <h4>Inicio de sesión</h4>
  <!--Br para dar un salto de línea --> 
  <br>
  <!--Formulario para iniciar sesión--> 
  <form action="../php/cod_inicio_de_sesion.php" method="POST" onsubmit="return inicio();">
    <input type="text" placeholder="Ingrese su usuario" name="usuario" id="usuario"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
    <input type="password" placeholder="Ingrese su contraseña" name="password" id="pass" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
    <select class="rol" id="rol" name="rol">
    <option  disabled selected>Rol</option>
    <option id="rol" value="propietario" >Propietario</option>
    <option id="rol" value="veterinario" >Veterinario</option>
    <option id="rol" value="administrador" >Administrador</option>
    </select>
    <br>
    <input id="boton" type="submit" value="Iniciar sesión">
    <center><div class="reset-password" style="margin-top:-9px;">
    <a href="../vistas/recuperar_clave.php">Olvide mi contraseña</a>
    </div> </center>
  </form>
  <!--Fin del formulario --> 
</div>    
</body>
</html>