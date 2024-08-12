<?php
require_once 'model/evaluacion_estudiante_model.php';
require_once 'model/tema_model.php';
require_once 'model/evaluacion_model.php';
require_once 'model/estudiante_model.php';
require_once 'model/pregunta_model.php';
class EvaluacionEstudianteController extends evaluacion_estudiante_model
{
    public $tema_model;
    public $evaluacion_model;
    public $pregunta_model;
    public $estudiante_model;

    public function __construct()
    {
        $this->tema_model = new tema_model();
        $this->evaluacion_model = new evaluacion_model();
        $this->pregunta_model = new pregunta_model();
        $this->estudiante_model = new estudiante_model();
    }
    public function redirectBack(){
        ?>
        <script>window.history.go(-1)</script>
        <?php
    }
    public function ListaEvaluacionEstudianteByTema($idEvaluacion)
    {
        $matriz = $this->ListStudentsEvaluationByTopic($idEvaluacion);
        return $matriz;
    }

    public function LstEvaluacionEstudianteView($temasUnd, $listaEvlEstudiante)
    {
        require 'view/evaluacion/lst_evalucionEstudianteTema.php';
    }

    public function FrmDetalleEvaluacionEstudianteView($temasUnd, $DatosEvaluacion, $preguntasEvaluacionTipo1, $preguntasEvaluacionTipo2, $listaOpcSeleccionadasT1, $listaOpcSeleccionadasT2)
    {
        require 'view/evaluacion/frm_detalleEvaluacionEstudiante.php';
    }
    public function FrmDetalleCalificacionEvaluacionView($temasUnd, $DatosEvaluacion, $preguntasEvaluacionTipo1, $preguntasEvaluacionTipo2, $listaOpcSeleccionadasT1, $listaOpcSeleccionadasT2)
    {
        require 'view/evaluacion/frm_detalleCalificacionEvaluacion.php';
    }

    public function BuscarUltimoIntentoEvaluacion($idEvaluacion, $idEstudiante)
    {
        $intento = $this->SearchEvaluationLastTry($idEvaluacion, $idEstudiante);
        return $intento;
    }
    public function ListAlternativasSeleccionadasT1($idEvaluacion, $idEstudiante, $intento)
    {
        $matriz = $this->ListStudentsEvaluationAlternativesType1($idEvaluacion, $idEstudiante, $intento);
        return $matriz;
    }
    public function ListAlternativasSeleccionadasT2($idEvaluacion, $idEstudiante, $intento)
    {
        $matriz = $this->ListStudentsEvaluationAlternativesType2($idEvaluacion, $idEstudiante, $intento);
        return $matriz;
    }
}
if (isset($_GET['docente']) && $_GET['docente']=="lst_revisarEvaluacionEstudiante"){
    $instanciaControlador = new EvaluacionEstudianteController();
    $_SESSION['idEvaluacion'] = $_GET['idEvaluacion'];
    $temasUnd = $instanciaControlador->tema_model->SearchTopicByUnity($_SESSION['idUnidad']);
    $listaEvlEstudiante=$instanciaControlador->ListaEvaluacionEstudianteByTema($_GET['idEvaluacion']);
    $instanciaControlador->LstEvaluacionEstudianteView($temasUnd,$listaEvlEstudiante);
}

if (isset($_GET['evaluacion']) && $_GET['evaluacion']=="frm_detalleEvaluacionEstudiante"){
    $instanciaControlador = new EvaluacionEstudianteController();
    $temasUnd = $instanciaControlador->tema_model->SearchTopicByUnity($_SESSION['idUnidad']);
    $lastEvaluacion = $instanciaControlador->BuscarUltimoIntentoEvaluacion($_SESSION['idEvaluacion'], $_GET['idEstudiante']);
    $listaOpcSeleccionadasT1 = $instanciaControlador->ListAlternativasSeleccionadasT1($_SESSION['idEvaluacion'], $_GET['idEstudiante'], $lastEvaluacion);
    $listaOpcSeleccionadasT2 = $instanciaControlador->ListAlternativasSeleccionadasT2($_SESSION['idEvaluacion'], $_GET['idEstudiante'], $lastEvaluacion);
    $DatosEvaluacion = $instanciaControlador->evaluacion_model->ListEvaluacionByIdEvaluacion($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo1 = $instanciaControlador->pregunta_model->ListQuestionsByEvaluation($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo2 = $instanciaControlador->pregunta_model->ListQuestionsByEvaluationTipo2($_SESSION['idEvaluacion']);
    $instanciaControlador->FrmDetalleEvaluacionEstudianteView($temasUnd,$DatosEvaluacion,$preguntasEvaluacionTipo1,$preguntasEvaluacionTipo2, $listaOpcSeleccionadasT1, $listaOpcSeleccionadasT2);
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="frm_verEvaluacion"){
    $instanciaControlador = new EvaluacionEstudianteController();
    $temasUnd = $instanciaControlador->tema_model->SearchTopicByUnity($_SESSION['idUnidad']);
    $verificarIntento = $instanciaControlador->estudiante_model->VerifyEvaluationTry($_GET['idEvaluacion'], $_SESSION['idEstudiante']);
    foreach ($verificarIntento as $registroIntento){
        if($registroIntento->puntajeTotal!=null){
            $lastEvaluacion = $instanciaControlador->BuscarUltimoIntentoEvaluacion($_GET['idEvaluacion'], $_SESSION['idEstudiante']);
            $listaOpcSeleccionadasT1 = $instanciaControlador->ListAlternativasSeleccionadasT1($_GET['idEvaluacion'], $_SESSION['idEstudiante'], $lastEvaluacion);
            $listaOpcSeleccionadasT2 = $instanciaControlador->ListAlternativasSeleccionadasT2($_GET['idEvaluacion'], $_SESSION['idEstudiante'], $lastEvaluacion);
            $DatosEvaluacion = $instanciaControlador->evaluacion_model->ListEvaluacionByIdEvaluacion($_GET['idEvaluacion']);
            $preguntasEvaluacionTipo1 = $instanciaControlador->pregunta_model->ListQuestionsByEvaluation($_GET['idEvaluacion']);
            $preguntasEvaluacionTipo2 = $instanciaControlador->pregunta_model->ListQuestionsByEvaluationTipo2($_GET['idEvaluacion']);
            $instanciaControlador->FrmDetalleCalificacionEvaluacionView($temasUnd,$DatosEvaluacion,$preguntasEvaluacionTipo1,$preguntasEvaluacionTipo2, $listaOpcSeleccionadasT1, $listaOpcSeleccionadasT2);
        }else{
            ?> <script>alert("NO HA DESARROLLADO LA EVALUACION")</script><?php
            $instanciaControlador->redirectBack();
        }
    }



}