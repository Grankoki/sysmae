<?php
// ----------------------------------
// DOCENTE
// lst_revisarTarea.php
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
                    <?php foreach ($listaTUCD as $registro){ ?>
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
                                <h5><b>Tarea: <?php echo $descripcionTarea ?></b></h5>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col-1">   </div>
                            <div class="col-4 center">Nombre del Estudiante</div>
                            <div class="col-3 center">Doc. Adjunto</div>
                            <div class="col-2 center">Fecha entrega</div>
                            <div class="col-1 center">Calificación</div>
                        </div>
                        <hr>
                        <?php $c=1;
                        foreach ($listaTE as $registro){?>
                        <div class="row form-group">
                            <div class="col-sm-1 center">
                                <?php echo $c++; ?>
                            </div>
                            <div class="col-4">
                                <a href="?tarea=frm_detalleTareaEstudiante&idEstudiante=<?php echo $registro->idEstudiante ?>&descripcionTarea=<?php echo $descripcionTarea?>">
                                    <?php echo $registro->nomEstudiante ?>
                                </a>
                            </div>
                            <div class="col-3">
                                <?php
                                if ($registro->fechaSubida==null){
                                    echo "n/e";
                                }else{
                                    echo $registro->archivo;
                                } ?>
                            </div>
                            <div class="col-2">
                                <?php echo $registro->fechaSubida ?>
                            </div>
                            <div class="col-1">
                                <select name="cbx_puntaje" id="cbx_puntaje" class="form-control" aria-label="Default select example" style="font-size: 14px">
                                    <?php if($registro->calificacion!=null){
                                        if($registro->calificacion==18){ $calificacion = "AD";
                                        }else if($registro->calificacion==16){ $calificacion = "A";
                                        }else if($registro->calificacion==12){ $calificacion = "B";
                                        }else { $calificacion = "C"; } ?>
                                        <option value="<?php echo $calificacion ?>"><?php echo $calificacion ?></option>
                                    <?php }else{ ?>
                                        <option value="" disabled selected hidden></option>
                                    <?php }?>
                                    <option value="AD">AD</option>
                                    <option value="A">A</option>
                                    <option value="B">B</option>
                                    <option value="C">C</option>
                                </select>
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