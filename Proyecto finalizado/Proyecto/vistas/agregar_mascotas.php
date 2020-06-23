<?php
  /**
   * Se incluye la conexión de la base de datos
   */
  include '../php/conexion.php';
  session_start();
  /**
   * Si la sesión del propietario esta iniciada
   * va dejar ver esta vista
   */
  if (isset($_SESSION['propietario'])) {
  ?>
  <!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
      <meta name="viewport" content="width=device-width, initial-scale=1.0">
      <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
      <link  href="../css/agregar_mascotas.css" rel="stylesheet" type="text/css">
      <script type="text/javascript" src='../js/validaciones.js'></script>
      <meta http-equiv="X-UA-Compatible" content="ie=edge">
      <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
      <title>Agregar mascotas</title>
  <body>
  <div id="container">
    <!--Se requiere la carpeta header que contiene el menú de navegación de la sesión del propietario--> 
    <?php require_once '../header/header_propietario.php'; ?>
      <br><br>
    <!--Div que contiene un botón para que el propietario le de click y le pueda salir el formulario 
    para agregar la mascota. --> 
    <!--Onclick es  una función de javascript, se esta utilizando para cuando le den click en el botón aparezca el formulario
    que esta oculto--> 
      <div class="boton">
        <button onclick="mostrar()">Agregar mascotas</button>  
      </div>
      <div class="columna1">
        <?php
    /**
     * $id      Se llama el id de la sesión del propietario
     */
              $id = $_SESSION['propietario'];
    /**
     * Se realiza una consulta sql a la base de datos para traer los datos de la mascota donde la identificación del 
     * propietario sea = al id de la sesión
     */
              $query = mysqli_query($conexion,"SELECT * FROM tbl_mascota where `identificacion_propietario` = '$id'");
              while($row = mysqli_fetch_array($query)){
        ?>
    <!--Div que contiene un formulario --> 
      <div id="confirm" class="formulario">
    <!--Formulario donde se va mostrar la información de la mascota que trae la consulta sql de la base de datos--> 
        <form action="../php/cod_editar_mascota.php" method="POST">
                            
          <h2><center>Mi Mascota</center></h2>
    <!--Div que contiene la imagen de la mascota que trae la consulta sql de la base de datos--> 
    
    <?php echo '<img id="myImg" alt="" width="140" height="140" src="'.$row["foto_mascota"].'">'; ?> 

    <!-- Modal --> 
    <div id="myModal" class="modal">
    <span class="close">&times;</span>
    <img class="modal-content" id="img01">
    <div id="caption"></div>
    </div>
    <br>
    <!--Hidden para ocultar el código de la mascota--> 
          <textarea hidden name="codigo" id="" cols="30" rows="10"><?php echo $row['codigo_mascota'];?></textarea>
          <label >Nombre</label>
          <input type="text" placeholder="" name="nombre_mascota" value="<?php echo $row['nombre_mascota'];?>" required="yes" >
                
          <label >Raza</label>
          <input type="text" placeholder="" name="raza_mascota" value="<?php echo $row['raza_mascota'];?>" required="yes" >
                
          <label>color</label>
          <input type="text" placeholder="" name="color_mascota" value="<?php echo $row['color_mascota'];?>" required="yes" >
                  
          <label >Tamaño</label>
          <input type="text" placeholder="" name="tamano_mascota" value="<?php echo $row['tamano_mascota'];?>" >
                
          <label >Fecha de nacimiento</label>
          <input type="date" placeholder="" name="fecha_nacimiento_mascota"  value="<?php echo $row['fecha_nacimiento'];?>" required="yes">
                        
          <input class="boton_actualizar" type="submit" name="btn_actualizar" value="Actualizar"> 
          <input class="boton_borrar" type="submit" name="btn_eliminar"  value="Eliminar" >
        </form>
    <!--Fin del formulario que contiene los datos de la mascota--> 
      </div>
    <!--Br para dar un salto de linea--> 
          <br>
          <?php
    /**
     * } para cerrar el ciclo
     */
            }
          ?>                        
    </div>

    <div class="columna2" id="columna2">
    <!--Formulario para agregar a la mascota--> 
      <form  action="../php/cod_mascotas.php" id="enviar" method="POST" enctype="multipart/form-data" onsubmit="return agregarMascota();">
      <!--Center para centrar el titulo-->          
        <h2><center>Mi Mascota</center></h2>
        <center><img src="../images/img_agregar_mascota.png" class="img_mascota"></center>
        <label class="input_form2" >Nombre</label>
        <input type="text" id="nombre_mascota" class="input_form2" placeholder="Ingrese el nombre de su mascota"  name="nombre_mascota"  onkeypress="return SoloLetras(event)" onpaste="return false">

        <label class="input_form2" >Raza</label>
        <input type="text" class="input_form2" placeholder="Ingrese la raza de su mascota" id="RazaMascota" name="raza_mascota"  onkeypress="return SoloLetras(event)" onpaste="return false"  >

        <label class="input_form2">color</label>
        <input type="text" class="input_form2" placeholder="Ingrese el color de su mascota" id="colorMascota" name="color_mascota"  onkeypress="return SoloLetras(event)" onpaste="return false" >

        <label class="input_form2">Tamaño</label>
        <input type="text" class="input_form2" placeholder="Ingrese el tamaño de su mascota" id="tamanoMascota" name="tamano_mascota" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false" >

        <label class="input_form2">Fecha de nacimiento</label>
        <input type="date" class="input_form2" placeholder="" name="fecha_nacimiento_mascota" id="fechaNacimiento" onkeypress="return SoloNumeros(event)" onpaste="return false" >
        
        <label class="input_form2">Foto de su mascota</label>
        <input type="file" class="input_form2" name="foto_mascota">
        <!--Onclick para que no deje enviar el formulario con campos vacios--> 
        <input class="boton_agregar" type="button" name="btn" value="Agregar" id="btn-quitar" onclick="quitar()">
      </form>
    </div>

  </div>
  <script>
  /**
  *Función que va poner visible el formulario que esta en la columna 2
  */
    function mostrar(){
      document.getElementById("columna2").style.visibility = "visible";
    }
  /**
  *Función para que cuando se le de click el el botón agregar no lo deje enviar si hay campos vacios*/
    function quitar(){
  if( document.getElementById("nombre_mascota").value == ""){
    alert("Debes llenar todos los datos de tu mascota.");
  }
  /**
  *Si el formulario ya esta lleno lo deje enviar para almacenar los datos en a base de datos
  */else{
      document.getElementById("enviar").submit();
      document.getElementById("columna2").style.visibility = "hidden";
    }
    }
  </script>
    <script type="text/javascript" src='../js/ampliarFotos.js'></script>
  </body>
  </html>
  <?php
  }
  /**
   * Sino está la sesión  del propietario lo direccione al index
   */
  else{
      header('Location: ../index.php');
  }
?>