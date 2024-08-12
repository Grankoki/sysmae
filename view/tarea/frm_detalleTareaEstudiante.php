<?php
// ----------------------------------
// DOCENTE
// frm_detalleTareaEstudiante.php
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
                    <?php foreach ($listaTU as $registro){ ?>
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
            <form action="?tarea=cmd_calificarTarea&descripcionTarea=<?php echo $descripcionTarea ?>" method="post">
                <input type="hidden" name="action" value="calificarTarea">
                <input type="hidden" name="idEstudiante" value="<?php echo $_GET['idEstudiante']?>">
                <div class="row form-group">
                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col">
                                <h5><b>Tema: <?php echo $_SESSION['detalleTema']?></b></h5>
                                <h5><b>Tarea: <?php echo $descripcionTarea ?></b></h5>
                            </div>
                        </div>
                        <?php foreach($datosTE as $registro){?>
                        <div class="row form-group">
                            <div class="col-6">
                                <div class="row form-group">
                                    <div class="col">
                                    Fecha de entrega: <?php echo $registro->fechaSubida ?>
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col">
                                        <textarea class="form-control" rows=12 ><?php echo $registro->detalle ?></textarea>
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-2">Calificación</div>
                                    <div class="col-2">
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
                                <div class="row form-group">
                                    <div class="col center">
                                        <button type="submit" class="btn btn-primary btn-sm">Finalizar y Enviar</button>
                                    </div>
                                </div>
                            </div>

                            <div class="col-6">
                                <?php  $extension  = pathinfo($registro->archivo,PATHINFO_EXTENSION);
                                if($registro->archivo!=null && $extension=="pdf"){ ?>
                                <embed type="application/pdf" src="./img/documentos/uploads/<?php echo $registro->archivo ?>" width="100%" height="100%">
                                <?php }else if($registro->archivo==null){ ?>
                                        <div class="col center" style="padding-top: 150px">No existe documento adjunto</div>
                                <?php }else { ?>
                                        <div class="col center" style="padding-top: 150px">No se puede mostrar el archivo</div>
                                        <div class="col center">
                                            <a href="./img/documentos/uploads/<?php echo $registro->archivo ?>" download="">
                                                <?php echo "Descargar" ?>
                                            </a>
                                        </div>
                                        <div class="col center">
                                            <a href="./img/documentos/uploads/<?php echo $registro->archivo ?>" download="">
                                                <img height="30px" src="./img/descarga01.png">
                                            </a>
                                        </div>
                                <?php } ?>
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