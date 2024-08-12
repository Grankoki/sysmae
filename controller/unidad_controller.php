<?php
require_once ("model/unidad_model.php");
class UnidadController extends unidad_model
{
    public function get_ListarUnidadesCurso($idCurso,$idSeccion) {
        $matrizTUCD = $this->ListUnityByCourse($idCurso,$idSeccion);
        return $matrizTUCD;
    }
}
?>