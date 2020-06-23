/**
 * Se llama el id de open para abrir la ventana modal, cuando le da clic en el icono que esta en la vista de reservar cita
 */
    document.getElementById("open").addEventListener("click", function (){
        document.querySelector(".popup").style.display = "flex";
        })
/**
 * Cerrar ventana modal
 */
    document.querySelector(".close").addEventListener("click", function(){
        document.querySelector(".popup").style.display = "none";
        })

        
