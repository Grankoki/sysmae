<?php
require_once 'model/tarea_estudiante_model.php';
require_once 'tema_controller.php';
require_once 'tarea_controller.php';
class TareaEstudianteController extends tarea_estudiante_model
{
    public $tema_controller;
    public $tarea_controller;
    public function __construct(){
        $this->tema_controller = new TemaController();
        $this->tarea_controller = new TareaController();
    }
    public function ListTareaEstudianteByIdTarea($idTarea)
    {
        $this->ListStudentTaskByIdTarea($idTarea);
    }
    public function redirectBack(){
        ?>
        <script>window.history.go(-2)</script>
        <?php
    }
    public function CalificarTareaEstudiante($idTarea, $idEstudiante, $puntaje)
    {
        $this->UpdateStudentTaskScore($idTarea, $idEstudiante, $puntaje);
    }
    public function get_StudentTask($idTarea, $idEstudiante)
    {
        $datos = $this->SearchStudentTask($idTarea, $idEstudiante);
        return $datos;
    }
    public function FrmDetalleTareaEstudianteView($listaTU,$datosTE, $descripcionTarea){
        require 'view/tarea/frm_detalleTareaEstudiante.php';
    }
    public function FrmDetalleCalificacionTareaView($listaTU,$datosTE){
        require 'view/tarea/frm_detalleCalificacionTarea.php';
    }
}

if (isset($_GET['tarea']) && $_GET['tarea'] == "frm_detalleTareaEstudiante") {
    $instanciaControlador = new TareaEstudianteController();
    $listaTU= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosTE = $instanciaControlador->get_StudentTask($_SESSION['idTarea'], $_GET['idEstudiante']);
    $instanciaControlador->FrmDetalleTareaEstudianteView($listaTU,$datosTE,$_GET['descripcionTarea']);
}
if (isset($_POST['action']) && $_POST['action'] == "calificarTarea") {
    $instanciaControlador = new TareaEstudianteController();
    $instanciaControlador->CalificarTareaEstudiante($_SESSION['idTarea'],$_POST['idEstudiante'],$_POST['cbx_puntaje']);
    $listaTU= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $listaTE = $instanciaControlador->ListStudentTaskByIdTarea($_SESSION['idTarea']);
    $instanciaControlador->tarea_controller->FrmRevisarTareaView($listaTU,$listaTE,$_GET['descripcionTarea']);
}
if (isset($_GET['estudiante']) && $_GET['estudiante'] == "frm_verCalificacion") {
    $instanciaControlador = new TareaEstudianteController();
    $listaTU= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $datosTE = $instanciaControlador->get_StudentTask($_GET['idTarea'], $_SESSION['idEstudiante']);
    $instanciaControlador->FrmDetalleCalificacionTareaView($listaTU,$datosTE);
}