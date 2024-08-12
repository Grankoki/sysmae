<?php
require_once("config/connection.php");
class calificacion_model
{

    public function CountTasks($idUnidad)
    {
        $ic = new Connection();
        $sql="select ta.idTarea as idTarea from tb_tarea ta inner join tb_unidad tu inner join tb_tema tte
		    where tu.idUnidad = '$idUnidad' and tu.idUnidad = tte.idUnidad and tte.idTema = ta.idTema";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $cantTopics = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $cantTopics;
    }
    public function CountEvaluations($idUnidad)
    {
        $ic = new Connection();
        $sql="select te.idEvaluacion as idEvaluacion from tb_evaluacion te  inner join tb_unidad tu inner join tb_tema tte
		    where tu.idUnidad = '$idUnidad' and tu.idUnidad = tte.idUnidad and tte.idTema = te.idTema";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $cantEvaluations = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $cantEvaluations;
    }
    public function ListEvaluationScores($idUnidad)
    {
        $ic = new Connection();
        $sql="select te.idTema, tee.idEstudiante, tee.idEvaluacion, concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre, tee.puntajeTotal, tee.fechaRegistro from tb_evaluacion_estudiante tee
                inner join tb_evaluacion ev
                inner join tb_tema te
                inner join tb_estudiante tes
                inner join tb_unidad tu
		where tu.idUnidad = '$idUnidad' and te.idTema = ev.idTema and tu.idUnidad = te.idUnidad
        and ev.idEvaluacion=tee.idEvaluacion and tes.idEstudiante=tee.idEstudiante";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListTaskScores($idUnidad)
    {
        $ic = new Connection();
        $sql="select te.idTema, tte.idEstudiante, tte.idTarea, concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre, tte.calificacion, tte.fechaSubida from tb_tarea_estudiante tte
                    inner join tb_tarea ta
                    inner join tb_tema te
                    inner join tb_estudiante tes
                    inner join tb_unidad tu
		where tu.idUnidad = '$idUnidad' and te.idTema = ta.idTema and tu.idUnidad = te.idUnidad
        and ta.idTarea=tte.idTarea and tes.idEstudiante=tte.idEstudiante";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

}