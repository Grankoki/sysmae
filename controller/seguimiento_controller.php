<?php
require_once("model/seguimiento_model.php");
require_once("model/curso_model.php");
require_once ('model/unidad_model.php');
require_once ('model/evaluacion_estudiante_model.php');
class SeguimientoController extends seguimiento_model
{
    public $curso_model;
    public $unidad_model;
    public $evaluacion_estudiante_model;

    public function __construct()
    {
        $this->curso_model = new curso_model();
        $this->unidad_model = new unidad_model();
        $this->evaluacion_estudiante_model = new evaluacion_estudiante_model();
    }
    public function CursosView($listaCursoDocente){
        require 'view/seguimiento/lst_cursosDocente.php';
    }
    public function UnidadesView($listaUCD,$promedioUnidad,$promedioFinal){
        require 'view/seguimiento/lst_unidadesCurso.php';
    }
    public function SeguimientoUnidadView($listaUCD, $listaEstudiantesBPU, $listaTemasBPU){
        require 'view/seguimiento/lst_estudiantesBajoPuntaje.php';
    }

}

if (isset($_GET['seguimiento']) && $_GET['seguimiento']=="lst_cursosDocente"){
    $instanciaControlador = new SeguimientoController();
    $listaCursoDocente = $instanciaControlador->curso_model->ListCursosDocente($_SESSION['idDocente']);
    $instanciaControlador->CursosView($listaCursoDocente);
}
if (isset($_GET['seguimiento']) && $_GET['seguimiento']=="lst_unidadesCursoDocente"){
    $idCurso    = base64_decode(@$_GET['idCurso']);
    $idSeccion  = base64_decode(@$_GET['idSeccion']);
    $_SESSION['idCurso']=$idCurso;
    $_SESSION['idSeccion']=$idSeccion;
    $_SESSION['detalleSeccion'] = @$_GET['detalleSeccion'];
    $_SESSION['detalleCurso']=@$_GET['detalleCurso'];
    $instanciaControlador = new SeguimientoController();
    //$listaUCD= $instanciaControlador->get_unidadCursoDocente($idCurso,$idSeccion);
    $listaUCD=$instanciaControlador->unidad_model->ListUnityByCourse($idCurso,$idSeccion);
    $promedioUnidad = $instanciaControlador->CourseUnitAverage($idSeccion,$idCurso);
    $promedioFinal = $instanciaControlador->UnitStudentAverage($idSeccion,$idCurso);
    $instanciaControlador->UnidadesView($listaUCD,$promedioUnidad,$promedioFinal);
}
if (isset($_GET['seguimiento']) && $_GET['seguimiento']=="lst_estudiantesBPU"){
    $instanciaControlador = new SeguimientoController();
    $idUnidad = base64_decode($_GET['idUnidad']);
    $listaUCD = $instanciaControlador->unidad_model->ListUnityByCourse($_SESSION['idCurso'],$_SESSION['idSeccion']);
    //$cantEvaluaciones = $instanciaControlador->CountEvaluations($idUnidad);
    //$cantTareas = $instanciaControlador->CountTasks($idUnidad);
    //$registroTareas = $instanciaControlador->ListTaskScores($idUnidad);
    //$registroEvaluaciones=$instanciaControlador->ListEvaluationScores($idUnidad);
    //$contRegistros = $instanciaControlador->seccion_model->RecordCounter($_SESSION['idSeccion']);
    //$instanciaControlador->CalificacionesUnidadView($listaUCD,$cantTareas,$cantEvaluaciones,$registroEvaluaciones,$registroTareas,$contRegistros);
    $listaEstudiantesBPU=$instanciaControlador->ListStudentsToReinforce($idUnidad);
    $listaTemasBPU = $instanciaControlador->ListTopicsToReinforce($idUnidad);
    $instanciaControlador->SeguimientoUnidadView($listaUCD,$listaEstudiantesBPU,$listaTemasBPU);
}
