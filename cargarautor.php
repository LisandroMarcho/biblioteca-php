<?php
include_once("conx.php");

if (isset($_POST["cargar"])) {
    $nom = $_POST["nom"];
    $ape = $_POST["ape"];
    $nacimiento = $_POST["nacimiento"];
    if (isset($_POST["fallecimiento"])) $fallecimiento = $_POST["fallecimiento"];
    else $fallecimiento = null;

    $cadena = "INSERT INTO autores (nom, ape, nacimiento, fallecimiento) VALUES ('$nom', '$ape', '$nacimiento', '$fallecimiento')";

    $consulta = mysqli_query($link, $cadena);
    $id = mysqli_insert_id($link);
    if ($consulta) echo "<script> alert('Cargado'); window.location = 'cargarlibro.php?id=$id'</script>";
    else echo "<script> alert('Hubo un error en la carga'); </script>";
}

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">

<div class="w3-container">
    <a href="./" class="w3-button w3-indigo w3-margin-top">Volver a inicio</a> <br>

    <form method="POST" class="w3-section">
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
    <form method="GET" action="cargarlibro.php">
        <p>
            <label>Seleccione un autor existente</label><br>
            <select name="id">
                <?php
                $result = mysqli_query($link, "SELECT * FROM autores");

                while ($r = mysqli_fetch_array($result)) :
                ?>
                    <option value="<?php echo $r[0] ?>"><?php echo $r[1] ?> <?php echo $r[2] ?></option>
                <?php endwhile; ?>
            </select>
        </p>
        <p>
            <input type="submit" value="Usar autor" class="w3-button w3-green">
        </p>
    </form>
</div>