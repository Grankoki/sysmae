<?php
// ----------------------------------
// DOCENTE
// lst_evaluacionEstudianteTema.php
// ----------------------------------
?>
<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 10px">
                <div class="col center">
                    <h5 style="color:white"><?php echo $_SESSION['detalleUnidad']?></h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12" style="padding: 10px">
                    <?php foreach ($temasUnd as $registro){ ?>
                        <div class="row form-group">
                            <div class="col center">
                                <a class="nav-link nav-white " href="?docente=lst_contenidoTUCD&idTema=<?php echo base64_encode($registro->idTema)?>
                							&detalleTema=<?php echo $registro->descripcion?>">
                                    <?php echo $registro->descripcion?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
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
            <form method="post">
                <div class="row form-group">
                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col">
                                <h5><b>Tema: <?php echo $_SESSION['detalleTema']?></b></h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-1">   </div>
                            <div class="col-4 center">Nombre del Estudiante</div>
                            <div class="col-1 center">Intentos pendientes</div>
                            <div class="col-3 center">Fecha entrega</div>
                            <div class="col-1 center">Calificación</div>
                        </div>
                        <hr>
                        <?php $c=1;
                        foreach ($listaEvlEstudiante as $registro){?>
                            <div class="row form-group">
                                <div class="col-sm-1 center">
                                    <?php echo $c++; ?>
                                </div>
                                <div class="col-4">
                                    <a href="?evaluacion=frm_detalleEvaluacionEstudiante&idEstudiante=<?php echo $registro->idEstudiante ?>">
                                        <?php echo $registro->nomEstudiante ?>
                                    </a>
                                </div>
                                <div class="col-1 center">
                                    <?php echo $registro->intentos ?>
                                </div>
                                <div class="col-3 center">
                                    <?php echo $registro->fechaRegistro ?>
                                </div>
                                <div class="col-1">
                                    <input class="form-control" disabled value="<?php echo $registro->puntajeTotal ?>">
                                </div>
                                <div class="col-1">
                                    <?php if($registro->puntajeTotal>17){ ?>
                                        <input class="form-control" disabled value="AD">
                                    <?php }else if($registro->puntajeTotal>13 && $registro->puntajeTotal<18){ ?>
                                        <input class="form-control" disabled value="A">
                                    <?php }else if($registro->puntajeTotal>10 && $registro->puntajeTotal<14){ ?>
                                        <input class="form-control" disabled value="B">
                                    <?php }else if($registro->puntajeTotal<11 && $registro->puntajeTotal!=null){ ?>
                                        <input class="form-control" disabled value="C">
                                    <?php } ?>
                                </div>
                                <div class="col-1">
                                    <a class="btn btn-primary btn-sm" href="?estudiante=cmd_enviarEmail&idEstudiante=<?php echo $registro->idEstudiante ?>" style="color:white">email</a>
                                </div>
                            </div>
                        <?php } ?>
                    </div> <!-- Fin class=container -->
                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 180px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?evaluacion=frm_registrarEvaluacion" style="color:white">Registrar Evaluación</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?tarea=frm_registrarTarea" style="color:white">Registrar Tarea</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?pregunta=frm_registrarPregunta" style="color:white">Registrar Pregunta</a>
                </div>
            </div>
        </div> <!-- Fin class=col-1 -->
    </div> <!-- Fin class=Row               #1F618D            -->
</div> <!-- Fin class=container Fluid       #C0D9FF"  -->