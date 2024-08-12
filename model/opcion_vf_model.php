<?php
require_once("config/connection.php");
class opcion_vf_model
{

    public function InsertOpcionVF($idPregunta, $respuesta, $estado, $retroV, $retroF) {
        try {
            $ic = new Connection();
            $sql = "INSERT INTO tb_verdadero_falso (idPregunta, respuesta, estado, retroalimentacionV, retroalimentacionF) VALUES (?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$idPregunta);
            $insertar->bindParam(2,$respuesta);
            $insertar->bindParam(3,$estado);
            $insertar->bindParam(4,$retroV);
            $insertar->bindParam(5,$retroF);
            $insertar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }

}
?>