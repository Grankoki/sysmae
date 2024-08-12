<?php

require_once("config/connection.php");
require_once("model/matricula_model.php");

class tarea_estudiante_model {
    
    public function crearPorIdsession($idSeccion, $idTarea)
    {
        try {
            $modelMatricula = new matricula_model();
            $data = $modelMatricula->obtener_por_id_seccion($idSeccion);
            $ic = new Connection();
            foreach ($data as $key => $value) {
                $idEstudiante = $value->idEstudiante;
                $sql ="INSERT INTO tb_tarea_estudiante (idEstudiante, idTarea) VALUES (?, ?)";
                $insertar = $ic->db->prepare($sql);
                $insertar->bindParam(1,$idEstudiante);
                $insertar->bindParam(2,$idTarea);
                $insertar->execute();
            }
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function ListStudentTaskByIdTarea($idTarea) {
        $ic = new Connection();
        $sql = "SELECT tb_tarea_estudiante.idEstudiante as 'idEstudiante', detalle, concat(tb_estudiante.apePat,' ',tb_estudiante.apeMat,' ',tb_estudiante.nombre) as 'nomEstudiante', archivo, fechaSubida, calificacion 
		                    from tb_tarea_estudiante inner join tb_estudiante on tb_estudiante.idEstudiante=tb_tarea_estudiante.idEstudiante where idTarea='$idTarea' order by tb_estudiante.apePat";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchStudentTask($idTarea, $idEstudiante) {
        $ic = new Connection();
        $sql = "SELECT * from tb_tarea_estudiante where idTarea='$idTarea' and idEstudiante='$idEstudiante'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    protected function UpdateStudentTaskScore($idTarea, $idEstudiante, $puntaje) {
        try {
            if($puntaje=="AD"){ $calificacion = 18;
            }else if($puntaje=="A"){ $calificacion = 16;
            }else if($puntaje=="B"){ $calificacion = 12;
            }else { $calificacion = 10; }
            $ic = new Connection();
            $sql = "UPDATE tb_tarea_estudiante SET calificacion='$calificacion' where idTarea='$idTarea' and idEstudiante='$idEstudiante'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
}

?>