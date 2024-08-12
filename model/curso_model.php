<?php
require_once("config/connection.php");
class curso_model
{
    public function SearchTopicByUnityCourse($idUnidad){
        $ic = new Connection();
        $sql = "select idTema, tb_tema.descripcion as descripcion, estado, tb_tema.idUnidad as idUnidad,tb_unidad.idSeccion
                                           as seccion, tb_unidad.idCurso as curso from tb_tema
			                                 inner join tb_unidad on tb_unidad.idUnidad = tb_tema.idUnidad
                                				 where tb_unidad.idUnidad='$idUnidad'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

    public function ListCursosDocente($idDocente) {
        $ic = new Connection();
        $sql = "select tb_curso_seccion.idSeccion as idSeccion,tb_curso_seccion.idCurso as idCurso,tb_seccion.desSeccion as seccion,tb_curso.descripcion as curso from tb_curso_seccion			
			inner join tb_seccion on tb_curso_seccion.idSeccion = tb_seccion.idSeccion
            inner join tb_curso on tb_curso_seccion.idCurso = tb_curso.idCurso
            inner join tb_docente on tb_curso_seccion.idDocente = tb_docente.idDocente
				where tb_docente.idDocente='$idDocente' and  year(tb_curso_seccion.fechaCurso)=YEAR(NOW())";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

}
?>