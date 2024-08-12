<?php
// -------------------------------------
// estudiante_controller.php
// -------------------------------------
require_once 'model/estudiante_model.php';
require_once 'unidad_controller.php';
require_once 'tema_controller.php';
require_once 'tarea_controller.php';
require_once 'evaluacion_controller.php';
require_once 'model/evaluacion_estudiante_model.php';
require_once 'model/matricula_model.php';
require_once 'model/seccion_model.php';
class EstudianteController extends estudiante_model {
    public $unidad_controller;
    public $tema_controller;
    public $tarea_controller;
    public $evaluacion_controller;
    public $evaluacion_estudiante_model;
    public $genero_model;
    public $matricula_model;
    public $seccion_model;
    public function __construct()
    {
        $this->unidad_controller = new UnidadController();
        $this->tema_controller = new TemaController();
        $this->tarea_controller = new TareaController();
        $this->evaluacion_controller = new EvaluacionController();
        $this->evaluacion_estudiante_model = new evaluacion_estudiante_model();
        $this->genero_model = new genero_model();
        $this->matricula_model = new matricula_model();
        $this->seccion_model = new seccion_model();
    }
    public function get_cursoEstudiante($idEstudiante) {        
        $matrizCursoEstudiante= $this->SearchCursosEstudiante($idEstudiante);
        return $matrizCursoEstudiante;
    }
    public function redirectBack(){
        ?>
        <script>window.history.go(-1)</script>
        <?php
    }
    public function redirectBack2(){
        ?>
        <script>window.history.go(-2)</script>
        <?php
    }
    public function redirectBack3(){
        ?>
        <script>window.history.go(-3)</script>
        <?php
    }
    public function get_evaluacionTUCE($idTema) {
        $matriz= $this->SearchEvaluacionTUCE($idTema);
        return $matriz;
    }
    public function VefificarIntentosEvaluacion($idEvaluacion, $idEstudiante){
        $matriz= $this->VerifyEvaluationTry($idEvaluacion, $idEstudiante);
        return $matriz;
    }

    public function RegistrarRespuestasEstudiante($matrizRptaRadio, $matrizRptaCheck,$matrizRptaVF, $intentos, $idEvaluacion, $idEstudiante, $intentoLast)
    {
        $puntajeTotal=$this->evaluacion_estudiante_model->InsertStudentAnswers($matrizRptaRadio, $matrizRptaCheck,$matrizRptaVF, $intentos, $idEvaluacion, $idEstudiante, $intentoLast);
        return $puntajeTotal;
    }
    public function BuscarUltimoIntentoEvaluacion($idEvaluacion, $idEstudiante)
    {
        $intento=$this->evaluacion_estudiante_model->SearchEvaluationLastTry($idEvaluacion, $idEstudiante);
        return $intento;
    }
    public function EnviarEmailApoderado($idEstudiante)
    {
        $Respuesta=$this->SendEmailToFather($idEstudiante);
        return $Respuesta;
    }
    public function get_listarEstudiantes($nomBuscar, $idSeccion) {
        $matriz = $this->SearchStudentsList($nomBuscar, $idSeccion);
        return $matriz;
    }
    public function get_listarEstudiantesGeneral($nomBuscar) {
        $matriz = $this->SearchGeneralStudentsList($nomBuscar);
        return $matriz;
    }
    public function VerificarEstudianteRegistradoEnSeccion($idEstudiante) {
        $matriz = $this->VerifyStudentRegisteredInSection($idEstudiante);
        return $matriz;
    }
    public function ActualizarDatosEstudiante(
        $nameFoto,
        $idEstudiante,
        $dni,
        $nombre,
        $apePat,
        $apeMat,
        $genero,
        $fecIng,
        $observacion,
        $fecNac
    ) {
        $this->UpdateStudent(
            $nameFoto,
            $idEstudiante,
            $dni,
            $nombre,
            $apePat,
            $apeMat,
            $genero,
            $fecIng,
            $observacion,
            $fecNac
        );
    }
    public function RegistrarDatosEstudiante(
        $nameFoto,
        $idApoderado,
        $dni,
        $nombre,
        $apePat,
        $apeMat,
        $genero,
        $fecIng,
        $observacion,
        $fecNac
    ) {
        $this->fotoEstudiante = $nameFoto;
        $this->idApoderado = $idApoderado;
        $this->dniEstudiante = $dni;
        $this->nombre = $nombre;
        $this->apePat = $apePat;
        $this->apeMat = $apeMat;
        $this->idGenero = $genero;
        $this->fecIngreso = $fecIng;
        $this->observacion = $observacion;
        $this->fecNac = $fecNac;
        $this->InsertStudent();
    }
    public function CursosView($listaCursoEstudiante){
        require 'view/estudiante/lst_cursos_estudiante.php';
    }
    public function UnidadesView($listaUCE){
        require 'view/estudiante/lst_unidades_curso.php';
    } 
    public function TemasUCEView($listaTUCE){
        require 'view/estudiante/lst_tema_unidad_curso.php';
    }

