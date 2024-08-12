<?php
require_once("config/connection.php");
class seccion_model
{

    public function RecordCounter($idSeccion) {
        $ic = new Connection();
        $sql = "select count(*) as contRecord from tb_matricula where idSeccion = '$idSeccion'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        return $row['contRecord'];
    }
    public function ListSectionActual() {
        $ic = new Connection();
        $sql = "SELECT idSeccion, idGrado, desSeccion, fechaCreacion from tb_seccion where year(fechaCreacion)=YEAR(NOW());";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }

}