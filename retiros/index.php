<?php
include_once("../conx.php");

if (isset($_GET["devolver"])) {
    $iddevolver = $_GET["devolver"];
    $queryDev = "UPDATE retiros SET devuelto = 1 WHERE idretiro = $iddevolver";
    $resultado = mysqli_query($link, $queryDev);

    if ($resultado) echo "<script>alert('Libro devuelto')</script>";
}

$query = "SELECT retiros.*, clientes.nom, clientes.ape, libros.titulo 
          FROM retiros INNER JOIN
            clientes ON retiros.idcliente = clientes.idcliente INNER JOIN
            libros ON retiros.idlibro = libros.idlibro";

if (isset($_GET["idcliente"])) {
    $idcliente = $_GET["idcliente"];
    $query .= " WHERE retiros.idcliente = $idcliente";
}

if (isset($_GET["idlibro"])) {
    $idlibro = $_GET["idlibro"];
    if (isset($_GET["idcliente"])) $query .= " AND retiros.idlibro = $idlibro";
    else $query .= " WHERE retiros.idlibro = $idlibro";
}

$query .= " ORDER BY retiros.idretiro DESC";

$consulta = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Document</title>
</head>

<body>
    <div class="w3-sidebar w3-bar-block w3-light-gray" id="sidebar">
        <div class="w3-margin-top">
            <a href="/biblioteca-php" class="w3-bar-item w3-button">Inicio</a>
        </div>
        <div class="w3-margin-top">
            <a href="../autores" class="w3-button w3-bar-item">Autores</a>
            <a href="../libros" class="w3-button w3-bar-item">Libros</a>
            <a href="../clientes" class="w3-button w3-bar-item">Clientes</a>
            <a href="../retiros" class="w3-button w3-bar-item w3-green">Retiros</a>
        </div>
    </div>

    <div class="w3-display">
        <a href="./cargarretiro.php" style="position: fixed" class="w3-button w3-green w3-margin-top w3-display-bottommiddle w3-margin-bottom">Realizar un retiro</a>
    </div>

    <div class="w3-container" id="container">
        <table style="margin-bottom: 50px;" class="w3-table w3-striped w3-border">
            <tr class="w3-border-bottom">
                <th>
                    #ID Retiro
                </th>
                <th>
                    Libro retirado
                </th>
                <th>
                    Cliente que lo retiro
                </th>
                <th>
                    Fecha de Salida
                </th>
                <th>
                    Fecha de Devolución
                </th>
                <th>
                    Estado
                </th>
            </tr>
            <?php
            if ($consulta && mysqli_num_rows($consulta) > 0) {
                while ($r = mysqli_fetch_array($consulta)) {
                    echo "<tr>";
                    echo "<td>$r[0]</td>";
                    echo "<td>$r[8]</td>";
                    echo "<td>$r[7], $r[6] #$r[2]</td>";
                    echo "<td>$r[3]</td>";
                    echo "<td>$r[4]</td>";
                    if ($r[5]) echo '<td class="w3-text-green">Devuelto</td>';
                    else echo "<td><a href='./?devolver=$r[0]' class='w3-text-red'>No devuelto</a></td>";
                    echo "</tr>";
                }
            } else {
                echo "<p>No existe ningún registro con esos parámetros</p>";
            }
            ?>
        </table>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>