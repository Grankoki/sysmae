<!DOCTYPE html>
<head>
	<meta charset="UTF-8">
	<link rel="stylesheet" href="css/estilo.css">
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
</head>
<div class="container-fluid">  
<?php
if (!isset($_SESSION['idRol']))
{
    $_SESSION['idRol']=0;
    header('Location: /sysmae_v3.0/?menu=btn_inicio'); 
    ?><script>window.location.href="?menu=btn_inicio";</script><?php 
}

if($_SESSION['idRol']==1){  // idRol = 1 es el menu del admin ?>
    <nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
        <div class="" style="width:80px">
            <img src="img/logo01.gif" height=50px style="border-radius:25px">
        </div>
        <div class="text-white p-2" style="background-color: #D1B80E">
            <?php echo $_SESSION['realNameUsuario']?>
        </div>
        <button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
            <div class="navbar-nav mr-auto">
                <div class="offset-md-1 mr-auto text-center"></div>
                <a class="nav-item nav-link text-justify active ml-3 hover-primary" href="?menu=btn_inicio">Inicio</a>
                <a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_nosotros">Nosotros</a>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Servicios
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?menu=btn_preguntas_frecuentes">Preguntas Frecuentes</a>
                        <a class="dropdown-item" href="#">Compras</a>
                        <a class="dropdown-item" href="servicios.html">Otros</a>
                    </div>
                </li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Registros
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="#">Registro de Cursos</a>
                        <a class="dropdown-item" href="?administrador=listarDocentes">Registro de Docentes</a>
                        <a class="dropdown-item" href="?administrador=listarEstudiantes">Registro de Estudiantes</a>
                        <a class="dropdown-item" href="?administrador=listarApoderados">Registro de Apoderados</a>
                    </div>
                </li>
                <a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_login">Login</a>
                <a class="nav-item nav-link text-justify ml-3 hover-primary" href="?login=btn_logOut&action=logOut">Salir</a>
            </div>
            <?php if($_SESSION['foto']!=null){ ?>
                <div class="" style="width:80px">
                    <img src="img/user/<?php echo $_SESSION['foto'] ?>" height=50px; style="border-radius:22px">
                </div>
            <?php }else{ ?>
                <div class="" style="width:80px">
                    <img src="img/user/login_user.jpg" height=50px style="border-radius:22px">
                </div>
            <?php } ?>
            <div class="text-center justify-content-center">
                <a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com/mariaauxilidoradelaesperanzaoficial">Facebook</a>
                <a class="btn btn-outline-danger" target="_blank" href="https://www.youtube.com/@mariaauxiliadoradelaespera5825">Youtube</a>
            </div>
        </div>
    </nav>
<?php }else if($_SESSION['idRol']==2){ // idRol = 2 es el menu del docente ?>
<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class="" style="width:80px">
			<img src="img/logo01.gif" height=50px style="border-radius:25px">
		</div>
		<div class="text-white p-2" style="background-color: #D1B80E">
			<?php echo $_SESSION['realNameUsuario']?>
		</div>
		<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
        	<span class="navbar-toggler-icon"></span>        					
        </button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
				<a class="nav-item nav-link text-justify active ml-3 hover-primary" href="?menu=btn_inicio">Inicio</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_nosotros">Nosotros</a>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Servicios
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?menu=btn_preguntas_frecuentes">Preguntas Frecuentes</a>
						<a class="dropdown-item" href="#">Compras</a>
						<a class="dropdown-item" href="#">Otros</a>
					</div>
				</li>
                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                        Docente
                    </a>
                    <div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
                        <a class="dropdown-item" href="?docente=lst_cursosDocente">Cursos</a>
                        <a class="dropdown-item" href="?registro=lst_cursosDocente">Registro de notas</a>
                        <a class="dropdown-item" href="#">Informes</a>
                        <a class="dropdown-item" href="?seguimiento=lst_cursosDocente">Seguimiento y Control</a>
                    </div>
                </li>
                <a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_login">Login</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?login=btn_logOut&action=logOut">Salir</a>
			</div>
            <?php if($_SESSION['foto']!=null){ ?>
                <div class="" style="width:80px">
                    <img src="img/user/<?php echo $_SESSION['foto'] ?>" height=50px; style="border-radius:22px">
                </div>
            <?php }else{ ?>
                <div class="" style="width:80px">
                    <img src="img/user/login_user.jpg" height=50px style="border-radius:22px">
                </div>
            <?php } ?>
			<div class="text-center justify-content-center">
				<a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com/mariaauxilidoradelaesperanzaoficial">Facebook</a>
				<a class="btn btn-outline-danger" target="_blank" href="https://www.youtube.com/@mariaauxiliadoradelaespera5825">Youtube</a>
			</div>
		</div>
</nav>
<?php }else if($_SESSION['idRol']==6) { // idRol = 6 es el menu del estudiante ?>
<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class="" style="width:80px">
            <img src="img/logo01.gif" height=50px style="border-radius:25px">
		</div>
		<div class="text-white p-2" style="background-color: #D1B80E">
			<?php echo $_SESSION['realNameUsuario']?>
		</div>
		<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
        	<span class="navbar-toggler-icon"></span>        					
        </button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
				<a class="nav-item nav-link text-justify active ml-3 hover-primary" href="?menu=btn_inicio">Inicio</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_nosotros">Nosotros</a>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Servicios
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?menu=btn_preguntas_frecuentes">Preguntas Frecuentes</a>
						<a class="dropdown-item" href="#">Compras</a>
						<a class="dropdown-item" href="#">Otros</a>
					</div>
				</li>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?estudiante=lst_cursosEstudiante">Estudiante</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_login">Login</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?login=btn_logOut&action=logOut">Salir</a>
			</div>

            <?php if($_SESSION['foto']!=null){ ?>
                <div class="" style="width:80px">
                    <img src="img/user/<?php echo $_SESSION['foto'] ?>" height=50px; style="border-radius:22px">
                </div>
            <?php }else{ ?>
                <div class="" style="width:80px">
                    <img src="img/user/login_user.jpg" height=50px style="border-radius:22px">
                </div>
            <?php } ?>

			<div class="text-center justify-content-center">
				<a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com/mariaauxilidoradelaesperanzaoficial">Facebook</a>
				<a class="btn btn-outline-danger" target="_blank" href="https://www.youtube.com/@mariaauxiliadoradelaespera5825">Youtube</a>
			</div>
		</div>

</nav>
<?php }else if($_SESSION['idRol']==0) { // idRol = 0 es el menu sin logeo
    ?>
<nav class="navbar navbar-dark bg-dark  navbar-expand-md navbar-light bg-light fixed-top">
		<div class="" style="width:80px">
            <img src="img/logo01.gif" height=50px style="border-radius:25px">
		</div>
		<div class="text-white p-2" style="background-color: #D1B80E">
			Nombre de usuario
		</div>
		<button type="button" class="navbar-toggler" data-bs-toggle="collapse" data-bs-target="#MenuNavegacion">
        	<span class="navbar-toggler-icon"></span>        					
        </button>
		<div class="collapse navbar-collapse" id="navbarTogglerDemo01">
			<div class="navbar-nav mr-auto">
				<div class="offset-md-1 mr-auto text-center"></div>
				<a class="nav-item nav-link text-justify active ml-3 hover-primary" href="?menu=btn_inicio">Inicio</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_nosotros">Nosotros</a>
				<li class="nav-item dropdown">
					<a class="nav-link dropdown-toggle text-justify ml-3" href="" id="navbarDropdownMenuLink" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
						Servicios
					</a>
					<div class="dropdown-menu" aria-labelledby="navbarDropdownMenuLink">
						<a class="dropdown-item" href="?menu=btn_preguntas_frecuentes">Preguntas Frecuentes</a>
						<a class="dropdown-item" href="#">Compras</a>
						<a class="dropdown-item" href="servicios.html">Otros</a>
					</div>
				</li>				
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="?menu=btn_login">Login</a>
				<a class="nav-item nav-link text-justify ml-3 hover-primary" href="#">Salir</a>
			</div>
            <div class="" style="width:80px">
                <img src="img/user/login_user.jpg" height=50px style="border-radius:22px">
            </div>
			<div class="text-center justify-content-center">
				<a class="btn btn-outline-primary" target="_blank" href="https://www.facebook.com/mariaauxilidoradelaesperanzaoficial">Facebook</a>
				<a class="btn btn-outline-danger" target="_blank" href="https://www.youtube.com/@mariaauxiliadoradelaespera5825">Youtube</a>
			</div>
		</div>
</nav>	
<?php }?>
</div>