function registroVeterinario(){
    /**
     *Variables donde se van almacenar los datos
    * @var identificacionveterinario
    * @var nombre1
    * @var nombre2
    * @var apellido1
    * @var telefono1
    * @var celular1
    * @var usuarioveterinario
    * @var claveveterinario
    * @var confirmarclave
    */
  var identificacionveterinario, nombre1 , apellido1,emailveterinario, telefono1, celular1, usuarioveterinario,
  claveveterinario, confirmarclave;
    /**
     * Va seleccionar un elemento por el id
     * Value es para guardar su valor
     */
  identificacionveterinario =  document.getElementById("identificacionveterinario").value;
  nombre1 =  document.getElementById("nombreUno").value;
  nombre2 =  document.getElementById("nombreDos").value;
  apellido1 =  document.getElementById("apellidoUno").value;
  apellido2 =  document.getElementById("apellidoDos").value;
  emailveterinario =  document.getElementById("emailveterinario").value;
  telefono1 =  document.getElementById("telefonoUno").value;
  celular1 =  document.getElementById("celularDos").value;
  usuarioveterinario =  document.getElementById("usuarioveterinario").value;
  claveveterinario =  document.getElementById("claveveterinario").value;
  confirmarclave =  document.getElementById("confirmarclave").value;
    /**
     * @var expresion           Buscar información de la cadena de caracteres
     */
  expresion =/\w+@\w+.+[a-z]/;
    /**
     * Validar que no se envie con campos vacios
     * Si las variables son igual a vacio 
     */
  if(identificacionveterinario === "" || nombre1 === ""  || apellido1 === "" || apellido2 === "" ||
   telefono1 === "" || celular1 === "" || usuarioveterinario === "" || claveveterinario === "" || confirmarclave === ""){
      Swal.fire(
      "Ups!",
      "No puedes dejar campos vacios",
      "question"
      );
      /**
      * Return false es para que se detenga apenas se de en el botón
      */
      return false;
  }
  /**
   * Validar que la identificacionveterinario no sea menor de 3 o mayor de 25
   */
  else if (identificacionveterinario.length < 3 || identificacionveterinario.length > 25){
      Swal.fire(
      "lo siento",
      "Ingresa una identificación valida",
      "error"
      );
      return false;
  }
  /**
   * Validar que la nombre1 no sea menor de 3 o mayor de 20
   */
  else if (nombre1.length < 3 || nombre1.length > 20){
      Swal.fire(
      "lo siento",
      "Ingresa un primer nombre válido",
      "error"
      );
      return false;
  }
  /**
   * Validar que la apellido1 no sea menor de 3 o mayor de 25
   */
  else if (apellido1.length < 3 || apellido1.length > 25){
      Swal.fire(
      "lo siento",
      "Ingresa un primer apellido válido",
      "error"
      );
      return false;
  }
  /**
   * Validar que la apellido2 no sea menor de 3 o mayor de 25
   */
  else if (apellido2.length < 3 || apellido2.length > 25){
    Swal.fire(
    "lo siento",
    "Ingresa un segundo apellido válido",
    "error"
    );
    return false;
  }
  /**
   * Validar que la telefono1 no sea menor de 3 o mayor de 7
   */
  else if (telefono1.length < 3 || telefono1.length > 7){
      Swal.fire(
      "lo siento",
      "Ingresa un teléfono válido",
      "error"
      );
      return false;
  }
  /**
   * Validar que la celular1 no sea menor de 3 o mayor de 10
   */
  else if (celular1.length < 3 || celular1.length > 10){
      Swal.fire(
      "lo siento",
      "Ingresa un celular válido",
      "error"
      );
      return false;
  }
  /**
   * Validar que la usuarioveterinario no sea menor de 3 o mayor de 100
   */
  else if (usuarioveterinario.length < 3 || usuarioveterinario.length > 100){
      Swal.fire(
      "lo siento",
      "Ingresa un usuario válido",
      "error"
      );
      return false;
  }else if (claveveterinario.length < 3 || claveveterinario.length > 80){
      Swal.fire(
      "lo siento",
      "Ingresa una contraseña valida",
      "error"
      );
      return false;
  }else if (!expresion.test(emailveterinario)){
      Swal.fire(
      "lo siento",
      "Ingresa un email válido",
      "error"
      );
      return false;
  }else if(claveveterinario != confirmarclave){
    Swal.fire(
        "lo siento",
        "Las contraseñas no son iguales",
        "error"
        );
        return false;
  }
}