<?php
require_once("model/tema_model.php");

class TemaController extends tema_model
{
    public function get_ListTopicByCourse($idSeccion,$idCurso) {
        $matriz = $this->ListTopicByCourse($idSeccion,$idCurso);
        return $matriz;
    }
    public function get_SearchTopicByUnity($idUnidad) {
        $matriz = $this->SearchTopicByUnity($idUnidad);
        return $matriz;
    }
}


?>