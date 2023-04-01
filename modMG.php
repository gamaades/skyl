<?php

require_once 'network/conexion.php';
$_conexion = new conexion;
if (isset($_POST["txtIdLibro"]) && isset($_POST["txtMG"])) {
    $id = $_POST["txtIdLibro"];
    $MG = $_POST["txtMG"];

    $query= "UPDATE libros SET meGusta = '".$MG."' WHERE idLibro = $id";
 
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