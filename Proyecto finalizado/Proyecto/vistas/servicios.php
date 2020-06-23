<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="../css/servicios.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
        <title>Servicios</title>
</head>
<body>
<!--Se requiere la carpeta header que contiene le menú de navegación -->
<?php require_once '../header/header.php'; ?>
<!--Div que contiene otros div con información y imagenes -->
<div class="w3-container">
    <!--Br para salto de línea-->
    <br><br>
  <div class="card_1">
  <!--Imagen de la vacuna-->
   <center> <img src="../images/vacuna.png" alt="Alps" class="img_vacuna"></center>
    <!--Descripción sobre la vacuna-->
    <div class="card_2">
      <center><h5 class="titulo_vacunacion">Vacunación</h5></center>
      <p class="informacion_vacuna">Las vacunas previenen la aparición de enfermedades que comprometen de la vida de nuestra mascota como la
        rabia o el moquillo. Ten en cuenta que las vacunas básicas son las del Moquillo, Parvovirus, Hepatitis, Leptospirosis y Rabia. </p>
    </div>
  </div>
  <div class="card_3">
    <!--Imagen de la consulta general-->
    <center> <img src="../images/consulta.png" alt="Alps" class="img_vacuna"></center>
     <div class="card_4">
     <!--Descripción sobre la consulta general-->
       <center><h5 class="titulo_consulta">Consulta general</h5></center>
       <p class="informacion_consulta">Una consulta general con un médico veterinario es de gran relevancia, debido a que así el profesional de esta área podrá examinar la salud de tu mascota
        (perro o gato), con el propósito de saber si se encuentra sano o si tiene algún problema.</p>
     </div>
   </div>
</div>
</body>
</html>