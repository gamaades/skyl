<?php

require_once 'network/conexion.php';
$_conexion = new conexion;
if (isset($_POST["txtId"]) && isset($_POST["txtDescripcion"])) {
    $id = $_POST["txtId"];
    $descripcion = $_POST["txtDescripcion"];
    $idioma = $_POST["txtIdioma"];

    $query= "UPDATE libros SET descripcion = '".$descripcion."', idioma = '".$idioma."' WHERE idLibro = $id";
 
    $rs = $_conexion->nonQuery($query);
    
    if($rs=="1"){
        echo'<script type="text/javascript"> alert("Libro modificado correctamente"); window.location.href="listado.php"; </script>';
    } else {
        echo'<script type="text/javascript"> alert("No se a modificado ningún registro."); window.location.href="listado.php"; </script>';
    }
}
else {
    echo'<script type="text/javascript"> alert("No hay datos para actualizar."); window.location.href="listado.php"; </script>';
}