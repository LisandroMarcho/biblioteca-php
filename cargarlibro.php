<?php
include_once("conx.php");

if (isset($_POST["cargar"])) {
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $editorial = $_POST["editorial"];
    $anio = $_POST["anio"];
    $cadena = "INSERT INTO libros (titulo, genero, editorial, anio) VALUES ('$titulo', '$genero', '$editorial', '$anio')";

    $consulta = mysqli_query($link, $cadena);
    
    if($consulta) echo "<script> alert('Cargado'); </script>";
    else echo "<script> alert('Hubo un error en la carga'); </script>";
}

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container">
    <a href="./" class="w3-button w3-indigo w3-margin-top">Volver a inicio</a> <br>

    <form method="POST" class="w3-section">
        <label>Titulo del libro</label><br>
        <input type="text" name="titulo"><br>
        <label>Genero del libro</label><br>
        <input type="text" name="genero"><br>
        <label>Editorial del libro</label><br>
        <input type="text" name="editorial"><br>
        <label>Año publicado</label><br>
        <input type="number" name="anio"><br><br>
        <input type="submit" value="Cargar libro" class="w3-button w3-green" name="cargar">
    </form>
</div>