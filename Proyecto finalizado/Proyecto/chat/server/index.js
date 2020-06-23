/**
 * Importamos las libreria y dependencias 
 * @var express       variable para llamar el paquete de express, express es una clase que esta en la carpeta node_modules
 * @var app           variable para llamar la función de express, que viene desde la libreria de express
 * @var server        variable para cargar el servidor Http, que viene desde la libreria http de la carpeta node_modules
 *                    y tambien le pasa la app de express
 * @var io            variable para pasar la libreria http con la aplicación de express, para poder trabajar con los socket,
 *                    se carga la libreria socket.io y le pasamos el server.
 */
var express = require('express');
var app = express();
var server = require('http').Server(app);
var io = require('socket.io')(server);
/**
 * Vista estática
 * Todo el html que esta en la carpeta usuario, van hacer html estático
 */
app.use(express.static('user'));
/**
 * Rutas con express
 * Se utiliza el metodo http get, se crea una ruta y una funión que va recibir unos parametros que son:
 * El req de petición y el res de responsi.
 */
app.get('/hola-mundo', function(req, res){
    /**
     * Se devuelve una respuesta con un status 200, se devuelve una respuesta send que es 'Hola Mundo'
     */
   res.status(200).send('Hola Mundo');
});
/**
 * Mensaje de bienvenida a los usuarios de Pets App
 * @var message
 * Se crea un array donde se van almacenar los mensajes de tipo Json
 */
var messages = [{
    id: 1,
    text: 'Bienvenidos propietarios y veterinarios.',
    usuario: 'Pets App'
}];
/**
 * Usuarios
 * Con la variable io se abre la conexión al socket y se llama al método on, que nos permite lanzar eventos, el evento
 * que se va a lanzar es connection, se le envia a los usuarios y se crea una funcion para recibir el parametro socket
 * 
 */
io.on('connection', function(socket){
    /**
     * Cuando el usuario se conecte al socket(Chat), Se recoge el ip del usuario que se conecto.
     */
    console.log("El usuario con IP: " + socket.handshake.address + " se ha conectado.");
    /**
     * Enviar o emitir mensaje a todos los usuarios cuando se conecten.
     */
    socket.emit('messages', messages);

    socket.on('add-message', function(data){
        messages.push(data);

        io.sockets.emit('messages', messages);
    });
});
/**
 * Se crea el servidor con Express
 * Se le pasa el puerto 6677 y se crea una función, se le pasa un console.log para mostrar que el servidor funciona
 */
server.listen(6677, function(){
    console.log("Funciona");
});