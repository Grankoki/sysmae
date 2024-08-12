<?php
// -------------------------------------
// tarea_controller.php
// -------------------------------------
require_once("model/tarea_model.php");
require_once("model/tarea_estudiante_model.php");
require_once("model/docente_model.php");
require_once 'tema_controller.php';
class TareaController extends tarea_model
{
    public $tema_controller;
    public $tarea_estudiante_model;
    public $docente_model;
    public function __construct()
    {
        $this->tarea_estudiante_model = new tarea_estudiante_model();
        $this->docente_model = new docente_model();
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
    public function get_DatosTarea($idTarea) {
        $matriz = $this->ListTareaByIdTarea($idTarea);
        return $matriz;
    }
    public function get_DatosTareaEstudiante($idTarea, $idEstudiante) {
        $matriz = $this->ListTaskByIdTareaIdEstudiante($idTarea, $idEstudiante);
        return $matriz;
    }
    public function asignarTareaPorSession($idSeccion, $idTarea)
    {
        $this->tarea_estudiante_model->crearPorIdsession($idSeccion, $idTarea);
    }
    public function get_ListTaskByTopic($idTema)
    {
        $matriz = $this->ListTaskByTopic($idTema);
        return $matriz;
    }
    public function SaveInfoForModel($titulo, $enunciado, $fechaInicio, $fechaFin, $idTema, $nameDocumento, $fechaHoy, $estado)
    {
        $this->enunciado = $enunciado;
        $this->descripcion = $titulo;
        $this->fechaCreacion = $fechaHoy;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaFin;
        $this->idTema = $idTema;
        $this->documento = $nameDocumento;
        $this->estado = $estado;
        $this->InsertTarea();
        return $this->getIdtarea();
    }
    public function UpdateInfoForModel($titulo, $enunciado, $fechaInicio, $fechaFin, $idTema, $nameDocumento, $fechaHoy)
    {
        $this->enunciado = $enunciado;
        $this->descripcion = $titulo;
        $this->fechaCreacion = $fechaHoy;
        $this->fechaInicio = $fechaInicio;
        $this->fechaTermino = $fechaFin;
        $this->idTema = $idTema;
        $this->documento = $nameDocumento;
        $this->UpdateTarea($titulo, $enunciado, $fechaInicio, $fechaFin, $idTema, $nameDocumento, $fechaHoy);
    }
    public function RetirarDocumentoTarea($idTarea)
    {
        $this->idTarea = $idTarea;
        $this->DeleteDocumento();
    }
    public function RetirarDocumentoTareaEstudiante($idTarea, $idEstudiante)
    {
        $this->DeleteDocumentTaskEstudent($idTarea, $idEstudiante);
    }
    public function CambiarEstadoTarea($idTarea, $estado)
    {
        $this->ChangeTaskStatus($idTarea, $estado);
    }

    public function RegistrarDesarrolloTareaEstudiante($idTarea, $idEstudiante, $detalle,$archivo)
    {
        $this->RecordTaskDevelopment($idTarea, $idEstudiante, $detalle, $archivo);
    }
    public function FrmEditarTareaView($listaTUCD,$datosTarea){
        require 'view/tarea/frm_editarTarea.php';
    }
    public function FrmDesarrollarTareaView($listaTUCE,$datosTarea, $datosTareaEstudiante){
        require 'view/tarea/frm_desarrollarTarea.php';
    }
    public function FrmRevisarTareaView($listaTUCD,$listaTE, $descripcionTarea){
        require 'view/tarea/lst_revisarTarea.php';
    }
}


if (isset($_POST['action']) && $_POST['action'] == "registrar") {
    if (!empty(@$_FILES['documentoTarea']['name'])) {
        $nameDocumento = @$_FILES['documentoTarea']['name'];
        $carpetaDestino = @$_SERVER['DOCUMENT_ROOT'] . '/sysmae_v3.0/img/documentos/uploads/';
        move_uploaded_file(@$_FILES['documentoTarea']['tmp_name'], $carpetaDestino . $nameDocumento);
    } else {
        $nameDocumento = null;
    }
    date_default_timezone_set('America/Lima');
    $fechaHoy = date('Y-m-d');
    $estado = 1;
    $idSeccion = $_SESSION['idSeccion'];
    $instanciaControlador = new TareaController();
    $idTarea = $instanciaControlador->SaveInfoForModel(
        $_POST['txt_titulo'],
        $_POST['txt_enunciado'],
        $_POST['fechaInicio'],
        $_POST['fechaFin'],
        $_POST['txt_idTema'],
        $nameDocumento,
        $fechaHoy,
        $estado
    );
    $instanciaControlador->asignarTareaPorSession($idSeccion, $idTarea);
    $instanciaControlador->redirectContenido();
}
if (isset($_GET['tarea']) && $_GET['tarea'] == "cmd_retirarDocumento") {
    $instanciaControlador = new TareaController();
    $instanciaControlador->RetirarDocumentoTarea($_GET['idTarea']);
    $instanciaControlador->redirectBack();
}
if (isset($_GET['tarea']) && $_GET['tarea'] == "frm_editarTarea") {
    $instanciaControlador = new TareaController();
    $idTarea = base64_decode($_GET['idTarea']);
    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosTarea = $instanciaControlador->get_DatosTarea($idTarea);
    $instanciaControlador->FrmEditarTareaView($listaTUCD,$datosTarea);
}
if (isset($_GET['tarea']) && $_GET['tarea'] == "cmd_editarTarea") {
    $instanciaControlador = new TareaController();
    $documento      = $_POST['nameDocumento'];
    date_default_timezone_set('America/Lima');
    $fechaHoy       = date('Y-m-d H:i:s');
    if (!empty(@$_FILES['documentoTarea']['name'])) {
        $nameDocumento = @$_FILES['documentoTarea']['name'];
        $carpetaDestino = @$_SERVER['DOCUMENT_ROOT'] . '/sysmae_v3.0/img/documentos/uploads/';
        move_uploaded_file(@$_FILES['documentoTarea']['tmp_name'], $carpetaDestino . $nameDocumento);
    } else {  $nameDocumento = $documento; }
    $instanciaControlador->UpdateInfoForModel(
        $_POST['txt_titulo'],
        $_POST['txt_enunciado'],
        $_POST['fechaInicio'],
        $_POST['fechaFin'],
        $_POST['txt_idTarea'],
        $nameDocumento,
        $fechaHoy
    );
    $instanciaControlador->redirectContenido();
}
if (isset($_GET['tarea']) && $_GET['tarea'] == "cmd_estadoTarea") {
    $instanciaControlador = new TareaController();
    $instanciaControlador->CambiarEstadoTarea(@$_GET['idTarea'], @$_GET['estado']);
    $instanciaControlador->redirectBack();
}
if (isset($_GET['estudiante']) && $_GET['estudiante'] == "frm_desarrollarTarea") {
    $instanciaControlador = new TareaController();
    $idTarea = $_GET['idTarea'];
    $_SESSION['idTarea']=$idTarea;
    $listaTUCE= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosTarea = $instanciaControlador->get_DatosTarea($idTarea);
    $datosTareaEstudiante = $instanciaControlador->get_DatosTareaEstudiante($idTarea, $_SESSION['idEstudiante']);
    $instanciaControlador->FrmDesarrollarTareaView($listaTUCE,$datosTarea,$datosTareaEstudiante);
}
if (isset($_GET['estudiante']) && $_GET['estudiante'] == "cmd_desarrollarTarea") {
    $instanciaControlador = new TareaController();
    $documento      = $_POST['nameDocumento'];
    if(!empty(@$_FILES['documentoTarea']['name'])){
        $nameDocumento = @$_FILES['documentoTarea']['name'];
        $carpetaDestino=@$_SERVER['DOCUMENT_ROOT'] . '/sysmae_v3.0/img/documentos/uploads/';
        move_uploaded_file(@$_FILES['documentoTarea']['tmp_name'], $carpetaDestino.$nameDocumento);
    }else{
        {  $nameDocumento = $documento; }
    }
    $instanciaControlador->RegistrarDesarrolloTareaEstudiante($_SESSION['idTarea'], $_SESSION['idEstudiante'],$_POST['txt_descripcion'], $nameDocumento);
    $instanciaControlador->redirectContenido();
}
if (isset($_GET['estudiante']) && $_GET['estudiante'] == "cmd_retirarDocumentoTareaEstudiante") {
    $instanciaControlador = new TareaController();
    $instanciaControlador->RetirarDocumentoTareaEstudiante($_GET['idTarea'], $_SESSION['idEstudiante']);
    $instanciaControlador->redirectBack();
}
if (isset($_GET['docente']) && $_GET['docente'] == "lst_revisarTareaEstudiante") {
    $instanciaControlador = new TareaController();
    $_SESSION['idTarea']=$_GET['idTarea'];
    $listaTUCD= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $listaTE = $instanciaControlador->tarea_estudiante_model->ListStudentTaskByIdTarea($_SESSION['idTarea']);
    $instanciaControlador->FrmRevisarTareaView($listaTUCD,$listaTE,$_GET['descripcionTarea']);
}