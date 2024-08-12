<?php
require_once("config/connection.php");

class genero_model {
    public function GeneroList()
    {
        $ic = new Connection();
        $sql="SELECT * from tb_genero";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}