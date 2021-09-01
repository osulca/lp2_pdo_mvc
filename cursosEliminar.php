<?php
if (isset($_GET["id"])) {
    $id = $_GET["id"];

    require_once "Conection.php";
    try {
        $conn = new Conection();
        $sql = "DELETE FROM cursos WHERE id=$id";
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