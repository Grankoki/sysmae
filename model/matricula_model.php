<?php 
require_once("config/connection.php");

class matricula_model {
    protected $fechaHoy;
    public function obtener_por_id_seccion($idSeccion)
    {
        $ic = new Connection();   
        $sql="SELECT * from tb_matricula where idSeccion='$idSeccion'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);   
        return $objetoConsulta;
    }
    public function EnrollStudent($idSeccion,$idEstudiante) {

        try {
            $this->fechaHoy = date('Y-m-d');
            $ic = new Connection();
            $sql = "INSERT INTO tb_matricula (idSeccion, fecMatricula, idEstudiante) VALUES (?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$idSeccion);
            $insertar->bindParam(2,$this->fechaHoy);
            $insertar->bindParam(3,$idEstudiante);
            $insertar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function UnEnrollStudent($idSeccion,$idEstudiante) {

        try {
            $this->fechaHoy = date('Y-m-d');
            $ic = new Connection();
            $sql = "DELETE FROM tb_matricula where idSeccion='$idSeccion' and idEstudiante='$idEstudiante'";
            $eliminar = $ic->db->prepare($sql);
            $eliminar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
        //return "Matricula del estudiante ELIMINADO";
    }
} 

?>