    public function ContenidoTUCEView($listaTareaTUCE, $listaEvaluacionTUCE, $listaTUCE){
        require 'view/estudiante/lst_contenido_tema.php';
    }
    public function FrmDesarrollarEvaluacionView($listaTUCE,$DatosEvaluacion, $preguntasEvaluacion, $preguntasEvaluacionTipo2){
        require 'view/evaluacion/frm_desarrollarEvaluacion.php';
    }
    public function FrmResultadoEvaluacionView($listaTUCE, $puntajeTotal){
        require 'view/evaluacion/rpt_desarrollarEvaluacion.php';
    }
    public function EstudiantesView($listaEstudiantes, $listaSecciones){
        require 'view/estudiante/lst_estudiantes.php';
    }
    public function EstudiantesGeneralView($listaEstudiantes){
        require 'view/estudiante/lst_estudiantesGeneral.php';
    }
    public function EditarEstudianteView($listaEstudiantes, $idEstudiante,$listaGenero,$verificarEstudianteMatricula){
        require 'view/estudiante/frm_editarEstudiante.php';
    }
    public function RegistrarEstudianteView($listaGenero, $idApoderado){
        require 'view/estudiante/frm_registrarEstudiante.php';
    }
    public function MatricularEstudianteView($listaSecciones, $iEstudiante){
        require 'view/estudiante/frm_matricularEstudiante.php';
    }
}

