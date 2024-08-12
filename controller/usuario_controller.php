<?php 
require_once 'model/usuario_model.php';
require_once 'controller/starterController.php';
$is = new StarterController();
if (empty($_SESSION['nomUsuario'])){
    echo "NO SE HA LOGEADO";
    $is->redirect();
}
$usuario=new usuario_model();
$matrizUsuario= $usuario->get_usuario();

// require_once 'view/login/lst_usuarios.php';


?>