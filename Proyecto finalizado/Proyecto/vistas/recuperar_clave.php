<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link  href="../css/recuperar_contraseña.css" rel="stylesheet" type="text/css">
    <link rel="shortcut icon" href="../images/LOGOO.PNG" type="image/x-icon">
    <title>Recuperar clave</title>
</head>
<body>
<!--Para centrar el formulario--> 
<center>
    <!--Formulario para recuperar la contraseña --> 
    <form  action="../vistas/inicio_de_sesion.php" method="POST">
        <h1>Recuperar contraseña</h1>
        <!--Br para salto de línea--> 
        <br>
        <select class="rol" name="rol">
        <option  disabled selected>Rol</option>
        <option value="propietario" >Propietario</option>
        <option value="veterinario" >Veterinario</option>
        <option value="administrador" >Administrador</option>
        </select>
        <!--Br para salto de línea --> 
        <br>
        <input  type="email" name="email" placeholder="Ingrese su correo electrónico"required="yes">
        <!--Br para salto de línea--> 
        <br>
        <input type="submit" class="button" value="Enviar" name="enviar">
    </form>
    <!--Fin del formulario --> 
</center>
</body>
</html>