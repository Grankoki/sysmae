<?php
// -------------------------------------
// apoderado_controller.php
// -------------------------------------
require_once("model/apoderado_model.php");
require_once("model/estudiante_model.php");
require_once 'model/distrito_model.php';
require_once 'model/genero_model.php';

class ApoderadoController extends apoderado_model
{
    public $genero_model;
    public $distrito_model;
    public $estudiante_model;
    public function __construct()
    {
        $this->genero_model = new genero_model();
        $this->distrito_model = new distrito_model();
        $this->estudiante_model = new estudiante_model();
    }
    public function get_listarApoderados() {
        $matriz = $this->SearchFatherList();
        return $matriz;
    }
    public function redirectBack(){
        ?>
        <script>window.history.go(-2)</script>
        <?php
    }
    public function ApoderadosView($listaApoderados){
        require 'view/apoderado/lst_apoderados.php';
    }
    public function EditarApoderadoView($listaApoderados, $idApoderado,$listaDistrito,$listaGenero,$estudiantesDelApoderado){
        require 'view/apoderado/frm_editarApoderado.php';
    }
    public function RegistrarApoderadoView($listaDistrito, $listaGenero){
        require 'view/apoderado/frm_registrarApoderado.php';
    }
    public function RegistrarDatosApoderado(
        $observacion,
        $dni,
        $nombre,
        $apePat,
        $apeMat,
        $fecNac,
        $fecIng,
        $direccion,
        $telfMovil,
        $telfFijo,
        $email,
        $idDistrito,
        $idGenero
    ) {
        $this->observacion = $observacion;
        $this->dni = $dni;
        $this->nombre = $nombre;
        $this->apePat = $apePat;
        $this->apeMat = $apeMat;
        $this->fecNac = $fecNac;
        $this->fecIngreso = $fecIng;
        $this->direccion = $direccion;
        $this->telfMovil = $telfMovil;
        $this->telfFijo = $telfFijo;
        $this->email = $email;
        $this->idDistrito = $idDistrito;
        $this->idGenero = $idGenero;
        $this->InsertFather();
    }
    public function ActualizarDatosApoderado(
        $observacion,
        $idApoderado,
        $dni,
        $nombre,
        $apePat,
        $apeMat,
        $fecNac,
        $fecIng,
        $direccion,
        $telfMovil,
        $telfFijo,
        $email,
        $idDistrito,
        $idGenero
    ) {
        $this->UpdateFather(
            $observacion,
            $idApoderado,
            $dni,
            $nombre,
            $apePat,
            $apeMat,
            $fecNac,
            $fecIng,
            $direccion,
            $telfMovil,
            $telfFijo,
            $email,
            $idDistrito,
            $idGenero
        );
    }
}

if (isset($_GET['administrador']) && $_GET['administrador']=="listarApoderados"){
    $instanciaControlador = new ApoderadoController();
    $listaApoderados=$instanciaControlador->get_listarApoderados();
    $instanciaControlador->ApoderadosView($listaApoderados);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="editarApoderado"){
    $instanciaControlador = new ApoderadoController();
    $listaApoderados=$instanciaControlador->get_listarApoderados();
    $listaDistrito = $instanciaControlador->distrito_model->DistritoList();
    $listaGenero = $instanciaControlador->genero_model->GeneroList();
    $estudiantesDelApoderado = $instanciaControlador->estudiante_model->SearchStudentsByIdFather($_GET['idApoderado']);
    $instanciaControlador->EditarApoderadoView($listaApoderados,$_GET['idApoderado'],$listaDistrito,$listaGenero,$estudiantesDelApoderado);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_editarApoderado"){
    $instanciaControlador = new ApoderadoController();
    date_default_timezone_set('America/Lima');
    $instanciaControlador->ActualizarDatosApoderado(
        $_POST['txt_observacion'],
        $_POST['txt_idApoderado'],
        $_POST['txt_dni'],
        $_POST['txt_nombre'],
        $_POST['txt_apePat'],
        $_POST['txt_apeMat'],
        $_POST['txt_fecNac'],
        $_POST['txt_fecIng'],
        $_POST['txt_direccion'],
        $_POST['txt_telfMovil'],
        $_POST['txt_telfFijo'],
        $_POST['txt_email'],
        $_POST['txt_distrito'],
        $_POST['txt_genero']
    );
    $instanciaControlador->redirectBack();
}
if (isset($_GET['administrador']) && $_GET['administrador']=="registrarApoderado"){
    $instanciaControlador = new ApoderadoController();
    $listaDistrito = $instanciaControlador->distrito_model->DistritoList();
    $listaGenero = $instanciaControlador->genero_model->GeneroList();
    $instanciaControlador->RegistrarApoderadoView($listaDistrito,$listaGenero);
}
if (isset($_GET['administrador']) && $_GET['administrador']=="cmd_registrarApoderado"){
    $instanciaControlador = new ApoderadoController();
    date_default_timezone_set('America/Lima');
    $instanciaControlador->RegistrarDatosApoderado(
        $_POST['txt_observacion'],
        $_POST['txt_dni'],
        $_POST['txt_nombre'],
        $_POST['txt_apePat'],
        $_POST['txt_apeMat'],
        $_POST['txt_fecNac'],
        $_POST['txt_fecIng'],
        $_POST['txt_direccion'],
        $_POST['txt_telfMovil'],
        $_POST['txt_telfFijo'],
        $_POST['txt_email'],
        $_POST['txt_distrito'],
        $_POST['txt_genero']
    );
    $instanciaControlador->redirectBack();
}