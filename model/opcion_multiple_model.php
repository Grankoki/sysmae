<?php
require_once("config/connection.php");
class opcion_multiple_model
{
    protected $idOpcionMultiple;
    public function InsertOpcionMultiple($idPregunta, $cantOpciones) {
        try {
            $ic = new Connection();
            $sql = "INSERT INTO tb_opcion_multiple (idPregunta, cantOpciones) VALUES (?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$idPregunta);
            $insertar->bindParam(2,$cantOpciones);
            $insertar->execute();
            $this->idOpcionMultiple = $ic->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function getIdOpcionMultiple()
    {
        return $this->idOpcionMultiple;
    }
}
?>