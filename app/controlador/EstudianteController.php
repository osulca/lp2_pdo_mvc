<?php
namespace app\controlador;
use app\modelo\Estudiante;

require_once "config\autocarga.php";

class EstudianteController
{
    public function guardar(string $nombres, string $apellidos): string{
        $estudiante = new Estudiante();
        $estudiante->setNombres($nombres);
        $estudiante->setApellidos($apellidos);
        $resultado = $estudiante->guardar();

        if($resultado==1){
            return "Se guardó correctamente";
        }else{
            return "No se guardó";
        }
    }
}