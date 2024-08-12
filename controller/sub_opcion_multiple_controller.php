<?php
require_once("model/sub_opcion_multiple_model.php");
class SubOpcionMultipleController extends sub_opcion_multiple_model
{
    public function SaveInfoForModel($idPregunta, $cantOpciones)
    {
        $this->InsertOpcionMultiple($idPregunta, $cantOpciones);
        return $this->getIdOpcionMultiple();
    }
}
?>
