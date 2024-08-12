<?php
require_once("config/connection.php");

class tarea_model{       
    protected $idTarea;
    protected $enunciado;
    protected $descripcion;
    protected $fechaCreacion;
    protected $fechaInicio;
    protected $fechaTermino;
    protected $idTema;
    protected $documento;
    protected $estado;

    protected function InsertTarea() {
        try {
            $ic = new Connection();          
            $sql = "INSERT INTO tb_tarea (enunciado, descripcion, fechaCreacion, fechaInicio, fechaTermino,
                                         idTema, documento, estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$this->enunciado);
            $insertar->bindParam(2,$this->descripcion);
            $insertar->bindParam(3,$this->fechaCreacion);
            $insertar->bindParam(4,$this->fechaInicio);
            $insertar->bindParam(5,$this->fechaTermino);
            $insertar->bindParam(6,$this->idTema);
            $insertar->bindParam(7,$this->documento);
            $insertar->bindParam(8,$this->estado);
            $insertar->execute();            
            $this->idTarea = $ic->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    
    public function getIdtarea()
    {
        return $this->idTarea;
    }
    
    protected function DeleteDocumento() {
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_tarea set documento=null where idTarea='$this->idTarea'";
            $delete= $ic->db->prepare($sql);
            $delete->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    protected function DeleteDocumentTaskEstudent($idTarea, $idEstudiante) {
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_tarea_estudiante set archivo=null where idTarea='$idTarea' and idEstudiante='$idEstudiante'";
            $delete= $ic->db->prepare($sql);
            $delete->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    protected function ListTareaByIdTarea($idTarea){
            $ic = new Connection();
            $sql = "SELECT idTarea, enunciado, descripcion, fechaCreacion, fechaInicio, fechaTermino,idTema, documento, estado 
                            from tb_tarea where idTarea='$idTarea'";
            $consulta=$ic->db->prepare($sql);
            $consulta->execute();
            $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetoConsulta;
    }
    protected function ListTaskByIdTareaIdEstudiante($idTarea, $idEstudiante){
        $ic = new Connection();
        $sql = "SELECT * from tb_tarea_estudiante where idTarea='$idTarea' and idEstudiante='$idEstudiante'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    protected function UpdateTarea($titulo, $enunciado, $fechaInicio, $fechaFin, $idTarea, $nameDocumento, $fechaHoy) {
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_tarea SET enunciado='$enunciado', descripcion='$titulo', fechaCreacion='$fechaHoy',
                                      fechaInicio='$fechaInicio', fechaTermino='$fechaFin', documento='$nameDocumento' where idTarea='$idTarea'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function ListTaskByTopic($idTema) {
            $ic = new Connection();
            $sql = "SELECT idTarea, fechaInicio, fechaTermino,idTema,enunciado,descripcion,documento,estado from tb_tarea
    	                                            where idTema='$idTema'";
            $consulta=$ic->db->prepare($sql);
            $consulta->execute();
            $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
            return $objetoConsulta;
    }
    protected function ChangeTaskStatus($idTarea, $estado) {
        try {
            $ic = new Connection();
            $idTarea = base64_decode($idTarea);
            if($estado==1){
                $sql = "UPDATE tb_tarea SET estado=1 where idTarea='$idTarea'";
            }else{
                $sql = "UPDATE tb_tarea SET estado=0 where idTarea='$idTarea'";
            }
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    protected function RecordTaskDevelopment($idTarea, $idEstudiante, $detalle, $archivo) {
        try {
            date_default_timezone_set('America/Lima');
            $fechaHoy = date('Y-m-d H:i:s');
            $ic = new Connection();
            $sql = "UPDATE tb_tarea_estudiante SET detalle='$detalle', fechaSubida='$fechaHoy', archivo='$archivo' where idTarea='$idTarea' and idEstudiante='$idEstudiante'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }

}
?>