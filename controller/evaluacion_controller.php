<?php
// EVALUACION_CONTROLLER
require_once("model/evaluacion_model.php");
require_once("model/evaluacion_estudiante_model.php");
require_once("docente_controller.php");
require_once ("tema_controller.php");
require_once ("pregunta_controller.php");
class EvaluacionController extends evaluacion_model
{
    public $docente_model;
    public $tema_controller;
    public $pregunta_model;
    public function __construct()
    {
        $this->evaluacion_estudiante_model = new evaluacion_estudiante_model();
        $this->docente_model = new docente_model();
        $this->pregunta_model = new pregunta_model();
        $this->tema_controller = new TemaController();
    }
    public function redirectContenido(){
        ?>
        <script>window.history.go(-2)</script>
        <?php
    }
    public function redirectBack(){
        ?>
        <script>window.history.go(-1)</script>
        <?php
    }
    public function get_DatosEvaluacion($idEvaluacion) {
        $matrizTUCD = $this->ListEvaluacionByIdEvaluacion($idEvaluacion);
        return $matrizTUCD;
    }
    public function get_ListPreguntaByTema($idTema) {
        $matriz = $this->pregunta_model->ListQuestionByTopic($idTema);
        return $matriz;
    }
    public function get_DatosPreguntaByIdPregunta($idPregunta, $idTipoPregunta){
        $matriz = $this->pregunta_model->DataQuestionByIdQuestion($idPregunta, $idTipoPregunta);
        return $matriz;
    }
    public function get_PreguntasEvaluacionTipo1($idEvaluacion){
        $matriz = $this->pregunta_model->ListQuestionsByEvaluation($idEvaluacion);
        return $matriz;
    }
    public function get_PreguntasEvaluacionTipo2($idEvaluacion){
        $matriz = $this->pregunta_model->ListQuestionsByEvaluationTipo2($idEvaluacion);
        return $matriz;
    }
    public function CambiarEstadoEvaluacion($idEvaluacion, $estado){
        $this->ChangeEvaluationStatus($idEvaluacion, $estado);
    }
    public function FrmRegistrarEvaluacionView($listaTUCD){
        require 'view/evaluacion/frm_registrarEvaluacion.php';
    }
    public function FrmEditarEvaluacionView($listaTUCD,$datosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2){
        require 'view/evaluacion/frm_editarEvaluacion.php';
    }
    public function FrmEditarPreguntaEvaluacionView($listaTUCD,$datosPreguntaEvaluacion){
        require 'view/pregunta/frm_editarPreguntaEvaluacion.php';
    }
    public function LstPreguntasEvaluacionView($listaTUCD,$listaTemaCurso, $listaPreguntaByTema){
        require 'view/pregunta/lst_preguntasTema.php';
    }
    public function FrmAgregarPreguntaView($listaTUCD,$datosPregunta){
        require 'view/pregunta/frm_agregarPregunta.php';
    }
    public function asignarEvaluacionPorSeccion($idSeccion, $idEvaluacion, $intentos)
    {
        $this->evaluacion_estudiante_model->crearPorIdseccion($idSeccion, $idEvaluacion, $intentos);
    }
    public function SaveInfoForModel($titulo, $descripcion, $intentos, $fechaInicio, $fechaTermino, $idTema, $fechaHoy, $estado)
    {
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->intentos = $intentos;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaTermino;
        $this->idTema = $idTema;
        $this->fechaCreacion = $fechaHoy;
        $this->estado = $estado;
        $this->InsertEvaluacion();
        return $this->getIdEvaluacion();
    }
    public function UpdateInfoForModel($idEvaluacion, $titulo, $descripcion, $intentos, $fechaInicio, $fechaTermino, $fechaHoy)
    {
        $this->idEvaluacion = $idEvaluacion;
        $this->titulo = $titulo;
        $this->descripcion = $descripcion;
        $this->intentos = $intentos;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaTermino;
        $this->fechaCreacion = $fechaHoy;
        $this->UpdateEvaluacion($idEvaluacion, $titulo, $descripcion, $intentos, $fechaInicio, $fechaTermino, $fechaHoy);
    }
    public function UpdatePreguntaEvaluacion($idPregunta, $idEvaluacion, $puntaje)
    {
        $this->pregunta_model->UpdatePreguntaEvaluacion($idPregunta, $idEvaluacion, $puntaje);
    }
    public function DeletePreguntaEvaluacion($idPregunta, $idEvaluacion)
    {
        $this->pregunta_model->DeletePreguntaEvaluacion($idPregunta, $idEvaluacion);
    }
    public function agregarPregunta_Evaluacion($idEvaluacion, $idPregunta, $puntajePregunta)
    {
        $this->pregunta_model->AddQuestionToEvaluation($idEvaluacion, $idPregunta, $puntajePregunta);
    }

}
if (isset($_GET['button']) && $_GET['button'] == "button_backEvaluacion") {
    $instanciaControlador = new EvaluacionController();
    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosEvaluacion = $instanciaControlador->get_DatosEvaluacion($_SESSION['idEvaluacion']);
    $preguntasEvaluacion = $instanciaControlador->get_PreguntasEvaluacionTipo1($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo2 = $instanciaControlador->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
    $instanciaControlador->FrmEditarEvaluacionView($listaTUCD,$datosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion']=="frm_registrarEvaluacion"){
    $instanciaControlador = new EvaluacionController();
    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $instanciaControlador->FrmRegistrarEvaluacionView($listaTUCD);
}
if (isset($_POST['action']) && $_POST['action'] == "registrar") {
    date_default_timezone_set('America/Lima');
    $fechaHoy = date('Y-m-d H:i:s');
    $estado = 1;
    $idSeccion = $_SESSION['idSeccion'];
    $instanciaControlador = new EvaluacionController();
    $idEvaluacion = $instanciaControlador->SaveInfoForModel(
        $_POST['txt_titulo'],
        $_POST['txt_descripcion'],
        $_POST['cbx_intentos'],
        $_POST['fechaInicio'],
        $_POST['fechaTermino'],
        $_POST['txt_idTema'],
        $fechaHoy,
        $estado
    );

    $instanciaControlador->asignarEvaluacionPorSeccion($idSeccion, $idEvaluacion,  $_POST['cbx_intentos']);
    $instanciaControlador->redirectContenido();
}
if (isset($_POST['action']) && $_POST['action'] == "actualizar") {
    date_default_timezone_set('America/Lima');
    $fechaHoy = date('Y-m-d H:i:s');
    $instanciaControlador = new EvaluacionController();
    $instanciaControlador->UpdateInfoForModel(
        $_POST['txt_idEvaluacion'],
        $_POST['txt_titulo'],
        $_POST['txt_descripcion'],
        $_POST['cbx_intentos'],
        $_POST['fechaInicio'],
        $_POST['fechaTermino'],
        $fechaHoy
    );
    $instanciaControlador->redirectContenido();
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "frm_editarEvaluacion") {
    $instanciaControlador = new EvaluacionController();
    $idEvaluacion = base64_decode($_GET['idEvaluacion']);
    $_SESSION['idEvaluacion'] = $idEvaluacion;

    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosEvaluacion = $instanciaControlador->get_DatosEvaluacion($idEvaluacion);
    $preguntasEvaluacion = $instanciaControlador->get_PreguntasEvaluacionTipo1($idEvaluacion);
    $preguntasEvaluacionTipo2 = $instanciaControlador->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
    $instanciaControlador->FrmEditarEvaluacionView($listaTUCD,$datosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion']=="lst_preguntasTema"){
    $idSeccion = $_SESSION['idSeccion'];
    $idCurso=$_SESSION['idCurso'];
    $instanciaControlador = new EvaluacionController();

    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $listaTemaCurso = $instanciaControlador->tema_controller->get_ListTopicByCourse($idSeccion,$idCurso);
    $listaPreguntaByTema = null;
    $instanciaControlador->LstPreguntasEvaluacionView($listaTUCD, $listaTemaCurso, $listaPreguntaByTema);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion']=="lst_preguntasTemaForSelec"){
    $idSeccion = $_SESSION['idSeccion'];
    $idCurso=$_SESSION['idCurso'];
    $instanciaControlador = new EvaluacionController();

    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $listaTemaCurso = $instanciaControlador->tema_controller->ListTopicByCourse($idSeccion,$idCurso);
    $listaPreguntaByTema = $instanciaControlador->get_ListPreguntaByTema($_POST['cbx_selec_tema']);
    $instanciaControlador->LstPreguntasEvaluacionView($listaTUCD, $listaTemaCurso, $listaPreguntaByTema);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "frm_agregarPregunta") {
    $instanciaControlador = new EvaluacionController();
    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosPregunta = $instanciaControlador->get_DatosPreguntaByIdPregunta(@$_GET['idPregunta'], @$_GET['idTipoPregunta']);
    $instanciaControlador->FrmAgregarPreguntaView($listaTUCD,$datosPregunta);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "cmd_agregarPregunta") {
    $instanciaControlador = new EvaluacionController();
    $instanciaControlador->agregarPregunta_Evaluacion($_POST['txt_idEvaluacion'], $_POST['txt_idPregunta'], $_POST['cbx_puntajePregunta']);

    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosEvaluacion = $instanciaControlador->get_DatosEvaluacion($_SESSION['idEvaluacion']);
    $preguntasEvaluacion = $instanciaControlador->get_PreguntasEvaluacionTipo1($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo2 = $instanciaControlador->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
    $instanciaControlador->FrmEditarEvaluacionView($listaTUCD,$datosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "frm_editarPreguntaEvaluacion") {
    $instanciaControlador = new EvaluacionController();
    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosPreguntaEvaluacion = $instanciaControlador->get_DatosPreguntaByIdPregunta(@$_GET['idPregunta'], @$_GET['idTipoPregunta']);
    $instanciaControlador->FrmEditarPreguntaEvaluacionView($listaTUCD,$datosPreguntaEvaluacion);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "cmd_editarPreguntaEvaluacion") {
    $instanciaControlador = new EvaluacionController();
    $instanciaControlador->UpdatePreguntaEvaluacion($_POST['txt_idPregunta'], $_POST['txt_idEvaluacion'], $_POST['cbx_puntajePregunta']);

    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosEvaluacion = $instanciaControlador->get_DatosEvaluacion($_SESSION['idEvaluacion']);
    $preguntasEvaluacion = $instanciaControlador->get_PreguntasEvaluacionTipo1($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo2 = $instanciaControlador->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
    $instanciaControlador->FrmEditarEvaluacionView($listaTUCD,$datosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "cmd_retirarPregunta") {
    $instanciaControlador = new EvaluacionController();
    $instanciaControlador->DeletePreguntaEvaluacion(@$_GET['idPregunta'], @$_GET['idEvaluacion']);

    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosEvaluacion = $instanciaControlador->get_DatosEvaluacion($_SESSION['idEvaluacion']);
    $preguntasEvaluacion = $instanciaControlador->get_PreguntasEvaluacionTipo1($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo2 = $instanciaControlador->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
    $instanciaControlador->FrmEditarEvaluacionView($listaTUCD,$datosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2);
}
if (isset($_GET['evaluacion']) && $_GET['evaluacion'] == "cmd_estadoEvaluacion") {
    $instanciaControlador = new EvaluacionController();
    $instanciaControlador->CambiarEstadoEvaluacion(@$_GET['idEvaluacion'], @$_GET['estado']);
    $instanciaControlador->redirectBack();
}
?>