<?php
require_once("config/connection.php");

class distrito_model {
    public function DistritoList()
    {
        $ic = new Connection();
        $sql="SELECT * from tb_distrito";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}