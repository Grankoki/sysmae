<?php
require_once("config/connection.php");
class pregunta_model
{
    protected $idPregunta;
    protected $selecTema;
    protected $nomPregunta;
    protected $estado;
    protected $enunciado;
    protected $tipoPregunta;
    protected $imgPregunta;

    protected function ListTipoPregunta(){
        $ic = new Connection();
        $sql = "SELECT idTipoPregunta, descripcion, estado from tb_tipo_pregunta";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    protected function InsertPregunta() {
        try {
            $ic = new Connection();
            $sql = "INSERT INTO tb_pregunta (idTema, nombrePregunta, estado, enunciado, idTipoPregunta, imgPregunta) VALUES (?, ?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$this->selecTema);
            $insertar->bindParam(2,$this->nomPregunta);
            $insertar->bindParam(3,$this->estado);
            $insertar->bindParam(4,$this->enunciado);
            $insertar->bindParam(5,$this->tipoPregunta);
            $insertar->bindParam(6,$this->imgPregunta);
            $insertar->execute();
            $this->idPregunta = $ic->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function ListQuestionByTopic($idTema){
        $ic = new Connection();
        $sql = "SELECT idPregunta, tb_pregunta.idTipoPregunta as idTipoPregunta, nombrePregunta, enunciado, tb_tipo_pregunta.descripcion as tipoPregunta from tb_pregunta
                                    	inner join tb_tipo_pregunta on tb_tipo_pregunta.idTipoPregunta = tb_pregunta.idTipoPregunta
                                    	where tb_pregunta.idTema = '$idTema' and tb_pregunta.estado=1";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListQuestionsByEvaluation($idEvaluacion){
        $ic = new Connection();
        $sql = "SELECT pe.idEvaluacion as idEvaluacion, p.idPregunta as idPregunta, pe.puntaje as puntaje, p.idTipoPregunta as idTipoPregunta, imgPregunta,
                               p.nombrePregunta, tp.descripcion as tipoPregunta, p.enunciado as enunciado, om.idOpcionMultiple as idOpcionMultiple, om.idPregunta as idPregunta, 
                             om.cantOpciones as cantOpciones, som.eleccion as eleccion, som.pesoOpcion as pesoOpcion, som.retroalimentacion, som.idSubOpcMultiple as idSubOpcMultiple
                        from tb_pregunta_evaluacion pe inner join tb_pregunta p on p.idPregunta = pe.idPregunta
                             inner join tb_tipo_pregunta tp on tp.idTipoPregunta = p.idTipoPregunta
                             inner join tb_opcion_multiple om on om.idPregunta= p.idPregunta
                             inner join tb_sub_opc_multiple som on om.idOpcionMultiple= som.idOpcionMultiple
                             where idEvaluacion = '$idEvaluacion'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListQuestionsByEvaluationTipo2($idEvaluacion){
        $ic = new Connection();
        $sql = "SELECT tb_pregunta_evaluacion.idEvaluacion as idEvaluacion, tb_pregunta_evaluacion.idPregunta as idPregunta, 
                            					   tb_pregunta_evaluacion.puntaje as puntaje, tb_pregunta.idTipoPregunta as idTipoPregunta, imgPregunta,
                            					   tb_pregunta.nombrePregunta, tb_tipo_pregunta.descripcion as tipoPregunta, tb_pregunta.enunciado as enunciado,
                                                   tb_verdadero_falso.respuesta as respuesta
                            				from tb_pregunta_evaluacion
                            			             inner join tb_pregunta on tb_pregunta.idPregunta = tb_pregunta_evaluacion.idPregunta
                                                     inner join tb_tipo_pregunta on tb_tipo_pregunta.idTipoPregunta = tb_pregunta.idTipoPregunta
                                                     inner join tb_verdadero_falso on tb_verdadero_falso.idPregunta = tb_pregunta_evaluacion.idPregunta
                            		          where idEvaluacion = '$idEvaluacion'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function DataQuestionByIdQuestion($idPregunta, $idTipoPregunta){
        $ic = new Connection();
        if($idTipoPregunta==1){
            $sql = "SELECT tb_opcion_multiple.idOpcionMultiple as idOpcionMultiple, tb_opcion_multiple.idPregunta as idPregunta, 
							tb_opcion_multiple.cantOpciones as cantOpciones, tb_sub_opc_multiple.eleccion as eleccion, tb_sub_opc_multiple.pesoOpcion,
							tb_sub_opc_multiple.retroalimentacion, tb_sub_opc_multiple.idSubOpcMultiple as idSubOpcMultiple
                        from tb_sub_opc_multiple
                        inner join tb_opcion_multiple on tb_sub_opc_multiple.idOpcionMultiple = tb_opcion_multiple.idOpcionMultiple
				        where idPregunta='$idPregunta'";
            $consulta=$ic->db->prepare($sql);
            $consulta->execute();
        }else if($idTipoPregunta==2){
            $sql = "SELECT * from tb_verdadero_falso where idPregunta='$idPregunta'";
            $consulta=$ic->db->prepare($sql);
            $consulta->execute();
        }
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function AddQuestionToEvaluation($idEvaluacion, $idPregunta, $puntaje) {
        try {
            $ic = new Connection();
            $sql = "INSERT INTO tb_pregunta_evaluacion (idEvaluacion, idPregunta, puntaje) VALUES (?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$idEvaluacion);
            $insertar->bindParam(2,$idPregunta);
            $insertar->bindParam(3,$puntaje);
            $insertar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function UpdatePreguntaEvaluacion($idPregunta, $idEvaluacion, $puntaje){
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_pregunta_evaluacion SET puntaje ='$puntaje' where idEvaluacion='$idEvaluacion' and idPregunta='$idPregunta'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function DeletePreguntaEvaluacion($idPregunta, $idEvaluacion){
        try {
            $ic = new Connection();
            $sql = "DELETE FROM tb_pregunta_evaluacion where idPregunta='$idPregunta' and idEvaluacion='$idEvaluacion'";
            $retirar = $ic->db->prepare($sql);
            $retirar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function getIdPregunta()
    {
        return $this->idPregunta;
    }


}
?>