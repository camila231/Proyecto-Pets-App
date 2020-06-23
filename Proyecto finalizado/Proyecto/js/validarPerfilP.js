function PerfilPropietario(){
    /**
     *Variables donde se van almacenar los datos
    * @var nombre1
    * @var nombre2
    * @var apellido1
    * @var apellido2
    * @var direccion
    * @var celular1
    */
    var nombre1,nombre2,apellido1,apellido2,emailpropietario,direccion,celular1;
    /**
     * Va seleccionar un elemento por el id
     * Value es para guardar su valor
     */
    nombre1 =   document.getElementById("nombreUno").value;
    nombre2 =   document.getElementById("nombreDos").value;
    apellido1 =   document.getElementById("apellidoUno").value;
    apellido2 =   document.getElementById("apellidoDos").value;
    emailpropietario =   document.getElementById("emailpropietario").value;
    direccion =   document.getElementById("direccion").value;
    celular1 =   document.getElementById("celularUno").value;
    /**
     * Validar que no se envie con campos vacios
     * Si las variables son igual a vacio 
     */
    if( nombre1 === "" || apellido1 === "" || apellido2 === "" || emailpropietario ==="" || direccion === "" ||
            celular1 === ""){
            /**
             * Le sale una alerta informandole que no se puede enviar con campos vacios
             */
            Swal.fire(
                "ups!",
                "No puedes dejar campos vacios",
                "question"
            );
            /**
            * Return false es para que se detenga apenas se de en el botón
            */ 
            return false;
    }else if (nombre1.length < 3 || nombre1.length > 20){
        Swal.fire(
        "lo siento",
        "Ingresa un primer nombre válido",
        "error"
        );
        return false;
    }else if (nombre2.length < 3 || nombre2.length > 20){
        Swal.fire(
        "lo siento",
        "Ingresa un segundo nombre válido",
        "error"
        );
        return false;
    }else if (apellido1.length < 3 || apellido1.length > 25){
        Swal.fire(
        "lo siento",
        "Ingresa un primer apellido válido",
        "error"
        );
        return false;
    }else if (celular1.length < 3 || celular1.length > 10){
        Swal.fire(
        "lo siento",
        "Ingresa un celular válido",
        "error"
        );
        return false;
    }else if (!expresion.test(emailpropietario)){
        Swal.fire(
        "lo siento",
        "Ingresa un email válido",
        "error"
        );
        return false;
    }
}