if (isset($_GET['estudiante']) && $_GET['estudiante']=="lst_cursosEstudiante"){
    $instanciaControlador = new EstudianteController();
    $listaCursoEstudiante = $instanciaControlador->get_cursoEstudiante($_SESSION['idEstudiante']);
    $instanciaControlador->CursosView($listaCursoEstudiante);
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="lst_unidadesCursoEstudiante"){
    $idCurso    = base64_decode(@$_GET['idCurso']);
    $idSeccion  = base64_decode(@$_GET['idSeccion']);
    $_SESSION['idSeccion']= $idSeccion;
    $_SESSION['idCurso']=$idCurso;
    $_SESSION['detalleSeccion'] = @$_GET['detalleSeccion'];
    $_SESSION['detalleCurso']=@$_GET['detalleCurso'];
    $instanciaControlador = new EstudianteController();
    //$listaUCE= $instanciaControlador->get_unidadCursoEstudiante($idCurso,$idSeccion);
    $listaUCE=$instanciaControlador->unidad_controller->get_ListarUnidadesCurso($idCurso,$idSeccion);
    $instanciaControlador->UnidadesView($listaUCE);
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="lst_temasUCE"){
    $idUnidad   = base64_decode(@$_GET['idUnidad']);
    $_SESSION['idUnidad'] = $idUnidad;
    $_SESSION['detalleUnidad']= @$_GET['detalleUnidad'];
    $instanciaControlador = new EstudianteController();
    $listaTUCE= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $instanciaControlador->TemasUCEView($listaTUCE);
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="lst_contenidoTUCE"){
    $idTema = base64_decode(@$_GET['idTema']);
    $_SESSION['detalleTema']= @$_GET['detalleTema'];
    $_SESSION['idTema'] = $idTema;
    $instanciaControlador = new EstudianteController();
    $listaTUCE= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    $listaEvaluacionTUCE= $instanciaControlador->get_evaluacionTUCE($idTema);
    $listaTareaTUCE= $instanciaControlador->tarea_controller->get_ListTaskByTopic($idTema);
    $instanciaControlador->ContenidoTUCEView($listaTareaTUCE,$listaEvaluacionTUCE,$listaTUCE);
}
if (isset($_GET['button']) && $_GET['button']=="button_backCourseEst"){
    $instanciaControlador = new EstudianteController();
    $listaUCE=$instanciaControlador->unidad_controller->get_ListarUnidadesCurso($_SESSION['idCurso'],$_SESSION['idSeccion']);
    $instanciaControlador->UnidadesView($listaUCE);
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="frm_desarrollarEvaluacion"){
    $idEvaluacion = @$_GET['idEvaluacion'];
    $_SESSION['idEvaluacion'] = $idEvaluacion;
    $instanciaControlador = new EstudianteController();
    $verificarIntento = $instanciaControlador->VefificarIntentosEvaluacion($idEvaluacion,$_SESSION['idEstudiante']);
    foreach ($verificarIntento as $intento){
        if($intento->intentos>0){
            $_SESSION['intentos']=$intento->intentos;
            $listaTUCE= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
            $DatosEvaluacion = $instanciaControlador->evaluacion_controller->get_DatosEvaluacion($idEvaluacion);
            $preguntasEvaluacion = $instanciaControlador->evaluacion_controller->get_PreguntasEvaluacionTipo1($idEvaluacion);
            $preguntasEvaluacionTipo2 = $instanciaControlador->evaluacion_controller->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
            $instanciaControlador->FrmDesarrollarEvaluacionView($listaTUCE,$DatosEvaluacion,$preguntasEvaluacion,$preguntasEvaluacionTipo2);
        }else{
            ?> <script>alert("INTENTOS COMPLETADOS")</script><?php
            $instanciaControlador->redirectBack();
        }
    }
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="cmd_enviarEmail"){
    $idEstudiante = @$_GET['idEstudiante'];
    //$_SESSION['idEvaluacion'] = $idEvaluacion;
    $instanciaControlador = new EstudianteController();
    $enviarEmail = $instanciaControlador->EnviarEmailApoderado($idEstudiante);
    ?> <script>alert("<?php echo $enviarEmail ?>")</script><?php
    $instanciaControlador->redirectBack();
}
if (isset($_GET['estudiante']) && $_GET['estudiante']=="cmd_desarrollarEvaluacion"){
    $instanciaControlador = new EstudianteController();
    $preguntasEvaluacion = $instanciaControlador->evaluacion_controller->get_PreguntasEvaluacionTipo1($_SESSION['idEvaluacion']);
    $preguntasEvaluacionTipo2 = $instanciaControlador->evaluacion_controller->get_PreguntasEvaluacionTipo2($_SESSION['idEvaluacion']);
    if (isset($_POST['idPreguntaRd'])){
        $idPreguntaRd = $_POST['idPreguntaRd'];
        $matrizRptaRadio=[];
        if (isset($_POST['arraySelectRadio'])){
            $cr=0; $i=0;
            $arraySelectRadioTmp = $_POST['arraySelectRadio'];
            foreach ($idPreguntaRd as $cRadio){
                $matrizRptaRadio[$i][0] = $cRadio;
                $matrizRptaRadio[$i][1] = 0;
                $matrizRptaRadio[$i][2] = 0;
                $matrizRptaRadio[$i][3] = 0;
                $i++;
            }
            $i=0;
            foreach ($idPreguntaRd as $cRadio){
                if(!isset($arraySelectRadioTmp[$cr])){
                    $arraySelectRadio[$cr]='';
                }else { $arraySelectRadio[$cr]=$arraySelectRadioTmp[$cr]; }
                foreach ($preguntasEvaluacion as $registro){

                        if ($arraySelectRadio[$cr] == $registro->idSubOpcMultiple) {
                            $matrizRptaRadio[$cr][0] = $registro->idPregunta;
                            $matrizRptaRadio[$cr][1] = $registro->pesoOpcion;
                            $matrizRptaRadio[$cr][2] = $registro->puntaje;
                            $matrizRptaRadio[$cr][3] = $registro->idSubOpcMultiple;
                            $i++;
                        }
                }
                $cr++;
            }
        }else if (!isset($_POST['arraySelectRadio'])){
            $cr=0; $i=0;
            foreach ($idPreguntaRd as $cRadio){
                $matrizRptaRadio[$i][0] = $cRadio;
                $matrizRptaRadio[$i][1] = 0;
                $matrizRptaRadio[$i][2] = 0;
                $matrizRptaRadio[$i][3] = 0;
                $i++;
           }
        }
    }
    $matrizRptaCheck=[];
    if (isset($_POST['idPreguntaCk'])){
        $matrizRptaCheck=[];
        $arraySelectCk=[];
        $idPreguntaCk = $_POST['idPreguntaCk'];
        if (isset($_POST['arraySelectCk'])){
            $ck=0; $i=0;
            $arraySelectCkTmp = $_POST['arraySelectCk'];
            $x=0; $y=0;
            for ($p = 0; $p < 2; $p++){  // for para dividir  el array select
                foreach ($idPreguntaCk as $cCheck) {  // for para crear la matriz con el id de todas las preguntas
                    $matrizRptaCheck[$i][0] = $cCheck;
                    $matrizRptaCheck[$i][1] = 0;
                    $matrizRptaCheck[$i][2] = 0;
                    $matrizRptaCheck[$i][3] = 0;
                    for ($z = 0; $z < 4; $z++) {
                        if (isset($arraySelectCkTmp[$i][$z])) {
                            $arraySelectCk[$y][0] = $cCheck;
                            $arraySelectCk[$y][1] = $arraySelectCkTmp[$i][$z];
                            $y++;
                        }
                    }
                    $i++;
                }
            }
            $y1=0;
            foreach ($matrizRptaCheck as $cMatriz) {
                $y2=0;
                foreach ($arraySelectCk as $cCheck) {
                    if ($matrizRptaCheck[$y1][0]==$arraySelectCk[$y2][0]) {
                        $matrizRptaCheck[$y1][3] = $arraySelectCk[$y2][1];
                        $arraySelectCk[$y2][0]=0;
                        foreach ($preguntasEvaluacion as $registro){
                            if ($matrizRptaCheck[$y1][3]==$registro->idSubOpcMultiple){
                                $matrizRptaCheck[$y1][1] = $registro->pesoOpcion;
                                $matrizRptaCheck[$y1][2] = $registro->puntaje;
                            }
                        }
                        break;
                    }
                    $y2++;
                }
                $y1++;
            }
            $i=0;
        }else if (!isset($_POST['arraySelectCk'])){
            $arraySelectCk=[];
            $arraySelectCkTmp=[];
            $i=0;
            for ($p = 0; $p < 2; $p++){
                foreach ($idPreguntaCk as $cCheck) {
                    $matrizRptaCheck[$i][0] = $cCheck;
                    $matrizRptaCheck[$i][1] = 0;
                    $matrizRptaCheck[$i][2] = 0;
                    $matrizRptaCheck[$i][3] = 0;
                    $i++;
                }
            }
        }
    }
    if (isset($_POST['idPreguntaVF'])){
        $idPreguntaVF = $_POST['idPreguntaVF'];
        $matrizRptaVF=[];
        if (isset($_POST['cbx_respuesta'])){
            $cbx_respuesta = $_POST['cbx_respuesta'];
            $cr=0; $i=0;
            foreach ($idPreguntaVF as $cidVF) {
                foreach ($preguntasEvaluacionTipo2 as $registro) {
                    if ($idPreguntaVF[$cr] == $registro->idPregunta && $cbx_respuesta[$cr]!=null) {
                        $matrizRptaVF[$i][0] = $registro->idPregunta;
                        if ($cbx_respuesta[$cr]==$registro->respuesta){ $matrizRptaVF[$i][1] = $registro->puntaje; }else {$matrizRptaVF[$i][1] = 0; }
                        $matrizRptaVF[$i][2] = $cbx_respuesta[$cr];
                        $i++;
                    }else if($idPreguntaVF[$cr] == $registro->idPregunta){
                        $matrizRptaVF[$i][0] = $registro->idPregunta;
                        $matrizRptaVF[$i][1] = 0;
                        $matrizRptaVF[$i][2] = 2;
                        $i++;
                    }
                }
                $cr++;
            }
        }
    }
    $intentoLast = $instanciaControlador->BuscarUltimoIntentoEvaluacion($_SESSION['idEvaluacion'],$_SESSION['idEstudiante']);
    $puntajeTotal = $instanciaControlador->RegistrarRespuestasEstudiante($matrizRptaRadio,$matrizRptaCheck,$matrizRptaVF,$_SESSION['intentos'],$_SESSION['idEvaluacion'],$_SESSION['idEstudiante'],$intentoLast);
    $listaTUCE= $instanciaControlador->tema_controller->SearchTopicByUnity($_SESSION['idUnidad']);
    // $preguntasIncorrectasT1 = $instanciaControlador->evaluacion_estudiante_model->StudendIncorrectAnswersT1($_SESSION['idEvaluacion'],$_SESSION['idEstudiante'],$intentoLast);
    // $preguntasIncorrectasT2 = $instanciaControlador->evaluacion_estudiante_model->StudendIncorrectAnswersT2($_SESSION['idEvaluacion'],$_SESSION['idEstudiante'],$intentoLast);
    // $enviarEmail = $instanciaControlador->evaluacion_estudiante_model->SendEmailTopicToReview($_SESSION['idEstudiante'],$preguntasIncorrectasT1, $preguntasIncorrectasT2);

    $instanciaControlador->FrmResultadoEvaluacionView($listaTUCE, $puntajeTotal);
    //$instanciaControlador->redirectBack();
}

