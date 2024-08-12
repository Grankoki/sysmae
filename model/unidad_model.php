<?php
require_once("config/connection.php");
class unidad_model
{
    public function ListUnityByCourse($idCurso,$idSeccion) {
        $ic = new Connection();
        $sql = "SELECT idUnidad,descripcion,idPeriodo,idCurso,idSeccion from tb_unidad
                				where idseccion='$idSeccion' and idCurso='$idCurso'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}
?>