<?php
// -------------------------------------
// pregunta_controller.php
// -------------------------------------
require_once("model/pregunta_model.php");
require_once("docente_controller.php");
require_once ("tema_controller.php");
require_once ("opcion_multiple_controller.php");
require_once ("sub_opcion_multiple_controller.php");
require_once ("opcion_vf_controller.php");
class PreguntaController extends pregunta_model
{
    public $docente_model;
    public $tema_model;
    public $tema_controller;
    public $opcion_multiple_model;
    public $sub_opcion_multiple_model;
    public $opcion_vf_model;
    public function __construct()
    {
        $this->docente_model = new docente_model();
        $this->tema_model = new tema_model();
        $this->opcion_multiple_model = new opcion_multiple_model();
        $this->sub_opcion_multiple_model = new sub_opcion_multiple_model();
        $this->opcion_vf_model = new opcion_vf_model();
        $this->tema_controller = new TemaController();
    }
    public function redirectRegistrarPregunta(){
        ?> <script>window.location.href="?pregunta=frm_registrarPregunta";</script> <?php
    }
    public function get_temasUCD($idUnidad) {
        $matrizTUCD = $this->docente_model->SearchTemasUCD($idUnidad);
        return $matrizTUCD;
    }

    public function FrmRegistrarPreguntaView($listaTUCD,$listaTipoPrg,$listaTemaCurso){
        require 'view/pregunta/frm_registrarPregunta.php';
    }
    public function get_ListaTipoPregunta() {
        $matrizTUCD = $this->ListTipoPregunta();
        return $matrizTUCD;
    }
    public function SavePreguntaForModel($selecTema, $nomPregunta, $estado, $enunciado, $tipoPregunta, $nameImagen)
    {
        $this->selecTema = $selecTema;
        $this->nomPregunta = $nomPregunta;
        $this->estado = $estado;
        $this->enunciado = $enunciado;
        $this->tipoPregunta  = $tipoPregunta;
        $this->imgPregunta = $nameImagen;
        $this->InsertPregunta();
        return $this->getIdPregunta();
    }
    public function asignarPreguntaOpcionMultiple($idPregunta, $cantOpciones)
    {
        $this->opcion_multiple_model->InsertOpcionMultiple($idPregunta, $cantOpciones);
        return $this->opcion_multiple_model->getIdOpcionMultiple();
    }
    public function asignarPreguntaVF($idPregunta, $respuesta, $estado, $retroV, $retroF)
    {
        $this->opcion_vf_model->InsertOpcionVF($idPregunta, $respuesta, $estado, $retroV, $retroF);
    }
    public function insertarSubOpcionMultiple($idOpcionMultiple, $eleccion, $pesoOpcion, $retroalimentacion)
    {
        $this->sub_opcion_multiple_model->InsertSubOpcionMultiple($idOpcionMultiple, $eleccion, $pesoOpcion, $retroalimentacion);
    }
}
if (isset($_GET['pregunta']) && $_GET['pregunta'] == "frm_registrarPregunta") {
    $idSeccion=$_SESSION['idSeccion'];
    $idCurso=$_SESSION['idCurso'];
    $instanciaControlador = new PreguntaController();
    $listaTUCD= $instanciaControlador->get_temasUCD($_SESSION['idUnidad']);
    $listaTipoPrg = $instanciaControlador->get_ListaTipoPregunta();
    $listaTemaCurso = $instanciaControlador->tema_controller->get_ListTopicByCourse($idSeccion,$idCurso);
    $instanciaControlador->FrmRegistrarPreguntaView($listaTUCD,$listaTipoPrg,$listaTemaCurso);
}
if (isset($_POST['action']) && $_POST['action'] == "registrar") {
    if(!empty(@$_FILES['imgPregunta']['name'])){
        $nameImagen = @$_FILES['imgPregunta']['name'];
        $carpetaDestino=@$_SERVER['DOCUMENT_ROOT'] . '/sysmae_v3.0/img/uploads/';
        move_uploaded_file(@$_FILES['imgPregunta']['tmp_name'], $carpetaDestino.$nameImagen);
    }else{
        $nameImagen=null;
    }
    if (@$_POST['txt_cbx_tipo_pregunta']==1){
        $estado=1;
        $instanciaControlador = new PreguntaController();
        $idPregunta = $instanciaControlador->SavePreguntaForModel(
            $_POST['cbx_selec_tema'],
            $_POST['txt_nomPregunta'],
            $estado,
            $_POST['txt_desPregunta'],
            $_POST['txt_cbx_tipo_pregunta'],
            $nameImagen
        );
        $idOpcionMultiple = $instanciaControlador->asignarPreguntaOpcionMultiple($idPregunta, $_POST['cbx_cantidad_respuestas']);
        $instanciaControlador->insertarSubOpcionMultiple($idOpcionMultiple, $_POST['txt_eleccion'], $_POST['cbx_calificacion_opcion'], $_POST['txt_retroalimentacion'] );
        $instanciaControlador->redirectRegistrarPregunta();
    }else if (@$_POST['txt_cbx_tipo_pregunta']==2){
        $estado=1;
        $instanciaControlador = new PreguntaController();
        $idPregunta = $instanciaControlador->SavePreguntaForModel(
            $_POST['cbx_selec_tema'],
            $_POST['txt_nomPregunta'],
            $estado,
            $_POST['txt_desPregunta'],
            $_POST['txt_cbx_tipo_pregunta'],
            $nameImagen
        );
        $instanciaControlador->asignarPreguntaVF($idPregunta,
                $_POST['cbx_alternativa'], $estado, $_POST['txt_desVerdadero'], $_POST['txt_desFalso']);
        $instanciaControlador->redirectRegistrarPregunta();
    }
}
?>