if (isset($_GET['administrador']) && $_GET['administrador']=="listarEstudiantes"){
    $instanciaControlador = new EstudianteController();
    if(isset($_POST['txt_buscar'])){ $nomBuscar = $_POST['txt_buscar']; }else{ $nomBuscar=''; }
    if(isset($_POST['cbx_seccion'])){ $idSeccion = $_POST['cbx_seccion']; }else{ $idSeccion=''; }
    $listaEstudiantes=$instanciaControlador->get_listarEstudiantes($nomBuscar, $idSeccion);
    $listaSecciones = $instanciaControlador->seccion_model->ListSectionActual();
    $instanciaControlador->EstudiantesView($listaEstudiantes,$listaSecciones);
}
if (isset($_POST['administrador']) && $_POST['administrador']=="cmd_buscarNombre"){
    $instanciaControlador = new EstudianteController();
    if(isset($_POST['txt_buscar'])){ $nomBuscar = $_POST['txt_buscar']; }else{ $nomBuscar=''; }
    if(isset($_POST['cbx_seccion'])){ $idSeccion = $_POST['cbx_seccion']; }else{ $idSeccion=''; }
    $listaEstudiantes=$instanciaControlador->get_listarEstudiantes($nomBuscar, $idSeccion);
    $listaSecciones = $instanciaControlador->seccion_model->ListSectionActual();
    $instanciaControlador->EstudiantesView($listaEstudiantes, $listaSecciones);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="listarEstudiantesGeneral"){
    $instanciaControlador = new EstudianteController();
    if(isset($_POST['txt_buscar'])){ $nomBuscar = $_POST['txt_buscar']; }else{ $nomBuscar=''; }
    $listaEstudiantes=$instanciaControlador->get_listarEstudiantesGeneral($nomBuscar);
    $instanciaControlador->EstudiantesGeneralView($listaEstudiantes);
}
if (isset($_POST['administrador']) && $_POST['administrador']=="cmd_buscarNombreGeneral"){
    $instanciaControlador = new EstudianteController();
    if(isset($_POST['txt_buscar'])){ $nomBuscar = $_POST['txt_buscar']; }else{ $nomBuscar=''; }
    $listaEstudiantes=$instanciaControlador->get_listarEstudiantesGeneral($nomBuscar);
    //$verificarEstudianteMatricula = $instanciaControlador->VerificarEstudianteRegistradoEnSeccion($_GET['idEstudiante']);
    $instanciaControlador->EstudiantesGeneralView($listaEstudiantes);
}

