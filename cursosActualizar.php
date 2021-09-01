<?php
require_once "Conection.php";

if (isset($_GET["id"])) {
    $id = $_GET["id"];

    try {
        $conn = new Conection();
        $sql = "SELECT * FROM cursos WHERE id=$id";
        $resultados = $conn->conectar->query($sql);
        $conn->desconectar();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    foreach ($resultados as $curso) {
        $nombre = $curso["nombre"];
    }

    ?>
    <form method="post" action="<?= $_SERVER["PHP_SELF"] ?>">
        <input type="text" name="nombre" value="<?= $nombre ?>">
        <input type="hidden" name="id" value="<?= $id ?>">
        <input type="submit" name="submit" value="Guardar">
    </form>
    <?php
}

if (!empty($_POST)) {
    $id = $_POST["id"];
    $nombre = $_POST["nombre"];

    try {
        $conn = new Conection();
        $sql = "UPDATE cursos SET nombre='$nombre' WHERE id=$id";
        $resultados = $conn->conectar->exec($sql);
        $conn->desconectar();
        if ($resultados != 1) {
            echo "Error";
        } else {
            header("location: cursosMostrar.php");
        }
    } catch (PDOException $e) {
        echo $e->getMessage();
    }
}
