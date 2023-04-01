<?php
require_once 'network/conexion.php';

$titulo = $_POST["txtTitulo"];
$fecha = $_POST["txtFecha"];
$autor = $_POST["selAutor"];
$categoria = $_POST["selCategoria"];
$editoria = $_POST["selEditorial"];
$idioma = $_POST["txtIdioma"];
$descripcion = $_POST["txtDescripcion"];


if (isset($titulo)) {
    $_conexion = new conexion;
    $query = "INSERT INTO libros (titulo, fechaLanzamiento, idAutor, idCategoria, idEditorial, idioma, descripcion, favorito, meGusta) VALUES ('".$titulo."', '".$fecha."', '".$autor."', '".$categoria."', '".$editoria."', '".$idioma."', '".$descripcion."', NULL, NULL)";
    $rs = $_conexion->nonQuery($query);
    if($rs==1){
        echo'<script type="text/javascript"> alert("Libro agregado correctamente"); window.location.href="listado.php"; </script>';
    }
} else {
    echo'<script type="text/javascript"> alert("No se hará nada! vuelve a intentarlo."); window.location.href="agregar.php"; </script>';
}