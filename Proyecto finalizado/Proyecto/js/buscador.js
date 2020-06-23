/**
 * Llamar la función cuando el documento esté listo
 */
$(buscar_datos());
function buscar_datos(consulta){
	$.ajax({
/**
 * Archivo de petición
 */
		url: '../php/cod_buscador.php' ,
/**
 * Método de envío
 */
		type: 'POST' ,
/**
 * Recibimos una estructura html
 */
		dataType: 'html',
/**
 * Enviamos y recibimos parámetros
 */
		data: {consulta: consulta},
	})
/**
 * Cuando se ejecute con éxito la función mostrará los datos
 */
	.done(function(respuesta){
		$("#datos").html(respuesta);
	})
/**
 * Mostrará un error si hay un problema
 */
	.fail(function(){
		console.log("error");
	});
}
/**
 * Se ejecuta en la caja de busqueda
 */
$(document).on('keyup','#caja_busqueda', function(){
	/**
	 * Se captura el valor que tiene #caja_busqueda
	 */
		var valor = $(this).val();
	/**
	 * Si está vacio mostrará todos los datos
	 */
		if (valor != "") {
			buscar_datos(valor);
		}
	/**
	 * Sino no muestra datos
	 */
		else{
			buscar_datos();
		}
});