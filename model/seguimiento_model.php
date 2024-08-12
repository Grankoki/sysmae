<?php
require_once("config/connection.php");

class seguimiento_model
{
    public function ListStudentsToReinforce($idUnidad) {
        $ic = new Connection();
        $sql = "SELECT te.idTema, tee.idEstudiante, tee.idEvaluacion, concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre, tee.puntajeTotal, tee.fechaRegistro from tb_evaluacion_estudiante tee
                    inner join tb_evaluacion ev
                    inner join tb_tema te
                    inner join tb_estudiante tes
                    inner join tb_unidad tu
                where tu.idUnidad = '$idUnidad' and te.idTema = ev.idTema and tu.idUnidad = te.idUnidad
                and ev.idEvaluacion=tee.idEvaluacion and tes.idEstudiante=tee.idEstudiante and puntajeTotal<=12";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListTopicsToReinforce($idUnidad) {
        $ic = new Connection();
        $sql = "SELECT te.idTema, tee.idEstudiante, tee.idEvaluacion, concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre, tee.puntajeTotal, tee.fechaRegistro, 
		tre.idRespuestaEstudiante, tre.calificacion,pre.idPregunta, pre.nombrePregunta
                from tb_respuesta_estudiante tre
                        inner join tb_evaluacion ev
                        inner join tb_tema te
                        inner join tb_estudiante tes
                        inner join tb_unidad tu
                        inner join tb_evaluacion_estudiante tee
                        inner join tb_pregunta pre
            where tu.idUnidad = '$idUnidad' and te.idTema = ev.idTema and tu.idUnidad = te.idUnidad
            and ev.idEvaluacion=tee.idEvaluacion and tes.idEstudiante=tee.idEstudiante and tre.idEvaluacion=tee.idEvaluacion
            and tee.puntajeTotal<=12 and tre.calificacion=0 and tre.idPregunta=pre.idPregunta and tre.idEstudiante=tee.idEstudiante
            group by pre.idPregunta";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function CourseUnitAverage($idSeccion, $idCurso) {
        $ic = new Connection();
        $sql = "SELECT idUnidad,descripcion,idPeriodo,idCurso,idSeccion from tb_unidad
				where idseccion='$idSeccion' and idCurso='$idCurso'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        //return $objetoConsulta;
        $i=0;
        foreach ($objetoConsulta as $units){
            $ic = new Connection();
            $sql = "SELECT te.idTema, tee.idEstudiante, tee.idEvaluacion, 
                    if(tee.puntajeTotal is null,7,tee.puntajeTotal) as puntaje,                         
                        tee.fechaRegistro, avg(if(tee.puntajeTotal is null,7,tee.puntajeTotal)) as promedio 
                        from tb_evaluacion_estudiante tee
                            inner join tb_evaluacion ev
                            inner join tb_tema te
                            inner join tb_estudiante tes
                            inner join tb_unidad tu
                    where tu.idUnidad = '$units->idUnidad' and te.idTema = ev.idTema and tu.idUnidad = te.idUnidad
                    and ev.idEvaluacion=tee.idEvaluacion and tes.idEstudiante=tee.idEstudiante";
            $consulta=$ic->db->prepare($sql);
            $consulta->execute();
            $taskAvg = $consulta->fetch(PDO::FETCH_ASSOC);

            $ic = new Connection();
            $sql = "SELECT te.idTema, tte.idEstudiante, tte.idTarea,  
                        if(tte.calificacion is null,7,tte.calificacion) as calificacion,tte.fechaSubida,
                           avg(if(tte.calificacion is null,7,tte.calificacion)) as promedio
                            from tb_tarea_estudiante tte 
                            inner join tb_tarea ta
                            inner join tb_tema te
                            inner join tb_estudiante tes
                            inner join tb_unidad tu
                                where tu.idUnidad = '$units->idUnidad' and te.idTema = ta.idTema and tu.idUnidad = te.idUnidad
                                and ta.idTarea=tte.idTarea and tes.idEstudiante=tte.idEstudiante";
            $consulta=$ic->db->prepare($sql);
            $consulta->execute();
            $evaluationAvg = $consulta->fetch(PDO::FETCH_ASSOC);
            if($taskAvg['promedio']!=null and $evaluationAvg['promedio']!=null){
                $unitAvg[$i] = number_format(($taskAvg['promedio'] + $evaluationAvg['promedio'])/2,1);
            }else if($taskAvg['promedio']!=null and $evaluationAvg['promedio']===null){
                $unitAvg[$i]=number_format($taskAvg['promedio'],1);
            }else if($taskAvg['promedio']===null and $evaluationAvg['promedio']!=null){
                $unitAvg[$i]=number_format($evaluationAvg['promedio'],1);
            }else{
                //$unitAvg[$i]=null;
            }

            $i++;
        }
        return $unitAvg;
    }
    public function TaskAvgUnit($idUnidad)
    {
        $ic = new Connection();
        $sql = "select te.idTema, tte.idEstudiante, tte.idTarea,  concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre,
                            if(tte.calificacion is null,7,tte.calificacion) as calificacion,tte.fechaSubida,
                               avg(if(tte.calificacion is null,7,tte.calificacion)) as promedio
                                from tb_tarea_estudiante tte 
                        inner join tb_tarea ta
                        inner join tb_tema te
                        inner join tb_estudiante tes
                        inner join tb_unidad tu
                    where tu.idUnidad = '$idUnidad' and te.idTema = ta.idTema and tu.idUnidad = te.idUnidad
                    and ta.idTarea=tte.idTarea and tes.idEstudiante=tte.idEstudiante group by idEstudiante";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $taskAvg = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $taskAvg;
    }
    public function EvaluationAvgUnit($idUnidad)
    {
        $ic = new Connection();
        $sql = "select te.idTema, tee.idEstudiante, tee.idEvaluacion, concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre,
                            if(tee.puntajeTotal is null,7,tee.puntajeTotal) as puntaje,
                                -- tee.puntajeTotal, 
                                tee.fechaRegistro, avg(if(tee.puntajeTotal is null,7,tee.puntajeTotal)) as promedio 
                                from tb_evaluacion_estudiante tee
                        inner join tb_evaluacion ev
                        inner join tb_tema te
                        inner join tb_estudiante tes
                        inner join tb_unidad tu
                    where tu.idUnidad = '$idUnidad' and te.idTema = ev.idTema and tu.idUnidad = te.idUnidad
                    and ev.idEvaluacion=tee.idEvaluacion and tes.idEstudiante=tee.idEstudiante group by idEstudiante";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $evaluationAvg = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $evaluationAvg;
    }
    public function UnitStudentAverage($idSeccion, $idCurso)
    {
        $size=0;
        $cantUnidades = $this->CourseUnitAverage($idSeccion, $idCurso);
        $contUnd = sizeof($cantUnidades);
        //echo "<br><br><br><br>contUnd: ".$contUnd;
        //echo "<br>";
        //var_dump($cantUnidades);
        $unitAvgFinal = [];

        $ic = new Connection();
        $sql = "SELECT idUnidad,descripcion,idPeriodo,idCurso,idSeccion from tb_unidad
				where idseccion='$idSeccion' and idCurso='$idCurso'";
        $consulta = $ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        //return $objetoConsulta;
        $j = 0;
        $c = 0;
        for ($s = 0; $s < $contUnd; $s++) {
            for ($z = 0; $z < 4; $z++) {
                $unitAvgFinal[$s][$z] = null;
            }
        }
        for ($c=0; $c<$contUnd; $c++){
            $promTarea = [];
            $promEval = [];
            if ($cantUnidades[$c]!=null) {
                // echo "<br>prom ".$cantUnidades[$c];
                // echo "<br>idUnidad".$objetoConsulta[$c]->idUnidad;
                $taskAvg=$this->TaskAvgUnit($objetoConsulta[$c]->idUnidad);
                $evaluationAvg=$this->EvaluationAvgUnit($objetoConsulta[$c]->idUnidad);
                if (sizeof($taskAvg) > 0) {
                    $i = 0;
                    foreach ($taskAvg as $task) {
                        if ($task->promedio != null) {
                            $promTarea[$i] = number_format($task->promedio, 1);
                            $i++;
                        }
                    }
                    $size = $i;
                    // $size=sizeof($taskAvg);
                }
                if (sizeof($evaluationAvg) > 0) {
                    $i = 0;
                    foreach ($evaluationAvg as $eval) {
                        if ($eval->promedio != null) {
                            $promEval[$i] = number_format($eval->promedio, 1);
                            $i++;
                        }
                    }
                    $size = $i;
                    //$size=sizeof($evaluationAvg);
                }
                //echo "<br><br><br><br>contArray: ".sizeof($promEval);
                for ($z = 0; $z < $size; $z++) {
                    if(sizeof($promEval)>0 and sizeof($promTarea)>0){
                        $unitAvg[$z] = number_format(($promTarea[$z] + $promEval[$z]) / 2, 1);
                    }else if(sizeof($promEval)>0 and sizeof($promTarea)==0) {
                        $unitAvg[$z] = number_format($promEval[$z], 1);
                    }else if(sizeof($promEval)==0 and sizeof($promTarea)>0){
                        $unitAvg[$z] = number_format($promTarea[$z], 1);
                    }

            //        if ($promTarea[$z] != null and $promEval[$z] != null and sizeof($promTarea)>0 and sizeof($promEval)>0) {
             //           $unitAvg[$z] = number_format(($promTarea[$z] + $promEval[$z]) / 2, 1);
            //        } else if ($promTarea[$z] != null and $promEval[$z] === null and sizeof($promEval)>0) {
             //           $unitAvg[$z] = number_format($promTarea[$z], 1);
             //       } else if ($promTarea[$z] === null and $promEval[$z] != null and sizeof($promTarea)>0) {
            //            $unitAvg[$z] = number_format($promEval[$z], 1);
            //        } else {
            //            $unitAvg[$z] = null;
             //       }

                    if ($unitAvg[$z] >= 16.5) {
                        $unitAvgFinal[$c][0] = $unitAvgFinal[$c][0] + 1;
                    } else if ($unitAvg[$z] >= 12.5) {
                        $unitAvgFinal[$c][1] = $unitAvgFinal[$c][1] + 1;
                    } else if ($unitAvg[$z] >= 10.5) {
                        $unitAvgFinal[$c][2] = $unitAvgFinal[$c][2] + 1;
                    } else if ($unitAvg[$z] != null) {
                        $unitAvgFinal[$c][3] = $unitAvgFinal[$c][3] + 1;
                    } else {
                        $unitAvgFinal[$c][0] = null;
                        $unitAvgFinal[$c][1] = null;
                        $unitAvgFinal[$c][2] = null;
                        $unitAvgFinal[$c][3] = null;
                    }
                    $i++;

                }

              //  echo "<br>Tarea";
            //    print("<pre>" . print_r($promTarea, true) . "</pre>");
             //  echo "<br> Evaluacion";
             //   print("<pre>" . print_r($promEval, true) . "</pre>");
            } // fin del IF NULL
        }
       // var_dump($unitAvgFinal);

        //echo "<br>cant C ".$c;
       // print("<pre>" . print_r($unitAvgFinal, true) . "</pre>");
        return $unitAvgFinal;
    }

}