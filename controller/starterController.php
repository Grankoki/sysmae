<?php
class StarterController{
    public function __construct() {
        session_start();
    }
    public function redirect() {
        //var_dump('hola mundo');exit;
        //header("localhost/sysmae_v3.0/?menu=btn_inicio");
        ?><script>window.location.href="?menu=btn_inicio";</script><?php
    }
}
?>