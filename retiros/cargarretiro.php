<?php
include_once("../conx.php");

if (isset($_POST["cargar"])) {
    $idcliente = $_POST["idcliente"];
    $idlibro = $_POST["idlibro"];
    $devolucion = $_POST["devolucion"];
    $salida = date("Y-m-d");



    $query = "INSERT INTO retiros (idlibro, idcliente, salida, devolucion, devuelto) VALUES ('$idlibro', '$idcliente', '$salida', '$devolucion', 0)";
    $consulta = mysqli_query($link, $query);

    if ($consulta) echo "<script>alert('Cargado'); window.location='../retiros'</script>";
    else echo "<script>alert('Hubo un problema')</script>";
}

$query_clientes = "SELECT idcliente, nom, ape FROM clientes";
$clientes = mysqli_query($link, $query_clientes);

$query_libros = "SELECT idlibro, titulo FROM libros WHERE NOT idlibro IN (SELECT idlibro FROM retiros) OR idlibro IN (SELECT idlibro FROM retiros WHERE devuelto = 1);";
$libros = mysqli_query($link, $query_libros);
?>

<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
    <title>Retirar libro | Biblioteca</title>
</head>

<body>
    <div class="w3-container w3-center">
        <a href="./" class="w3-button w3-indigo w3-margin-top">Volver a Retiros</a> <br>

        <form method="POST">
            <p>
                <label>Cliente #ID*</label><br>
                <select id="clientes" name="idcliente" required>
                    <?php
                    while ($r = mysqli_fetch_array($clientes)) {
                        echo "<option value='$r[0]'>$r[2], $r[1]</option>";
                    }
                    ?>
                </select>
            </p>
            <form method="POST">
                <p>
                    <label>Libro #ID*</label><br>
                    <select name="idlibro" required>
                        <?php
                        while ($r = mysqli_fetch_array($libros)) {
                            echo "<option value='$r[0]'>$r[1]</option>";
                        }
                        ?>
                    </select>
                </p>
                <p>
                    <label>Devolucion*</label><br>
                    <input type="date" name="devolucion" required>
                </p>
                <p class="w3-text-red">
                    * : Obligatiorio
                </p>
                <input type="submit" value="Cargar nuevo retiro" class="w3-button w3-green" name="cargar">
            </form>
    </div>
</body>

</html>