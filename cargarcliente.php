<?php
include_once("conx.php");

if (isset($_POST["cargar"])) {
    $nom = $_POST["nom"];
    $ape = $_POST["ape"];
    $dni = $_POST["dni"];
    $tel = $_POST["tel"];
    $email = $_POST["email"];
    $ciudad = $_POST["ciudad"];
    $calle = $_POST["calle"];
    $num = $_POST["num"];
    if(isset($_POST["piso"])) $piso = $_POST["piso"];
    else $piso = null;
    if(isset($_POST["depto"])) $piso = $_POST["depto"];
    else $depto = null;
}
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container">
    <a href="./" class="w3-button w3-indigo w3-margin-top">Volver a inicio</a> <br>
    <form method="POST" class="w3-section">
        <p>
            <label>Nombre*</label><br>
            <input type="text" name="nom" required>
        </p>
        <p>
            <label>Apellido*</label><br>
            <input type="text" name="nom" required>
        </p>
        <p>
            <label>DNI* (sin los puntos)</label><br>
            <input type="text" name="dni" pattern="[0-9]{1,10}" required>
        </p>
        <p>
            <label>Teléfono*</label><br>
            <input type="text" name="tel" pattern="[0-9()]{1,30}" required>
        </p>
        <p>
            <label>E-Mail*</label><br>
            <input type="email" name="email" required>
        </p>
        <p>
            <label>Ciudad*</label><br>
            <input type="text" name="ciudad" required>
        </p>
        <p>
            <label>Calle*</label><br>
            <input type="text" name="calle" required>
        </p>
        <p>
            <label>Numero*</label><br>
            <input type="number" name="num" required pattern="[0-9]">
        </p>
        <p>
            <label>Piso</label><br>
            <input type="text" name="piso">
        </p>
        <p>
            <label>Departamento</label><br>
            <input type="text" name="depto">
        </p>
        <p class="w3-text-red">
            * : Obligatorio
        </p>
        <input name="cargar" type="submit" value="Cargar cliente" class="w3-button w3-green">
    </form>
</div>