if (isset($_GET['administrador']) && $_GET['administrador']=="editarEstudiante"){
    $instanciaControlador = new EstudianteController();
    if(isset($_POST['txt_buscar'])){ $nomBuscar = $_POST['txt_buscar']; }else{ $nomBuscar=''; }
    $listaEstudiantes=$instanciaControlador->get_listarEstudiantesGeneral($nomBuscar);
    $listaGenero = $instanciaControlador->genero_model->GeneroList();
    $verificarEstudianteMatricula = $instanciaControlador->VerificarEstudianteRegistradoEnSeccion($_GET['idEstudiante']);
    $instanciaControlador->EditarEstudianteView($listaEstudiantes,$_GET['idEstudiante'],$listaGenero,$verificarEstudianteMatricula);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_editarEstudiante"){
    $instanciaControlador = new EstudianteController();
    $nameFoto      = $_POST['nameImagen'];
    date_default_timezone_set('America/Lima');
    if (!empty(@$_FILES['foto']['name'])) {
        $nameFoto       = $_POST['nameFoto'];
        $nameDocumento = @$_FILES['foto']['name'];
        $carpetaDestino = @$_SERVER['DOCUMENT_ROOT'] . '/sysmae_v3.0/img/user/';
        $extension  = pathinfo($nameDocumento,PATHINFO_EXTENSION);
        $nameFoto = $nameFoto.".".$extension;
        move_uploaded_file(@$_FILES['foto']['tmp_name'], $carpetaDestino . $nameFoto);
    } else {  $nameDocumento = $nameFoto; }
    $instanciaControlador->ActualizarDatosEstudiante(
        $nameFoto,
        $_POST['txt_idEstudiante'],
        $_POST['txt_dni'],
        $_POST['txt_nombre'],
        $_POST['txt_apePat'],
        $_POST['txt_apeMat'],
        $_POST['txt_genero'],
        $_POST['txt_fecIng'],
        $_POST['txt_observacion'],
        $_POST['txt_fecNac']
    );
    $nomBuscar='';
    ?> <script> window.location.href="?administrador=listarEstudiantes"; </script> <?php
}

