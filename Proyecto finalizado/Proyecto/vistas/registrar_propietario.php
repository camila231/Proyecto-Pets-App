<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/registrar_propietario.css" rel="stylesheet" type="text/css">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <script type="text/javascript" src='../js/validaciones.js'></script>
    <script src="../js/sweetalert2@9.js"></script>
    <script src='../js/validarRegistroP.js'></script>
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Registro propietario</title>
</head>
<body>
<!--Se requiere la carpeta header que contiene el menú de navegación --> 
<?php require_once '../header/header.php'; ?>
<!--Div que contiene otros tres div--> 
<div id="container">
    <!--Div que contiene el titulo--> 
    <div class="titulo"><h1><center>Registro Propietario</center></h1></div>
    <!--Div que contiene el formulario--> 
    <div class="columna-1">
        <!--Formulario de registro del propietario --> 
        <!--El onsubmit="return registroPropietario();" es una función de javascript para las funciones--> 
        <form  action="../php/cod_registrar_propietario.php" method="post" onsubmit="return registroPropietario();">
            <label for="fname" class="letra">Identificación</label>
            <input type="text"  class=" form1" placeholder="Ingrese su número de identificación"    id="identificacionpropietario" name="identificacionpropietario" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Primer nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer nombre"  id="nombreUno" name="nombre1" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Segundo nombre</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo nombre"id="nombreDos" name="nombre2" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Primer apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su primer apellido"  id="apellidoUno" name="apellido1" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Segundo apellido</label>
            <input type="text" class=" form1" placeholder="Ingrese su segundo apellido"id="apellidoDos" name="apellido2" onkeypress="return SoloLetras(event)" onpaste="return false">

            <label for="fname" class="letra">E-mail</label>
            <input type="text" class=" form1" placeholder="Ingrese su correo e-mail"  id="emailpropietario" name="emailpropietario" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
    </div>
    
    <div class="columna-2">   
            <label for="fname" class="letra">Dirección</label>
            <input type="text" class=" form1" placeholder="Ingrese su dirección"  id="direccion" name="direccion" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Celular</label>
            <input type="text" class=" form1" placeholder="Ingrese su número de celular"  id="celularUno" name="celular1" onkeypress="return SoloNumeros(event)" onpaste="return false">

            <label for="fname" class="letra">Usuario</label>
            <input type="text" class=" form1" placeholder="Ingrese su usuario"  id="usuariopropietario" name="usuariopropietario" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Contraseña</label>
            <input type="password" class=" form1" placeholder="Ingrese su contraseña"  id="clavepropietario" name="clavepropietario" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">

            <label for="fname" class="letra">Verificar contraseña</label>
            <input type="password" class=" form1" placeholder="Ingrese su contraseña verificada" id="verificarcontraseña" name="verificarcontraseña" onkeypress="return SoloNumerosyLetras(event)" onpaste="return false">
    </div>
            <!--Br para salto de línea-->
            <br>
            <input type="submit" id="boton" name="btn" value="Registrar">
            <!--Br para salto de línea-->
            <br>
        </form>
        <!--Fin del formulario-->
</div>
</body>
</html>