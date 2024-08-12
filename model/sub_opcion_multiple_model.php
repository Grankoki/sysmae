<?php
require_once("config/connection.php");

class sub_opcion_multiple_model{
    public function InsertSubOpcionMultiple($idOpcionMultiple, $eleccion, $pesoOpcion, $retroalimentacion)
    {
            try {
            $ic = new Connection();
            for ($i=0; $i<4; $i++){
                $sql = "INSERT INTO tb_sub_opc_multiple (idOpcionMultiple, eleccion, pesoOpcion, retroalimentacion) VALUES (?, ?, ?, ?)";
                $insertar = $ic->db->prepare($sql);
                $insertar->bindParam(1,$idOpcionMultiple);
                $insertar->bindParam(2,$eleccion[$i]);
                $insertar->bindParam(3,$pesoOpcion[$i]);
                $insertar->bindParam(4,$retroalimentacion[$i]);
                $insertar->execute();
            }
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
}

?>
