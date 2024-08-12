<?php
require_once 'controller/starterController.php';
//require_once 'view/login/lst_usuarios.php';
require_once("model/usuario_model.php");
$is = new StarterController();

if (empty($_SESSION['nomUsuario'])){
    echo "NO SE HA LOGEADO";
   $is->redirect();
}

class UsuarioController extends usuario_model{
    
    public function redirectprincipal() {
        //header("location: http://localhost/sysmae_v3.0/?menu=btn_inicio");
        ?><script>window.location.href="?menu=btn_inicio";</script><?php

    }
    
    public function redirectLogin() {
        header("location: http://localhost/sysmae_v3.0/?menu=btn_login");
    }
    
    public function LoginView(){
        require 'view/login/login.php';
    }
    
    public function CloseSession() {
        session_destroy();
        unset($_SESSION);
        $this->redirectprincipal();
    }
    
    public function get_IdDocente($idUsuario) {
        $this->idUsuario=$idUsuario;
        $infoDocente = $this->SearchDocenteByIdUsuario();
        foreach ($infoDocente as $docente){}
        $_SESSION['idDocente']=$docente['idDocente'];
        $_SESSION['realNameUsuario']=$docente['nomRealUsuario']." ".$docente['apeUsuario'];
        $_SESSION['foto'] = $docente['foto'];
    }
    
    public function get_IdEstudiante($idUsuario) {
        $this->idUsuario=$idUsuario;
        $infoEstudiante = $this->SearchEstudianteByIdUsuario();
        foreach ($infoEstudiante as $estudiante){}
        $_SESSION['idEstudiante']=$estudiante['idEstudiante'];
        $_SESSION['realNameUsuario']=$estudiante['nomRealUsuario']." ".$estudiante['apeUsuario'];
        $_SESSION['foto'] = $estudiante['foto'];
    }
    public function get_IdAdministrador($idUsuario) {
        $this->idUsuario=$idUsuario;
        $infoAdministrador = $this->SearchAdministradorByIdUsuario();
        foreach ($infoAdministrador as $administrador){}
        $_SESSION['idAdministrativo']=$administrador['idAdministrativo'];
        $_SESSION['realNameUsuario']=$administrador['nomRealUsuario']." ".$administrador['apeUsuario'];
        $_SESSION['foto'] = $administrador['foto'];
    }
    public function VerifyLogin($usuarioName,$password) {
        $this->usuarioName = $usuarioName;
        $this->password = $password;
        $infousuario = $this->SearchUsuarioByName();
        foreach ($infousuario as $usuario){
        }
        $usuario = $infousuario[0];
        $passBD = $usuario['password'];
        $pass = sha1($password);
        if($pass==$passBD){
            $_SESSION['nomUsuario']=$usuario['nomUsuario'];
            $_SESSION['idRol']=$usuario['idRol'];
            $_SESSION['idUsuario']=$usuario['idUsuario'];

            if($_SESSION['idRol']==1){
                $this->get_IdAdministrador($_SESSION['idUsuario']);
            }else if($_SESSION['idRol']==2){
                $this->get_IdDocente($_SESSION['idUsuario']);
            }else if($_SESSION['idRol']==6){
                $this->get_IdEstudiante($_SESSION['idUsuario']);
            }
            $this->redirectprincipal();            
        }else{            
             $this->redirectLogin();
            // falta corregir el ingreso erroneo al sistema
            echo "Error, la contraseña es incorrecta";
        }

    }  
}

if (isset($_POST['action']) && $_POST['action']=="login"){
   $instanciaControlador = new UsuarioController();
   $instanciaControlador->VerifyLogin($_POST['usuarioName'],$_POST['password']);  
}

 if (isset($_GET['action']) && $_GET['action']=="login"){
    $instanciaControlador = new UsuarioController();
    $instanciaControlador->LoginView();
 }
 
 if (isset($_GET['action']) && $_GET['action']=="logOut"){
     $instanciaControlador = new UsuarioController();
     $instanciaControlador->CloseSession();
 }
?>