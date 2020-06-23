/**
 * Alerta cuando se registre un veterinario
 */
function veterinario(){
    Swal.fire({
        title: 'Se registró correctamente.',
        text: 'Se revisará sus datos que acabo de ingresar para registrarse a nuestro aplicativo web Pets App, tenemos 6 días habiles para revisar su solicitud de registró, si es aceptado se le enviará un mensaje al correo avisándole que ya esta activo para iniciar sesión.',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#80E2E7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){
            location = '../vistas/registrar_veterinario.php';
        });
    });
}
/**
 * Alerta cuando se registre un propietario
 */
function propietario(){
    Swal.fire({
        icon: 'success',
        text: 'Se registró correctamente.',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#80E2E7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){
            location = '../vistas/registrar_propietario.php';
        });
    });
}
/**
 * Alerta cuando se va actualizar el perfil del propietario
 */
function perfilPropietario(){
    Swal.fire({
        icon: 'success',
        title: 'Se actualizo correctamente.',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#80E2E7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){
            location = '../vistas/perfil_propietario.php';
        });
    });
}
/**
 * Alerta cuando se va actualizar los datos de la mascota
 */
function actualizarMascota(){
    Swal.fire({
        icon: 'success',
        title: 'Se actualizo correctamente.',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#80E2E7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){
            location = '../vistas/agregar_mascotas.php';
        });
    });
}
/**
 * Alerta cuando se va solicitar una cita
 */
function solicitarCita(){
    Swal.fire({
        icon: 'success',
        title: 'Se solicito su cita correctamente.',
        text: 'Su cita va ser aceptada por uno de los veterinarios que estén disponibles.',
        confirmButtonText: 'Aceptar',
        confirmButtonColor: '#80E2E7',
        backdrop: false
    }).then(function(){
        setTimeout(function(){
            location = '../vistas/solicitar_cita.php';
        });
    });
}



