<?php
require_once("config/connection.php");
class evaluacion_model
{
    protected $idEvaluacion;
    protected $titulo;
    protected $descripcion;
    protected $intentos;
    protected $fechaCreacion;
    protected $fechaInicio;
    protected $fechaTermino;
    protected $limiteTiempo;
    protected $idTema;
    protected $estado;
    protected function InsertEvaluacion() {
        try {
            $ic = new Connection();
            $this->limiteTiempo = (strtotime($this->fechaTermino)-strtotime($this->fechaInicio))/60;
            $sql = "INSERT INTO tb_evaluacion (titulo, descripcion, intentos, fechaInicio, fechaTermino, limiteTiempo, idTema, fechaCreacion,
                                         estado) VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$this->titulo);
            $insertar->bindParam(2,$this->descripcion);
            $insertar->bindParam(3,$this->intentos);
            $insertar->bindParam(4,$this->fechaInicio);
            $insertar->bindParam(5,$this->fechaTermino);
            $insertar->bindParam(6,$this->limiteTiempo);
            $insertar->bindParam(7,$this->idTema);
            $insertar->bindParam(8,$this->fechaCreacion);
            $insertar->bindParam(9,$this->estado);
            $insertar->execute();
            $this->idEvaluacion = $ic->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function getIdEvaluacion()
    {
        return $this->idEvaluacion;
    }
    public function ListEvaluacionByIdEvaluacion($idEvaluacion){
        $ic = new Connection();
        $sql = "SELECT idEvaluacion, fechaCreacion, fechaInicio, fechaTermino, titulo, descripcion, intentos, limiteTiempo, idTema, estado 
                            from tb_evaluacion where idEvaluacion='$idEvaluacion'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    protected function UpdateEvaluacion($idEvaluacion, $titulo, $descripcion, $intentos, $fechaInicio, $fechaTermino, $fechaHoy) {
        try {
            $ic = new Connection();
            $tiempo = (strtotime($fechaTermino)-strtotime($fechaInicio))/60;
            $sql = "UPDATE tb_evaluacion SET titulo='$titulo', descripcion='$descripcion', fechaCreacion='$fechaHoy',
                                      fechaInicio='$fechaInicio', fechaTermino='$fechaTermino', intentos='$intentos', limiteTiempo='$tiempo' where idEvaluacion='$idEvaluacion'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    protected function ChangeEvaluationStatus($idEvaluacion, $estado) {
        try {
            $ic = new Connection();
            $idEvaluacion = base64_decode($idEvaluacion);
            if($estado==1){
                $sql = "UPDATE tb_evaluacion SET estado=1 where idEvaluacion='$idEvaluacion'";
            }else{
                $sql = "UPDATE tb_evaluacion SET estado=0 where idEvaluacion='$idEvaluacion'";
            }
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
}
?>