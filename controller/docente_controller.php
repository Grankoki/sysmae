<?php
// -------------------------------------
// docente_controller.php
// -------------------------------------
//require_once 'view/docente/lst_cursos_docente.php';
require_once("model/docente_model.php");
require_once 'unidad_controller.php';
require_once 'tema_controller.php';
require_once 'model/distrito_model.php';
require_once 'model/genero_model.php';
require_once 'model/especialidad_model.php';

if (empty($_SESSION['nomUsuario'])){
    echo "NO SE HA LOGEADO";
    $this->redirect();
}
class DocenteController extends docente_model{
    public $unidad_controller;
    public $tema_controller;
    public $especialidad_model;
    public $genero_model;
    public $distrito_model;
    public function __construct()
    {
        $this->unidad_controller = new UnidadController();
        $this->tema_controller = new TemaController();
        $this->especialidad_model = new especialidad_model();
        $this->genero_model = new genero_model();
        $this->distrito_model = new distrito_model();
    }
    public function RedirectContenido(){
        require 'view/docente/lst_contenido_tema.php';
    }
    public function redirectBack(){
        ?>
        <script>window.history.go(-2)</script>
        <?php
    }
    public function get_cursoDocente($idDocente) {
        $matrizCursoDocente = $this->SearchCursosDocente($idDocente);
        return $matrizCursoDocente;
    }
    public function get_listarDocentes() {
        $matriz = $this->SearchTeacherList();
        return $matriz;
    }

    public function get_tareaTUCD($idTema) {
        $matrizTareaTUCD = $this->SearchTareaTUCD($idTema);
        return $matrizTareaTUCD;
    }
    public function get_evaluacionTUCD($idTema) {
        $matrizEvaluacionTUCD = $this->SearchEvaluacionTUCD($idTema);
        return $matrizEvaluacionTUCD;
    }
    public function RegistrarDatosDocente(
        $nombre,
        $apePat,
        $apeMat,
        $direccion,
        $email,
        $dni,
        $telfMovil,
        $telfFijo,
        $observacion,
        $fecNac,
        $fecIng,
        $especialidad,
        $distrito,
        $genero,
        $nameFoto
    ) {
        $this->nombre = $nombre;
        $this->apePat = $apePat;
        $this->apeMat = $apeMat;
        $this->direccion = $direccion;
        $this->email = $email;
        $this->dni = $dni;
        $this->telfMovil = $telfMovil;
        $this->telfFijo = $telfFijo;
        $this->observacion = $observacion;
        $this->fecNac = $fecNac;
        $this->fecIng = $fecIng;
        $this->idEspecialidad = $especialidad;
        $this->idDistrito = $distrito;
        $this->idGenero = $genero;
        $this->fotoDocente = $nameFoto;
        $this->InsertTeacher();
    }
    public function ActualizarDatosDocente(
        $nombre,
        $apePat,
        $apeMat,
        $direccion,
        $email,
        $dni,
        $telfMovil,
        $telfFijo,
        $observacion,
        $fecNac,
        $fecIng,
        $especialidad,
        $distrito,
        $genero,
        $nameFoto,
        $idDocente
    ) {
        $this->UpdateTeacher(
            $nombre,
            $apePat,
            $apeMat,
            $direccion,
            $email,
            $dni,
            $telfMovil,
            $telfFijo,
            $observacion,
            $fecNac,
            $fecIng,
            $especialidad,
            $distrito,
            $genero,
            $nameFoto,
            $idDocente
        );
    }
    public function CursosView($listaCursoDocente){        
        require 'view/docente/lst_cursos_docente.php';
    }
    public function UnidadesView($listaUCD){
        require 'view/docente/lst_unidades_curso.php';
    }    
    public function TemasUCDView($listaTUCD){
        require 'view/docente/lst_tema_unidad_curso.php';
    }
    public function ContenidoTUCDView($listaTareaTUCD, $listaEvaluacionTUCD, $listaTUCD){
        require 'view/docente/lst_contenido_tema.php';
    }
    public function DocentesView($listaDocentes){
        require 'view/docente/lst_docentes.php';
    }
    public function FrmRegistrarTareaView($listaTUCD){
        require 'view/tarea/frm_registrarTarea.php';
    }
    public function RegistrarDocenteView($listaDistrito,$listaGenero,$listaEspecialidad){
        require 'view/docente/frm_registrarDocente.php';
    }
    public function EditarDocenteView($listaDocentes, $idDocente,$listaDistrito,$listaGenero,$listaEspecialidad){
        require 'view/docente/frm_editarDocente.php';
    }
}

