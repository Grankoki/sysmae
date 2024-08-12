<div class="container">
<br><br><br>
<div class="row form-group">
    <div class="col-4">
    	Usuario
    </div>
    <div class="col-2">
    	idRol
    </div>
</div>
<?php
// require_once './controller/usuario_controller.php';
require_once 'controller/login_controller.php';
if ($matrizUsuario!=NULL  && isset($matrizUsuario)){
foreach ($matrizUsuario as $registro){
    ?>
    <div class="row form-group">
    <div class="col-4">
    	<?php  echo $registro["nomUsuario"] ?>
    </div>
    <div class="col-2">
    	<?php  echo $registro["idRol"] ?>
    </div>
	</div>
    <?php    
}
}else{
    echo "no ha ingresado a la sesion";
    
}
?>
</div>
