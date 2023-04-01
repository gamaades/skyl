<?php
require_once 'network/conexion.php';
$_conexion = new conexion;
if (isset($_REQUEST["id"])) {
    $id = $_REQUEST["id"];


    $query= "DELETE FROM libros WHERE idLibro = $id";

    $rs = $_conexion->nonQuery($query);
    if($rs==1){
        echo'<script type="text/javascript"> alert("Libro eliminado correctamente"); window.location.href="listado.php"; </script>';
    } else {
        echo'<script type="text/javascript"> alert("No se a eliminado ningún registro."); window.location.href="listado.php"; </script>';
    }
}
else {
    echo'<script type="text/javascript"> alert("No se hará nada! vuelve a intentarlo."); window.location.href="listado.php"; </script>';
}
