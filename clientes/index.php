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
            <a href="../clientes" class="w3-button w3-bar-item w3-green">Clientes</a>
            <a href="../retiros" class="w3-button w3-bar-item">Retiros</a>
        </div>
    </div>

    <div class="w3-display">
        <a href="./cargarcliente.php" style="position: fixed" class="w3-button w3-green w3-display-bottommiddle w3-margin-bottom">Cargar un cliente</a>
    </div>

    <div class="w3-container" id="container">
        <table style="margin-bottom: 50px;" class="w3-table w3-striped w3-border w3-margin-top">
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
    <script src="../js/main.js"></script>
</body>

</html>