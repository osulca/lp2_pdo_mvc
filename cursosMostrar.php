<?php
require_once "Conection.php";

try {
    $conn = new Conection();
    $sql2 = "SELECT * FROM cursos";
    $resultados = $conn->conectar->query($sql2);
    $conn->desconectar();
} catch (PDOException $e) {
    echo $e->getMessage();
}

?>
<table border="1" cellspacing="0">
    <thead>
    <tr>
        <th>id</th>
        <th>nombre</th>
        <th>&nbsp;</th>
        <th>&nbsp;</th>
    </tr>
    </thead>
    <tbody>
    <?php
    foreach ($resultados as $curso) {
        echo "<tr>
                <td>" . $curso["id"] . "</td>
                <td>" . $curso["nombre"] . "</td>
                <td><a href='cursosActualizar.php?id=" . $curso["id"] . "'>actualizar</a></td>
                <td><a href='cursosEliminar.php?id=" . $curso["id"] . "'>eliminar</a></td>
              </tr>";
    }
    ?>
    </tbody>
</table>
