<?php
include_once("../conx.php");

if (isset($_GET["devolver"])) {
    $iddevolver = $_GET["devolver"];
    $queryDev = "UPDATE retiros SET devuelto = 1 WHERE idretiro = $iddevolver";
    $resultado = mysqli_query($link, $queryDev);

    if($resultado) echo "<script>alert('Libro devuelto')</script>";
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

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<div class="w3-container w3-center">
    <a href="../" class="w3-button w3-indigo w3-margin-top w3-center">Volver a inicio</a>
</div>

<div class="w3-display">
    <a href="./cargarretiro.php" style="position: fixed" class="w3-button w3-green w3-margin-top w3-display-bottommiddle w3-margin-bottom">Realizar un retiro</a>
</div>

<div class="w3-panel">
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
        if ($consulta) {
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