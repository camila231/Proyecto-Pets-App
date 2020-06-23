function solicitarCita(){
    /**
     *Variables donde se van almacenar los datos
    * @var identificacionpropietario
    * @var direccion
    * @var barrio
    * @var tipoConsulta
    */
    var identificacionpropietario,direccion,barrio,tipoconsulta;
    /**
     * Va seleccionar un elemento por el id
     * Value es para guardar su valor
     */
    identificacionpropietario =   document.getElementById("identificacionPropietario").value;
    direccion =   document.getElementById("direccion").value;
    barrio =   document.getElementById("barrio").value;
    tipoconsulta =   document.getElementById("tipoConsulta").value;
    /**
     * Validar que no se envie con campos vacios
     * Si las variables son igual a vacio 
     */
    if( identificacionpropietario === "" || direccion === "" || barrio === "" || tipoconsulta ==="" || fecha === "" ){
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
    }
}