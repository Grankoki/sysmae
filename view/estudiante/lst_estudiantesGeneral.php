<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
// ADMINISTRADOR
// lst_EstudiantesGeneral.php
// ----------------------------------

?>

<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 10px">
                <div class="col center">
                    <h5 style="color:white">LISTA GENERAL DE ESTUDIANTES</h5>
                </div>
            </div>
            <form action="#frmListaEstudiantes" method="post">
                <div class="row form-group">
                    <div class="col-12" style="padding: 10px;">
                        <div class="row form-group">
                            <div class="col">
                                <label style="color:white">Buscar por nombre</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col">
                                <input class="form-control" id="txt_buscar" name="txt_buscar" autofocus>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col" id="list">
                                <button type="submit" class="btn btn-primary btn-sm" href="?administrador=cmd_buscarNombre" style="color:white">Buscar</button>
                            </div>
                        </div>
                    </div>

                </div>
            </form>
            <div class="row form-group">
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(-1)" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>

        </div> <!-- Fin class=col-2 -->

        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 40px">
            <form method="post" id="frmListaEstudiantes" >
                <div class="row form-group">

                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col center">
                                <h4>REGISTRO GENERAL DE ESTUDIANTES</h4>
                            </div>
                        </div>
                        <div class="row form-group" style="background-color: #8BB7BF;">
                            <div class="col-1 center border">
                                Nro
                            </div>
                            <div class="col-4 center border">
                                Nombre y Apellidos
                            </div>
                            <div class="col-2 center border">
                                Usuario
                            </div>
                            <div class="col-1 center border">
                                DNI
                            </div>
                            <div class="col-3 center border">
                                Apoderado
                            </div>
                            <div class="col-1 center border">

                            </div>
                        </div>
                        <?php $i=0;
                        if($listaEstudiantes!=null){
                            foreach ($listaEstudiantes as $registro){ $i++;?>
                                <div class="row form-group">
                                    <div class="col-1 center ">
                                        <?php echo $i; ?>
                                    </div>
                                    <div class="col-4 ">
                                        <?php echo $registro->apePat.' '.$registro->apeMat.' '.$registro->nombre  ?>
                                    </div>
                                    <div class="col-2 center ">
                                        <?php echo $registro->nomUsuario ?>
                                    </div>
                                    <div class="col-1 center ">
                                        <?php echo $registro->dniEstudiante ?>
                                    </div>
                                    <div class="col-3 ">
                                        <?php echo $registro->apoderado ?>
                                    </div>
                                    <div class="col-1 center ">
                                        <div class="row form-group">
                                            <div class="col-sm-1 center"><a href="?administrador=editarEstudiante&idEstudiante=<?php echo $registro->idEstudiante ?>"><img height="20px" src="./img/modificar.png"></a></div>
                                            <div class="col-sm-1 center"><a href="#"><img height="20px" src="./img/delete.jpg"></a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else{
                            echo "<br><br><br>";
                            echo "NO existen datos registrados";
                        }?>

                    </div> <!-- Fin class=container -->

                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 200px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?administrador=listarApoderados" style="color:white">Listar Apoderados</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center" style="background-color: #C0D9FF; padding-top: 100px">

                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Lista General</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Alumnos sin matricula</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registro de Unidades</a>
                </div>
            </div>

        </div> <!-- Fin class=col-1 -->
    </div> <!-- Fin class=Row               #1F618D            -->
</div> <!-- Fin class=container Fluid       #C0D9FF"  -->

