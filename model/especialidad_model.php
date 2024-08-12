<?php
require_once("config/connection.php");

class especialidad_model {
    public function EspecialidadList()
    {
        $ic = new Connection();
        $sql="SELECT * from tb_especialidad";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}