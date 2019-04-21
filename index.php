<?php
include_once("conx.php");

$autores = mysqli_query($link, "SELECT COUNT(*) FROM autores");
$libros = mysqli_query($link, "SELECT COUNT(*) FROM libros");
$clientes = mysqli_query($link, "SELECT COUNT(*) FROM clientes");
$retiros = mysqli_query($link, "SELECT COUNT(*) FROM retiros");
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Inicio - Biblioteca</title>
</head>

<body>
    <div class="w3-sidebar w3-bar-block w3-light-gray" id="sidebar">
        <div class="w3-margin-top">
            <a href="../biblioteca-php" class="w3-bar-item w3-button w3-blue">Inicio</a>
        </div>
        <div class="w3-margin-top">
            <a href="./autores" class="w3-button w3-bar-item">Autores</a>
            <a href="./libros" class="w3-button w3-bar-item">Libros</a>
            <a href="./clientes" class="w3-button w3-bar-item">Clientes</a>
            <a href="./retiros" class="w3-button w3-bar-item">Retiros</a>
        </div>
    </div>
    <div class="w3-container" id="container">
        <h1>Biblioteca<label class="w3-text-blue">PHP</label></h1>
        <h4>
            Plataforma de administración de biblioteca
        </h4>
        <p>
            <?php
            while ($r = mysqli_fetch_array($autores)) echo "<h4>$r[0] autore/s</h4>";
            while ($r = mysqli_fetch_array($libros)) echo "<h4>$r[0] libro/s</h4>";
            while ($r = mysqli_fetch_array($clientes)) echo "<h4>$r[0] cliente/s</h4>";
            while ($r = mysqli_fetch_array($retiros)) echo "<h4>$r[0] retiro/s</h4>";
            ?>
        </p>
    </div>
    <script src="js/main.js">
    </script>
</body>

</html>