if (isset($_GET['administrador']) && $_GET['administrador']=="registrarEstudiante"){
    $instanciaControlador = new EstudianteController();
    $listaGenero = $instanciaControlador->genero_model->GeneroList();
    $instanciaControlador->RegistrarEstudianteView($listaGenero, $_GET['idApoderado']);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="frm_matricularEstudiante"){
    $instanciaControlador = new EstudianteController();
    $listaSecciones = $instanciaControlador->seccion_model->ListSectionActual();
    $instanciaControlador->MatricularEstudianteView($listaSecciones,$_GET['idEstudiante']);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_matricularEstudiante"){
    $instanciaControlador = new EstudianteController();
    $instanciaControlador->matricula_model->EnrollStudent($_POST['txt_secciones'],$_POST['txt_idEstudiante']);
    $instanciaControlador->redirectBack2();
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_retirarEstudiante"){
    $instanciaControlador = new EstudianteController();
    $instanciaControlador->matricula_model->UnEnrollStudent($_GET['idSeccion'],$_GET['idEstudiante']);
    //$instanciaControlador->redirectBack2();
    ?> <script> window.location.href="?administrador=listarEstudiantes"; </script> <?php
}

if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_registrarEstudiante"){
    $instanciaControlador = new EstudianteController();
    $nameFoto      = $_POST['nameImagen'];
    date_default_timezone_set('America/Lima');
    if (!empty(@$_FILES['foto']['name'])) {
        $nameFoto       = $_POST['nameFoto'];
        $nameDocumento = @$_FILES['foto']['name'];
        $carpetaDestino = @$_SERVER['DOCUMENT_ROOT'] . '/sysmae_v3.0/img/user/';
        $extension  = pathinfo($nameDocumento,PATHINFO_EXTENSION);
        $nameFoto = $nameFoto.".".$extension;
        move_uploaded_file(@$_FILES['foto']['tmp_name'], $carpetaDestino . $nameFoto);
    } else {  $nameDocumento = $nameFoto; }
    $instanciaControlador->RegistrarDatosEstudiante(
        $nameFoto,
        $_POST['txt_idApoderado'],
        $_POST['txt_dni'],
        $_POST['txt_nombre'],
        $_POST['txt_apePat'],
        $_POST['txt_apeMat'],
        $_POST['txt_genero'],
        $_POST['txt_fecIng'],
        $_POST['txt_observacion'],
        $_POST['txt_fecNac']
    );
    $instanciaControlador->redirectBack();
}

?>