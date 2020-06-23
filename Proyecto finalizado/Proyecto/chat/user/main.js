/**
 * @var socket          Para saber cuando alguien ingrese al socket(Chat)
 * 'forceNew': true     es para que la conexión se fuerce
 */
var socket = io.connect('http://192.168.1.1:6677', { 'forceNew': true });
/**
 * Ricibimos 'messages' lo que emite el evento socket, desde la carpeta server en el archivo index.js
 */
socket.on('messages', function(data){
    /**
     * El console.log es para mirar los datos que tiene por defecto en la consola
     */
    console.log(data);
    render(data);
});
/**
 * Función para poder recibir el array de mensajes, que llegan desde el servidor y mostrarlos en pantalla
 */
function render(data){
/**
 * @var html        variable que permite recorrer esa información y poder mostrarla
 * El metodo map recibe una función que tiene dos parametros: El dato que contiene el indice de un array, que es message
 * y luego recibe el index

 */
    var html = data.map(function(message, index){
        /**
         * Mostrar el nombre del usuario y el mensaje
         */
        return `
            <div class="message">
                <strong>${message.usuario}</strong>
                <p>${message.text}</p>
            </div>`
        ;
        /**
         * Join para dejar un espacio entre el nombre del ususario y el mensaje
         */
    }).join(' ');
    /**
     * @var div_mssg
     * Mostrar en el index el mensaje dado en la funcion anterior
     */
    var div_mssg = document.getElementById("messages")
    div_mssg.innerHTML = html;
    /**
     * Mostrar los últimos mensajes enviados con el scroll
     */
    div_mssg.scrollTop = div_mssg.scrollHeight;

}

/**
 * Mostramos los mensajes de los usuarios
 */
function addMessage(e){
    /**
     * @var  message        Variable que contiene un objeto que se envia al servidor, para que el socket lo guarde
     */
    var message = {
        usuario: document.getElementById('usuario').value,
        text: document.getElementById('text').value
    }
    /**
     * Quitamos el input del usuario para no volver a repetir el proceso 
     */
    document.getElementById('usuario').style.display = 'none';
    socket.emit('add-message', message);

    return false;
}