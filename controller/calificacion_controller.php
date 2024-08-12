<?php
require_once 'model/calificacion_model.php';
require_once 'docente_controller.php';
require_once 'unidad_controller.php';
require_once 'model/seccion_model.php';
class CalificacionController extends calificacion_model
{
    public $docente_controller;
    public $unidad_controller;
    public $seccion_model;
    public function __construct()
    {
        $this->docente_controller = new DocenteController();
        $this->unidad_controller = new UnidadController();
        $this->seccion_model = new seccion_model();
    }

    public function CursosView($listaCursoDocente){
        require 'view/calificacion/lst_cursosDocente.php';
    }
    public function UnidadesView($listaUCD){
        require 'view/calificacion/lst_unidadesCurso.php';
    }
    public function CalificacionesUnidadView($listaUCD, $cantTareas,$cantEvaluaciones,$registroEvaluaciones,$registroTareas,$contRegistros){
        require 'view/calificacion/lst_calificacionesUCD.php';
    }

}

if (isset($_GET['registro']) && $_GET['registro']=="lst_cursosDocente"){
    $instanciaControlador = new CalificacionController();
    $listaCursoDocente = $instanciaControlador->docente_controller->get_cursoDocente($_SESSION['idDocente']);
    $instanciaControlador->CursosView($listaCursoDocente);
}

if (isset($_GET['registro']) && $_GET['registro']=="lst_unidadesCursoDocente"){
    $instanciaControlador = new CalificacionController();
    $idCurso    = base64_decode(@$_GET['idCurso']);
    $idSeccion  = base64_decode(@$_GET['idSeccion']);
    $_SESSION['idCurso']=$idCurso;
    $_SESSION['idSeccion']=$idSeccion;
    $_SESSION['detalleSeccion'] = @$_GET['detalleSeccion'];
    $_SESSION['detalleCurso']=@$_GET['detalleCurso'];
    $listaUCD=$instanciaControlador->unidad_controller->get_ListarUnidadesCurso($idCurso,$idSeccion);
    $instanciaControlador->UnidadesView($listaUCD);
}
if (isset($_GET['registro']) && $_GET['registro']=="lst_calificacionesUCD"){
    $instanciaControlador = new CalificacionController();
    $idUnidad = base64_decode($_GET['idUnidad']);
    $listaUCD = $instanciaControlador->unidad_controller->get_ListarUnidadesCurso($_SESSION['idCurso'],$_SESSION['idSeccion']);
    $cantEvaluaciones = $instanciaControlador->CountEvaluations($idUnidad);
    $cantTareas = $instanciaControlador->CountTasks($idUnidad);
    $registroTareas = $instanciaControlador->ListTaskScores($idUnidad);
    $registroEvaluaciones=$instanciaControlador->ListEvaluationScores($idUnidad);
    $contRegistros = $instanciaControlador->seccion_model->RecordCounter($_SESSION['idSeccion']);
    $instanciaControlador->CalificacionesUnidadView($listaUCD,$cantTareas,$cantEvaluaciones,$registroEvaluaciones,$registroTareas,$contRegistros);
}