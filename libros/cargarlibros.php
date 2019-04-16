<?php
include_once("conx.php");

if (isset($_GET["id"])) $idautor = $_GET["id"];
else $idautor = null;

if (isset($_POST["cargar"])) {
    $titulo = $_POST["titulo"];
    $genero = $_POST["genero"];
    $editorial = $_POST["editorial"];
    $anio = $_POST["anio"];
    $cadena = "INSERT INTO libros (titulo, genero, editorial, anio) VALUES ('$titulo', '$genero', '$editorial', '$anio');";

    $consulta = mysqli_query($link, $cadena);

    if ($consulta) {
        mysqli_query($link, "INSERT INTO autoreslibros (idlibro, idautor) VALUES (LAST_INSERT_ID(), $idautor)");
        echo "<script> alert('Cargado'); </script>";
    } else echo "<script> alert('Hubo un error en la carga'); </script>";
}

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container w3-center">
    <a href="./" class="w3-button w3-indigo w3-margin-top">Volver a inicio</a> <br>

    <form method="POST" class="w3-section">
        <p>
            <label>Titulo del libro*</label><br>
            <input type="text" name="titulo" required>
        </p>
        <p>
            <label>Genero del libro*</label><br>
            <input type="text" name="genero" required>
        </p>
        <p>
            <label>Editorial del libro*</label><br>
            <input type="text" name="editorial" required>
        </p>
        <p>
            <label>Año publicado*</label><br>
            <input type="number" name="anio" required>
        </p>
        <p class="w3-text-red">
            * : Obligatorio
        </p>
        <input type="submit" value="Cargar libro" class="w3-button w3-green" name="cargar">
    </form>
</div>