<?php
include_once("../conx.php");

if (isset($_GET["eliminar"])) {
    $iddelete = $_GET["eliminar"];
    $queryDev = "DELETE FROM clientes WHERE idcliente = $iddelete";
    $resultado = mysqli_query($link, $queryDev);

    if ($resultado) echo "<script>alert('Cliente eliminado')</script>";
}

$query = "SELECT * FROM clientes";
$consulta = mysqli_query($link, $query);

?>

<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<meta http-equiv="Content-Type" content="text/html;charset=UTF-8">

<div class="w3-container w3-center">
    <a href="../" class="w3-button w3-indigo w3-margin-top w3-center">Volver a inicio</a>
</div>

<div class="w3-display">
    <a href="./cargarcliente.php" style="position: fixed" class="w3-button w3-green w3-margin-top w3-display-bottommiddle w3-margin-bottom">Cargar un cliente</a>
</div>

<div class="w3-panel">
    <table style="margin-bottom: 50px;" class="w3-table w3-striped w3-border">
        <tr class="w3-border-bottom">
            <th>
                #ID Cliente
            </th>
            <th>
                Nombre
            </th>
            <th>
                Apellido
            </th>
            <th>DNI</th>
            <th>
                Teléfono
            </th>
            <th>
                Email
            </th>
            <th>
                Ciudad
            </th>
            <th>
                Calle
            </th>
            <th>
                Nº
            </th>
            <th>
                Piso
            </th>
            <th>
                Departamento
            </th>
            <th></th>
        </tr>
        <?php
        if ($consulta && (mysqli_num_rows($consulta) > 0)) {
            while ($r = mysqli_fetch_array($consulta)) {
                echo "<tr>";
                echo "<td>$r[0]</td>";
                echo "<td>$r[1]</td>";
                echo "<td>$r[2]</td>";
                echo "<td>$r[3]</td>";
                echo "<td>$r[4]</td>";
                echo "<td>$r[5]</td>";
                echo "<td>$r[6]</td>";
                echo "<td>$r[7]</td>";
                echo "<td>$r[8]</td>";
                echo "<td>$r[9]</td>";
                echo "<td>$r[10]</td>";
                echo "<td><a href='./?eliminar=$r[0]' class='w3-text-red'>Eliminar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<p>No existe ningún registro con esos parámetros</p>";
        }
        ?>
    </table>
</div>