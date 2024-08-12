<?php
// ----------------------------------
// ESTUDIANTE
// frm_detalleCalificacionEvaluacion.php
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

                        <div class="row form-group">
                            <div class="col-10 center">
                                <h5>DETALLE DE LA VALUACIÓN DEL ESTUDIANTE</h5>
                            </div>
                            <div class="col-2">
                                <b>Calificación:</b>
                            </div>
                        </div>
                        <?php foreach ($DatosEvaluacion as $registro){
                            $limiteTiempo = $registro->limiteTiempo; ?>
                            <div class="row form-group">
                                <div class="col-10">
                                    <input type="text" class="form-control" id="txt_titulo" name="txt_titulo"
                                           disabled value="<?php echo $registro->titulo?>">
                                </div>
                                <div class="col-2 center" id="calificacion">
                                    <input id="txt_calificacion" disabled class="form-control center" style="WIDTH: 100px; HEIGHT: 70px; font-size: 32pt">
                                </div>
                            </div>
                            <div class="form-group">
                                <div class="row form-group">
                                    <div class="col-sm-2">
                                    </div>
                                </div>
                            </div>
                        <?php }  //fin IF $DatosEvaluacion ?> <hr>
                        <div class="row form-group">
                            <div class="col-1 center"><h5>Nro</h5></div>
                            <div class="col-8 center"><h5>Enunciado de la pregunta</h5></div>
                            <div class="col-1 center">Puntaje obtenido</div>
                            <div class="col-1 center"></div>
                            <div class="col-1 center"></div>
                        </div>

                        <?php
                        $cc=0; $c=0;  $cPrg=0; $puntajeTotal=0; $cPrgVF=0;
                        $contPrgOpcRadio=0; $cantPrgOpcRadio=0;
                        $contPrgOpcCk=0; $cantPrgOpcCk=0;
                        $color="black";
                        foreach ($preguntasEvaluacionTipo1 as $mostrar){
                            $idTipoPregunta=$mostrar->idTipoPregunta;
                            $idPregunta=$mostrar->idPregunta;
                            $enunciadoPregunta=$mostrar->enunciado;
                            $c++; ?>
                            <?php if($c==1){ $cPrg++; ?>
                                <div class="row form-group">
                                    <div class="col-1 center"><?php echo $cPrg; ?></div>
                                    <div class="col-8"><b><?php echo $mostrar->enunciado ?></b></div>
                                    <div class="col-1">
                                        <select disabled name="cbx_puntajePregunta" id="cbx_puntajePregunta" class="form-control" aria-label="Default select example">
                                            <?php  $i=1;
                                            $puntaje=$mostrar->puntaje;
                                            //
                                            echo "<option value=".$mostrar->puntaje." selected=".$mostrar->puntaje.">".$mostrar->puntaje."</option>\n";
                                            while($i<=10){ echo "<option value=".$i.">".$i."</option>\n";  $i=$i+1;  }?>
                                        </select>
                                    </div>
                                </div>
                                <?php if(!empty($mostrar->imgPregunta)){ ?>
                                    <div class="row form-group">
                                        <div class="col-1">  </div>
                                        <div class="col-4"> <?php
                                            $nameImagen = $mostrar->imgPregunta; ?>
                                            <img src="img/uploads/<?php echo $nameImagen;?>" id="img<?php echo $cPrg;?>" height="200px">
                                        </div>
                                    </div>
                                <?php } ?>
                            <?php } ?>
                            <div class="row form-group">
                                <div class="col-1 center">
                                </div>
                                <div class="col-8">
                                    <?php $idSubOpcMultiple=$mostrar->idSubOpcMultiple;  $pt1=0;
                                    if($mostrar->cantOpciones==1){
                                        $contPrgOpcRadio++;
                                        foreach($listaOpcSeleccionadasT1 as $registroT1){
                                            $xy=0;
                                            if($idPregunta == $registroT1->idPregunta && $mostrar->idSubOpcMultiple == $registroT1->opcionSeleccionada){
                                                if($registroT1->calificacion>0){ $color="black";}else{$color="red";}
                                                ?>
                                                <input type="radio" checked id="opc<?php echo $cantPrgOpcRadio ?>" value="<?php echo $idSubOpcMultiple; ?>" > <?php
                                                $pt1=$registroT1->calificacion;
                                                $puntajeTotal=$puntajeTotal+$pt1;
                                            }else if($idPregunta == $registroT1->idPregunta) {
                                                ?>
                                                <input type="radio" id="opc<?php echo $cantPrgOpcRadio ?>" value="<?php echo $idSubOpcMultiple; ?>" > <?php
                                            }
                                        }

                                        if($contPrgOpcRadio==4){
                                            $contPrgOpcRadio=0;
                                            $cantPrgOpcRadio++;
                                        }
                                    }else if($mostrar->cantOpciones==2){
                                        foreach($listaOpcSeleccionadasT1 as $registroT2){
                                            if($idPregunta == $registroT2->idPregunta && $mostrar->idSubOpcMultiple == $registroT2->opcionSeleccionada){
                                                if($registroT2->calificacion>0){ $color="black";}else{$color="red";}
                                                ?> <input type="checkbox" checked onclick=uncheck<?php echo $cantPrgOpcCk;?>() id="<?php echo $cantPrgOpcCk.$contPrgOpcCk; ?>" value="<?php echo $idSubOpcMultiple; ?>" > <?php
                                                $pt1=$registroT2->calificacion;
                                                $puntajeTotal=$puntajeTotal+$pt1;
                                            }else if($idPregunta == $registroT2->idPregunta && $registroT2->opcionSeleccionada!=null) {
                                                ?> <input type="checkbox" onclick=uncheck<?php echo $cantPrgOpcCk;?>() id="<?php echo $cantPrgOpcCk.$contPrgOpcCk; ?>" value="<?php echo $idSubOpcMultiple; ?>" > <?php
                                            }
                                        }
                                        $contPrgOpcCk++;
                                        if($contPrgOpcCk==4){
                                            $contPrgOpcCk=0;
                                            echo '<input type="hidden" name="idPreguntaCk[]" value="'.$idPregunta.'" >';
                                            $cantPrgOpcCk++;
                                        }
                                    }
                                    // if($xy!=1 && $xy!=0){  echo '<input type="checkbox">'; $xy=0; }
                                    ?>
                                    <label for="radioPregunta"><font color="<?php echo $color ?>"><?php echo $mostrar->eleccion ?> </font></label>
                                    <?php $color="black" ?>
                                </div>
                                <div class="col-1 center"><?php echo $pt1 ?></div>
                            </div>
                            <?php if($c==4){ $c=0; ?> <hr><?php }
                        }       // cierre del foreach $preguntasevaluacion
                        // foreach $preguntasEvaluacionTipo2 son para las preguntas Verdadero Falso
                        $ii=0;
                        foreach ($preguntasEvaluacionTipo2 as $mostrar){  $cPrg++;
                            $idPregunta = $mostrar->idPregunta; ?>
                            <div class="row form-group">
                                <div class="col-1 center"><?php echo $cPrg; ?></div>
                                <div class="col-8"><b><?php echo $mostrar->enunciado ?></b></div>
                                <div class="col-1">
                                    <select disabled name="cbx_puntajePregunta" id="cbx_puntajePregunta" class="form-control" aria-label="Default select example">
                                        <?php $i=1;
                                        echo "<option value=".$mostrar->puntaje." selected=".$mostrar->puntaje.">".$mostrar->puntaje."</option>\n";
                                        while($i<=10){  echo "<option value=".$i.">".$i."</option>\n";  $i=$i+1; }?>
                                    </select>
                                    <input type="hidden" name="idPreguntaVF[]" value="<?php echo $mostrar->idPregunta ?>">
                                </div>
                            </div>

                            <?php if(!empty($mostrar->imgPregunta)){ ?>
                                <div class="row form-group">
                                    <div class="col-1">  </div>
                                    <div class="col-4"> <?php
                                        $nameImagen = $mostrar->imgPregunta; ?>
                                        <img src="img/uploads/<?php echo $nameImagen;?>" id="img<?php echo $cPrg;?>" height="200px">
                                    </div>
                                </div>
                            <?php } ?>



                            <div class="row form-group">
                                <div class="col-1"></div>
                                <div class="col-4">
                                    <select name="cbx_respuesta" id="cbx_respuesta" class="form-control" aria-label="Default select example">
                                        <?php
                                        $ptVF = []; $i=0;
                                        foreach($listaOpcSeleccionadasT2 as $registroT2){
                                            $ptVF[$i] = $registroT2->calificacion; $i++;
                                            if($registroT2->calificacion>0){ $color="white"; }else{ $color = "#F498C3";  } ?>

                                            <?php if($idPregunta == $registroT2->idPregunta && $registroT2->opcionSeleccionada==0){
                                                ?>
                                                <option value="0" selected>Falso</option>
                                                <option value="1">Verdadero</option>

                                            <?php }else if($idPregunta == $registroT2->idPregunta && $registroT2->opcionSeleccionada==1){  ?>
                                                <option value="0">Falso</option>
                                                <option value="1" selected>Verdadero</option>
                                            <?php }else { ?>
                                            <?php } ?>
                                        <?php  } ?>
                                    </select>
                                </div>
                                <div class="col-4 center"></div>
                                <div class="col-1 center"><?php echo $ptVF[$ii]; $puntajeTotal=$puntajeTotal+$ptVF[$ii]; $ii++; ?></div>
                            </div>
                        <?php }    // foreach ($preguntasEvaluacionTipo2)

                        ?>
                        <hr>
                        <div class="row form-group">
                            <div class="col-sm-8"></div>
                            <div class="col-sm-2">
                                <h5> <?php echo "Puntaje Total : ".$puntajeTotal;  ?></h5>

                            </div>
                            <?php
                            if($puntajeTotal>17){
                                $calificacion="AD";
                                ?><script>  calificacion(); </script> <?php
                            }else if($puntajeTotal>13 && $puntajeTotal<18){
                                $calificacion="A";
                                ?><script>  calificacion(); </script> <?php
                            }else if($puntajeTotal>10 && $puntajeTotal<14){
                                $calificacion="B";
                                ?><script>  calificacion(); </script> <?php
                            }else if($puntajeTotal<11 && $puntajeTotal!=null){
                                $calificacion="C";
                                ?><script>  calificacion(); </script> <?php
                            } ?>
                            <script>
                                function calificacion() {
                                    let inputResult = document.querySelector('#txt_calificacion').value=("<?php echo $calificacion; ?>");
                                }
                                calificacion();
                            </script>
                        </div>
                        <div class="row form-group">
                            <div class="col-1"></div>
                            <div class="col-8 center">
                                <a class="btn btn-primary btn-lg" href="javascript: history.go(-1)" style="color:white">Regresar</a>
                            </div>
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
