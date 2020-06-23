<!DOCTYPE html>
  <html lang="en">
  <head>
      <meta charset="UTF-8">
  </head>
  </html>
<?php
    /**
     * Se incluye la conexión de la base de datos
     */
    include 'conexion.php';
    /**
     * Inicia la sesión
     */
    session_start();
    /**
     * Elimina las variables de la sesión actual
     */
    session_unset();
    /**
     * Destruir toda la sesión
     */
    session_destroy();
    echo "<script>alert('Cerrando sesión');</script>";
    /**
     * Se direcciona al index
     */
    echo "<script>window.location='../index.php';</script>";
?>