if (isset($_GET['docente']) && $_GET['docente']=="lst_cursosDocente"){    
    $instanciaControlador = new DocenteController();
    $listaCursoDocente = $instanciaControlador->get_cursoDocente($_SESSION['idDocente']); 
    $instanciaControlador->CursosView($listaCursoDocente);
}
if (isset($_GET['docente']) && $_GET['docente']=="lst_unidadesCursoDocente"){
    $idCurso    = base64_decode(@$_GET['idCurso']);
    $idSeccion  = base64_decode(@$_GET['idSeccion']);
    $_SESSION['idCurso']=$idCurso;
    $_SESSION['idSeccion']=$idSeccion;
    $_SESSION['detalleSeccion'] = @$_GET['detalleSeccion'];
    $_SESSION['detalleCurso']=@$_GET['detalleCurso'];
    $instanciaControlador = new DocenteController();
    //$listaUCD= $instanciaControlador->get_unidadCursoDocente($idCurso,$idSeccion);
    $listaUCD=$instanciaControlador->unidad_controller->get_ListarUnidadesCurso($idCurso,$idSeccion);
    $instanciaControlador->UnidadesView($listaUCD);
}
if (isset($_GET['docente']) && $_GET['docente']=="lst_temasUCD"){
    $idUnidad   = base64_decode(@$_GET['idUnidad']);
    $_SESSION['idUnidad'] = $idUnidad;
    $_SESSION['detalleUnidad']= @$_GET['detalleUnidad'];
    $instanciaControlador = new DocenteController();
    $listaTUCD= $instanciaControlador->tema_controller->get_SearchTopicByUnity($idUnidad);
    $instanciaControlador->TemasUCDView($listaTUCD);
}
if (isset($_GET['docente']) && $_GET['docente']=="lst_contenidoTUCD"){
    $idTema = base64_decode(@$_GET['idTema']);
    $_SESSION['detalleTema']= @$_GET['detalleTema']; 
    $_SESSION['idTema'] = $idTema;
    $instanciaControlador = new DocenteController();
    $listaTUCD= $instanciaControlador->tema_controller->get_SearchTopicByUnity($_SESSION['idUnidad']);
    //$instanciaControlador->ContenidoTareaTUCDView($listaTUCD);
    $listaEvaluacionTUCD= $instanciaControlador->get_evaluacionTUCD($idTema);
    $listaTareaTUCD= $instanciaControlador->get_tareaTUCD($idTema);
    $instanciaControlador->ContenidoTUCDView($listaTareaTUCD,$listaEvaluacionTUCD,$listaTUCD);        
    //$instanciaControlador->ContenidoEvaluacionTUCDView($listaEvaluacionTUCD);
}
if (isset($_GET['tarea']) && $_GET['tarea']=="frm_registrarTarea"){    
    $instanciaControlador = new DocenteController();
    $listaTUCD= $instanciaControlador->tema_controller->get_SearchTopicByUnity($_SESSION['idUnidad']);
    $instanciaControlador->FrmRegistrarTareaView($listaTUCD);   
}
if (isset($_GET['button']) && $_GET['button']=="button_backCurse"){
    $instanciaControlador = new DocenteController();
    $listaUCD=$instanciaControlador->unidad_controller->get_ListarUnidadesCurso($_SESSION['idCurso'],$_SESSION['idSeccion']);
    $instanciaControlador->UnidadesView($listaUCD);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="listarDocentes"){
    $instanciaControlador = new DocenteController();
    $listaDocentes=$instanciaControlador->get_ListarDocentes();
    $instanciaControlador->DocentesView($listaDocentes);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="registrarDocente"){
    $instanciaControlador = new DocenteController();
    $listaDistrito = $instanciaControlador->distrito_model->DistritoList();
    $listaGenero = $instanciaControlador->genero_model->GeneroList();
    $listaEspecialidad = $instanciaControlador->especialidad_model->EspecialidadList();
    $instanciaControlador->RegistrarDocenteView($listaDistrito,$listaGenero,$listaEspecialidad);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_registrarDocente"){
    $instanciaControlador = new DocenteController();
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
    $instanciaControlador->RegistrarDatosDocente(
        $_POST['txt_nombre'],
        $_POST['txt_apePat'],
        $_POST['txt_apeMat'],
        $_POST['txt_direccion'],
        $_POST['txt_email'],
        $_POST['txt_dni'],
        $_POST['txt_telfMovil'],
        $_POST['txt_telfFijo'],
        $_POST['txt_observacion'],
        $_POST['txt_fecNac'],
        $_POST['txt_fecIng'],
        $_POST['txt_especialidad'],
        $_POST['txt_distrito'],
        $_POST['txt_genero'],
        $nameFoto
    );
    $instanciaControlador->redirectBack();
}
if (isset($_GET['administrador']) && $_GET['administrador']=="editarDocente"){
    $instanciaControlador = new DocenteController();
    $listaDocentes=$instanciaControlador->get_ListarDocentes();
    $listaDistrito = $instanciaControlador->distrito_model->DistritoList();
    $listaGenero = $instanciaControlador->genero_model->GeneroList();
    $listaEspecialidad = $instanciaControlador->especialidad_model->EspecialidadList();
    $instanciaControlador->EditarDocenteView($listaDocentes,$_GET['idDocente'],$listaDistrito,$listaGenero,$listaEspecialidad);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_editarDocente"){
    $instanciaControlador = new DocenteController();
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
    $instanciaControlador->ActualizarDatosDocente(
        $_POST['txt_nombre'],
        $_POST['txt_apePat'],
        $_POST['txt_apeMat'],
        $_POST['txt_direccion'],
        $_POST['txt_email'],
        $_POST['txt_dni'],
        $_POST['txt_telfMovil'],
        $_POST['txt_telfFijo'],
        $_POST['txt_observacion'],
        $_POST['txt_fecNac'],
        $_POST['txt_fecIng'],
        $_POST['txt_especialidad'],
        $_POST['txt_distrito'],
        $_POST['txt_genero'],
        $nameFoto,
        $_POST['txt_idDocente']
    );
    $instanciaControlador->redirectBack();
}
?>