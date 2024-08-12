<?php
// ----------------------------------
// ESTUDIANTE
// frm_detalleCalificacionTarea.php
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
                                <a class="nav-link nav-white " href="?estudiante=lst_contenidoTUCE&idTema=<?php echo base64_encode($registro->idTema)?>
                							&detalleTema=<?php echo $registro->descripcion?>">
                                    <?php echo $registro->descripcion ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="?button=button_backCourseEst" style="color:white">Back</a>
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
                            <div class="col center">
                                <h5><b><?php echo $_SESSION['detalleTema']?></b></h5>
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
                                                <textarea disabled class="form-control" rows=12 ><?php echo $registro->detalle ?></textarea>
                                            </div>

                                        </div>
                                        <div class="row form-group">
                                            <div class="col-2">Calificación</div>
                                            <div class="col-2">
                                                    <?php if($registro->calificacion!=null){
                                                            if($registro->calificacion==18){ $calificacion = "AD";
                                                            }else if($registro->calificacion==16){ $calificacion = "A";
                                                            }else if($registro->calificacion==12){ $calificacion = "B";
                                                            }else { $calificacion = "C"; } ?>
                                                    <?php }else{
                                                        $calificacion = null;
                                                     }?>
                                                <input id="txt_calificacion" disabled class="form-control center" style="WIDTH: 100px; HEIGHT: 70px; font-size: 32pt" value="<?php echo $calificacion ?>">
                                            </div>
                                        </div>
                                        <div class="row form-group">
                                            <div class="col center">
                                                <a class="btn btn-primary btn-lg" href="javascript: history.go(-1)" style="color:white">Regresar</a>
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

                        <div class="row form-group">

                        </div>
                    </div> <!-- Fin class=container -->

                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 180px" >
            <div class="row form-group">
                <div class="col center">

                </div>
            </div>
            <div class="row form-group">
                <div class="col center">

                </div>
            </div>
            <div class="row form-group">
                <div class="col center">

                </div>
            </div>

        </div> <!-- Fin class=col-1 -->
    </div> <!-- Fin class=Row               #1F618D            -->
</div> <!-- Fin class=container Fluid       #C0D9FF"  -->