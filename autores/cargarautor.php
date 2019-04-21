<?php
include_once("../conx.php");

if (isset($_GET["de"]) && $_GET["de"] == "libros") $volverLibros = true;
else $volverLibros = false;

if (isset($_POST["cargar"])) {
    $nom = $_POST["nom"];
    $ape = $_POST["ape"];
    $nacimiento = $_POST["nacimiento"];
    if (isset($_POST["fallecimiento"])) $fallecimiento = $_POST["fallecimiento"];
    else $fallecimiento = null;

    $cadena = "INSERT INTO autores (nom, ape, nacimiento, fallecimiento) VALUES ('$nom', '$ape', '$nacimiento', '$fallecimiento')";

    $consulta = mysqli_query($link, $cadena);
    $id = mysqli_insert_id($link);
    if ($consulta) echo "<script> alert('Cargado'); window.location = '../libros/cargarlibro.php?id=$id'</script>";
    else echo "<script> alert('Hubo un error en la carga'); </script>";
}
?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container w3-center">
    <?php
    if ($volverLibros) echo '<a href="../libros" class="w3-button w3-indigo w3-margin-top">Volver a Libros</a> <br>';
    else echo '<a href="./" class="w3-button w3-indigo w3-margin-top">Volver a Autores</a> <br>';
    ?>
</div>

<div class="w3-container w3-display w3-half w3-mobile w3-center">
    <form method="POST" class="w3-right w3-mobile">
        <p>
            <label>Nombre del autor*</label><br>
            <input type="text" name="nom" required>
        </p>
        <p>
            <label>Apellido del autor*</label><br>
            <input type="text" name="ape" required>
        </p>
        <p>
            <label>Nacimiento del autor*</label><br>
            <input type="date" name="nacimiento" required>
        </p>
        <p>
            <label>Fallecimiento</label><br>
            <input type="date" name="fallecimiento">
        </p>
        <p class="w3-text-red">
            * : Obligatiorio
        </p>
        <input type="submit" value="Cargar nuevo autor" class="w3-button w3-green" name="cargar">
    </form>
</div>
<div class="w3-container w3-display w3-half w3-mobile w3-center">
    <form method="GET" action="../libros/cargarlibro.php" class="w3-left w3-mobile">
        <p>
            <label>Seleccione un autor existente</label><br>
            <?php
            $result = mysqli_query($link, "SELECT * FROM autores");

            if (!mysqli_num_rows($result)) {
                echo '<select name="id" disabled>';
                echo '<option>No se encontraron autores</option>';
            } else {
                echo '<select name="id">';
                while ($r = mysqli_fetch_array($result)) {
                    echo "<option value='$r[0]'>$r[1] $r[2]</option>";
                }
            }
            ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Usar autor" class="w3-button w3-green">
        </p>
    </form>
</div>