<form method="post" action="<?=$_SERVER["PHP_SELF"]?>">
    <input type="text" name="nombre" placeholder="Ingrese curso">
    <input type="submit" name="submit" value="Guardar">
</form>
<?php
if(!empty($_POST)){
    $nombre = $_POST["nombre"];
    require_once "Conection.php";

    try {
        $conn = new Conection();
        $sql = "INSERT INTO cursos(nombre) VALUES('$nombre')";
        $resultados = $conn->conectar->exec($sql);
        $conn->desconectar();
    } catch (PDOException $e) {
        echo $e->getMessage();
    }

    if($resultados!=1){
        echo "no se guardó";
    }else{
        header("location: cursosMostrar.php");
    }
}