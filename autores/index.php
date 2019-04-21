<?php
include_once("../conx.php");

if (isset($_GET["eliminar"])) {
    $iddelete = $_GET["eliminar"];
    $queryDev = "DELETE FROM autores WHERE idautor = $iddelete";
    $resultado = mysqli_query($link, $queryDev);

    if ($resultado) echo "<script>alert('Autor eliminado')</script>";
}

$query = "SELECT * FROM autores";
$consulta = mysqli_query($link, $query);

?>

<!DOCTYPE html>
<html>

<head>
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <meta http-equiv="Content-Type" content="text/html;charset=UTF-8">
    <title>Autores - Biblioteca</title>
</head>

<body>
    <div class="w3-sidebar w3-bar-block w3-light-gray" id="sidebar">
        <div class="w3-margin-top">
            <a href="/biblioteca-php" class="w3-bar-item w3-button">Inicio</a>
        </div>
        <div class="w3-margin-top">
            <a href="../autores" class="w3-button w3-bar-item w3-green">Autores</a>
            <a href="../libros" class="w3-button w3-bar-item">Libros</a>
            <a href="../clientes" class="w3-button w3-bar-item">Clientes</a>
            <a href="../retiros" class="w3-button w3-bar-item">Retiros</a>
        </div>
    </div>

    <div>
        <div class="w3-display">
            <a href="./cargarautor.php" style="position: fixed" class="w3-button w3-green w3-margin-top w3-display-bottommiddle w3-margin-bottom">Cargar un autor</a>
        </div>

        <div class="w3-container" id="container" style="margin-left: 25%;">
            <table class="w3-table w3-striped w3-border">
                <tr class="w3-border-bottom">
                    <th>
                        #ID Autor
                    </th>
                    <th>
                        Nombre
                    </th>
                    <th>
                        Apellido
                    </th>
                    <th>
                        Nacimiento
                    </th>
                    <th>
                        Fallecimiento
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
                        echo "<td><a href='./?eliminar=$r[0]' class='w3-text-red'>Eliminar</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<p>No existe ningún registro con esos parámetros</p>";
                }
                ?>
            </table>
        </div>
    </div>
    <script src="../js/main.js"></script>
</body>

</html>