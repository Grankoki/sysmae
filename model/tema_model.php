<?php
require_once("config/connection.php");
class tema_model
{
    public function ListTopicByCourse($idSeccion,$idCurso){
        $ic = new Connection();
        $sql = "SELECT idTema, tb_tema.descripcion as descripcion, estado, tb_tema.idUnidad as idUnidad,tb_unidad.idSeccion as seccion, tb_unidad.idCurso as curso
                                     	from tb_tema inner join tb_unidad on tb_unidad.idUnidad = tb_tema.idUnidad
                                    	where tb_unidad.idSeccion='$idSeccion' and tb_unidad.idCurso='$idCurso'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchTopicByUnity($idUnidad){
        $ic = new Connection();
        $sql = "SELECT idTema, tb_tema.descripcion as descripcion, estado, tb_tema.idUnidad as idUnidad,tb_unidad.idSeccion
                                           as seccion, tb_unidad.idCurso as curso from tb_tema
			                                 inner join tb_unidad on tb_unidad.idUnidad = tb_tema.idUnidad
                                				 where tb_unidad.idUnidad='$idUnidad'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}
?>
