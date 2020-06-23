function SoloLetras(elEvento) {
/**
* Variable que define los caracteres permitidos
* @var permitidos 
*/
    var permitidos = " abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ";
/**
* Teclas especiales que se aceptan
* 8 = BackSpace 
* 13=Enter 
* 37 = flecha izquierda 
* 39 = flecha derecha
* 46 = Supr 
* @var teclas_especiales
*/
    var teclas_especiales = [8, 37, 39, 46, 13];
/**
* Obtener la tecla pulsada
* 
* @var evento
* @var codigoCaracter
* @var caracter
*/
    var evento = elEvento || window.event;
    var codigoCaracter = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(codigoCaracter);
/**
* Comprobar si la tecla pulsada es alguna de las teclas especiales
* 
* @var tecla_especial
*/
    var tecla_especial = false; 
        for (var i in teclas_especiales) {
        if (codigoCaracter == teclas_especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
/**
* Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
*/
    if (permitidos.indexOf(caracter) == -1) {
        if (tecla_especial == false) {
            alert('Este campo solo acepta letras, por favor revise e intente nuevamente llenando este campo.');
        }
    }
    return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
function SoloNumerosyLetras(elEvento) {
/**
* Variable que define los caracteres permitidos
* 
* @var permitidos 
*/
    var permitidos = "0123456789abcdefghijklmnñopqrstuvwxyzABCDEFGHIJKLMNÑOPQRSTUVWXYZ@ ";
/**
* Teclas especiales que se aceptan
* 8 = BackSpace 
* 13=Enter 
* 37 = flecha izquierda 
* 39 = flecha derecha
* 46 = Supr 
* @var teclas_especiales
*/
    var teclas_especiales = [8, 37, 39, 46, 13];
/**
* Obtener la tecla pulsada
* @var evento
* @var codigoCaracter
* @var caracter
*/
    var evento = elEvento || window.event;
    var codigoCaracter = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(codigoCaracter);
/**
* Comprobar si la tecla pulsada es alguna de las teclas especiales
* 
* @var tecla_especial
*/
    var tecla_especial = false; 
        for (var i in teclas_especiales) {
        if (codigoCaracter == teclas_especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
/**
* Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
*/
    if (permitidos.indexOf(caracter) == -1) {
        if (tecla_especial == false) {
            alert('Este campo solo acepta numeros y/o letras , por favor revise e intente nuevamente llenando este campo.');
        }
    }
    return permitidos.indexOf(caracter) != -1 || tecla_especial;
}
function SoloNumeros(elEvento) {
/**
* Variable que define los caracteres permitidos
* @var permitidos 
*/
    var permitidos = "0123456789";
/**
* Teclas especiales que se aceptan
* 8 = BackSpace 
* 13=Enter 
* 37 = flecha izquierda 
* 39 = flecha derecha
* 46 = Supr 
* @var teclas_especiales
*/
    teclas_especiales = [8, 37, 39, 46, 13];
/**
* Obtener la tecla pulsada
* @var evento
* @var codigoCaracter
* @var caracter
*/
    evento = elEvento || window.event;
    var codigoCaracter = evento.charCode || evento.keyCode;
    var caracter = String.fromCharCode(codigoCaracter);
/**
* Comprobar si la tecla pulsada es alguna de las teclas especiales
* 
* @var tecla_especial
*/
    var tecla_especial = false; 
        for (var i in teclas_especiales) {
        if (codigoCaracter == teclas_especiales[i]) {
            tecla_especial = true;
            break;
        }
    }
/**
* Comprobar si la tecla pulsada se encuentra en los caracteres permitidos
*/
    if (permitidos.indexOf(caracter) == -1) {
        if (tecla_especial == false) {
            alert('Este campo solo acepta números, por favor revise e intente nuevamente llenando este campo.');
        }
    }
    return permitidos.indexOf(caracter) != -1 || tecla_especial;
}