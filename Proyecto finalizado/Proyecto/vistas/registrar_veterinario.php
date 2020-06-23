<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <link  href="../css/registrar_veterinario.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <script src="../js/sweetalert2@9.js"></script>
    <script src='../js/validarRegistroV.js'></script>
    <title>Registro veterinario</title>
</head>
<body>
<!--Se requiere la carpeta header que contiene el menú de navegación-->
<?php require_once '../header/header.php'; ?>   
<!--Div que contiene otros tres div-->
<div id="container">
    <!--DIv que contiene el titulo-->
    <div class="titulo"><h1><center>Registro Veterinario</center></h1></div>
    <!--Div que contiene el formulario-->
    <div class="columna-1">
        <!--Formulario para el registro del veterinario-->
         <!--El onsubmit="return registroPropietario();" es una función de javascript para las funciones--> 
        <form action="../php/cod_registrar_veterinario.php" method="POST" enctype="multipart/form-data" onsubmit="return registroVeterinario();">
            <label for="fname" class="letra">Identificación</label>
            <input type="text"  class=" form1" placeholder="Ingrese su número de identificación" id="identificacionveterinario" name="identificacionveterinario" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Primer nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer nombre" id="nombreUno" name="nombre1" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Segundo nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo nombre" id="nombreDos" name="nombre2" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Primer apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer apellido" id="apellidoUno" name="apellido1" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Segundo apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo apellido" id="apellidoDos" name="apellido2" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">E-mail</label>
            <input type="text" class=" form1" placeholder="Ingrese su correo e-mail" id="emailveterinario" name="emailveterinario" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
  
    </div>
    <div class="columna-2">    
            <label for="fname" class="letra">Telefono</label>
            <input type="tel" class=" form1" placeholder="Ingrese su número de telefono"  id="telefonoUno" name="telefono1" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Celular</label>
            <input type="tel" class=" form1" placeholder="Ingrese su número de celular" id="celularDos" name="celular1" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Tarjeta profesional</label>
            <input type="file" class="form1" name="foto">

            <label for="fname" class="letra">Usuario</label>
            <input type="text" class=" form1" placeholder="Ingrese su usuario" id="usuarioveterinario" name="usuarioveterinario"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Contraseña</label>
            <input type="password" class=" form1" placeholder="Ingrese su contraseña" id="claveveterinario" name="claveveterinario"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Verificar contraseña</label>
            <input type="password" class=" form1" placeholder="Ingrese su contraseña verificada" id="confirmarclave" name="confirmarclave"  onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
    </div>
            <!--Br para un salto de línea-->
            <br>
            <input type="submit" id="boton" name="btn"  value="Registrar">
             <!--Br para un salto de línea-->
            <br>
        </form>
        <!--Fin del formulario-->
</div>   
</body>
</html>