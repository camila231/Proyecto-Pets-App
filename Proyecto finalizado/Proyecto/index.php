<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://fonts.googleapis.com/css?family=Roboto+Condensed|Roboto+Slab&display=swap" rel="stylesheet">
    <link  href="css/index.css" rel="stylesheet" type="text/css">
    <script src="https://use.fontawesome.com/5e676b5ade.js"></script>
    <script src="https://unpkg.com/ionicons@4.5.10-0/dist/ionicons.js"></script>
    <link rel="shortcut icon" href="../Pets_App/images/LOGOO.PNG" type="image/x-icon">
    <title>Index</title>
</head>
<body>
    <!--Div que contiene todo lo que esta en esta vista --> 
    <div id="container">
         <!--Div que contiene el menú --> 
     <div id="containerheader"> 
          <!--Inicio del menú --> 
        <header>
            <nav class="nav">
                <ul>
                    <img src="../Pets_App/images/LOGOO.PNG" class="logo_imagen"><a class="pets_app">Pets App</a>
                    <li><a href="index.php">Inicio</a>
                    </li>
                    <li><a href="../Pets_App/vistas/servicios.php">Servicios</a>
                    </li>
                    <li><a href="#">Registrarse</a>
                        <ul>
                        <li><a href="../Pets_App/vistas/registrar_propietario.php">Propietario</a></li>
                           <li><a href="../Pets_App/vistas/registrar_veterinario.php">Veterinario</a></li>
                        </ul>
                      </li>
                      <li><a href="../Pets_App/vistas/inicio_de_sesion.php">Iniciar sesión</a>
                    </li>
                </ul>
            </nav>
        </header>
         <!--Fin del menú --> 
    </div>
        <!--Div que contiene una figura --> 
        <div class="container1">
            <div class="figura"><img src="../Pets_App/images/PerroGato.png" id="img-index"></div> 
        </div>
         <!--Div que contiene una descripción del proyecto--> 
        <div class="container2">
            <p class="texto1">Protege a tu mascota.</p>
            <p class="texto2">Somos un aplicativo web para veterinarios en casa, la cual le brindará </p>
            <p class="texto3">un servicio más cómodo desde su hogar.</p><br>
            
        </div>
         <!--Div que contien otros dos div con la misión y la visión --> 
        <div class="container3">
             <!-- Div que contiene la misión--> 
            <div class="containermision">
                <h2 class="letra_titulo_mision"><center>Misión</center></h2>
                <h5 class="letra_mision_vision"><center>Ofrecer servicios de veterinarios a domicilio para satisfacer a las personas 
                de la ciudad de Medellín con mascotas (perros y gatos) y permitir a los veterinarios brindar los
                servicios ya sea de consulta general o vacunación a través del aplicativo web "Pets App".</center></h5>
            </div>
             <!--Div que contiene la visión --> 
            <div class="containervision">
                <h2 class="letra_titulo_mision" ><center>Visión</center></h2>
                <h5 class="letra_mision_vision"><center>Pets App en el 2025 será multiplataforma, estará disponible para más animales y ampliar 
                la cobertura a otros lugares.</center></h5>
            </div>
        </div>
         <!-- Div que contiene el acerca de nosotros--> 
        <div class="container4">
                <h2 ><center>Acerca de nosotros</center></h2>
                <center><p class="letra_nosotros">Soy aprendiz de análisis y desarrollo de sistemas de información del Sena.
                     El aplicativo web de veterinarios en casa, es para aquellos veterinarios que no tienen la facilidad de tener 
                     una clínica veterinaria o no tienen un empleo fijo, y también para aquellas personas que no tienen 
                     la facilidad de llevar su mascota a una clínica veterinaria.</p></center>
        </div>
        <!-- Div que contiene otro div con el footer--> 
        <div class="container5">
            <div>
                <p class="año">2020 Pets App</p>
                <p class="email"><i class="fa fa-envelope" aria-hidden="true"></i> petsapp4@gmail.com</p>
            </div>
        </div>
    </div>
</body>
</html>