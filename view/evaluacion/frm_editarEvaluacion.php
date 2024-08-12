<?php
// ----------------------------------
// EVALUACION
// frm_editarEvaluacion.php
// ---------------------------

?>

<link rel="stylesheet" href="css/mystyle.css">
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.5.3/dist/css/bootstrap.min.css">
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
                    <?php
                    foreach ($listaTUCD as $registro){ ?>
                        <div class="row form-group">
                            <div class="col center">
                                <a class="nav-link nav-white " href="?docente=lst_contenidoTUCD&idTema=<?php echo base64_encode($registro->idTema)?>
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
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(-1)" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>

        </div> <!-- Fin class=col-2 -->


        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
            <form action='?evaluacion=cmd_editarEvaluacion' method='post'>
                <div class="row form-group">
                    <div class="col-12">
                        <h2>Edición de Evaluaciones</h2>
                        <input type="hidden" name="action" value="actualizar">
                    </div>
                </div>

                <?php foreach ($datosEvaluacion as $key => $datos){
                $idEvaluacion = $datos->idEvaluacion;
                ?>
                    <input type="hidden" name="txt_idEvaluacion" value="<?php echo $idEvaluacion ?>">
                <div class="row form-group">
                    <div class="col-sm-12">
                        <label for="descripcion">Título:</label>
                        <input type="nombres" class="form-control" id="txt_titulo" name="txt_titulo" required="true" value="<?php echo $datos->titulo ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12">
                        <label for="descripcion">Descripción:</label>
                        <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion" required="true" value="<?php echo $datos->descripcion ?>">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-2">
                        <label for="idIntentos">Intentos:</label>
                        <select name="cbx_intentos" id="cbx_intentos" class="form-control" aria-label="Default select example">
                            <?php
                            $i=1;
                            echo "<option value=".$datos->intentos." selected=".$datos->intentos.">".$datos->intentos."</option>\n";
                            while($i<=5){
                                //
                                echo "<option value=".$i.">".$i."</option>\n";
                                $i=$i+1;
                            }
                            ?>
                        </select>
                    </div>
                    <div class="col-sm-2">
                        <label for="cbx_tiempo">Límite tiempo:</label>
                        <select name="cbx_tiempo" id="cbx_tiempo" class="form-control" disabled aria-label="Default select example">
                            <?php
                            $i=10;
                            echo "<option value=".$datos->limiteTiempo." selected=".$datos->limiteTiempo.">".$datos->limiteTiempo."</option>\n";
                            while($i<=120){
                                //
                                echo "<option value=".$i.">".$i."</option>\n";
                                if ($i>=60){
                                    $i=$i+30;
                                }else{ $i=$i+5; }
                            }
                            ?>
                        </select>
                    </div>
                </div>
                <div class="row form-group" >
                    <div class="col-sm-3">
                        <label for="fechaInicio">Inicia:</label>
                        <input type="datetime-local" name="fechaInicio" class="form-control" value="<?php echo $datos->fechaInicio ?>">
                    </div>
                    <div class="col-sm-3">
                        <label for="fechaTermino">Finaliza:</label>
                        <input type="datetime-local" name="fechaTermino" class="form-control" value="<?php echo $datos->fechaTermino ?>">
                    </div>
                </div>
                <?php } ?>
                <div class="row form-group" >
                    <div class="col-sm-3">
                        <button type="submit" class="btn btn-primary btn-lm">Guardar y Enviar</button>
                    </div>
                    <div class="col-sm-3">
                        <a type="button" class="btn btn-primary btn-lm" href="?evaluacion=lst_preguntasTema">Agregar pregunta </a>
                    </div>
                </div>
            </form>
            <hr>


            <form id = frm_listarPregunta method='post'>

                    <div class="row form-group">
                        <div class="col-1 center"><h5>Nro</h5></div>
                        <div class="col-8 center"><h5>Enunciado de la pregunta</h5></div>
                        <div class="col-1 center">Puntaje</div>
                        <div class="col-1 center"></div>
                        <div class="col-1 center"></div>
                    </div>

                    <?php
                    $cc=0; $c=0;  $cPrg=0; $puntajeTotal=0; $cPrgVF=0;
                    //falta el select para el cbx puntaje
                    foreach ($preguntasEvaluacion as $mostrar){
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
                                        $puntajeTotal=$puntajeTotal+$mostrar->puntaje;
                                        echo "<option value=".$mostrar->puntaje." selected=".$mostrar->puntaje.">".$mostrar->puntaje."</option>\n";
                                        while($i<=10){ echo "<option value=".$i.">".$i."</option>\n";  $i=$i+1;  }?>
                                    </select>
                                </div>
                                <div class="col-1 center"><a href="?evaluacion=frm_editarPreguntaEvaluacion&idEvaluacion=<?php echo $idEvaluacion; ?>&idPregunta=<?php echo $idPregunta; ?>&idTipoPregunta=<?php echo $idTipoPregunta; ?>&enunciadoPregunta=<?php echo $enunciadoPregunta; ?>&puntaje=<?php echo $puntaje; ?>"><img height="30px" src="./img/modificar.png"></a></div>
                                <div class="col-1 center"><a href="?evaluacion=cmd_retirarPregunta&idEvaluacion=<?php echo $idEvaluacion; ?>&idPregunta=<?php echo $idPregunta; ?>"><img height="30px" src="./img/delete.jpg"></a></div>
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
                            <div class="col-1 center"><?php echo $mostrar->pesoOpcion ?></div>
                            <div class="col-8">
                                <?php
                                if($mostrar->cantOpciones==1){
                                        if($mostrar->pesoOpcion>0){ ?>
                                            <input type="radio" id="opc1" checked name="<?php echo $cc; ?>">
                                    <?php } else{  ?>
                                        <input type="radio" id="opc1" name="<?php echo $cc; ?>">
                                    <?php }
                                    }else{ if($mostrar->pesoOpcion>0){  ?>
                                        <input type="checkbox" checked name="<?php echo $mostrar->idSubOpcMultiple ?>">
                                    <?php } else{  ?>
                                        <input type="checkbox"  name="<?php echo $mostrar->idSubOpcMultiple ?>">
                                    <?php }
                                } ?>
                                <label for="radioPregunta"><?php echo $mostrar->eleccion ?></label>
                            </div>
                        </div>
                        <?php if($c==4){ $c=0; ?> <hr><?php }
                    } // cierre del foreach $preguntasevaluacion
                    foreach ($preguntasEvaluacionTipo2 as $mostrar){  $cPrg++;?>
                        <div class="row form-group">
                            <div class="col-1 center"><?php echo $cPrg; ?></div>
                            <div class="col-8"><b><?php echo $mostrar->enunciado ?></b></div>

                            <div class="col-1">
                                <select disabled name="cbx_puntajePregunta" id="cbx_puntajePregunta" class="form-control" aria-label="Default select example">
                                    <?php $i=1;
                                    $idPregunta=$mostrar->idPregunta;
                                    $puntaje=$mostrar->puntaje;
                                    $idTipoPregunta=$mostrar->idTipoPregunta;
                                    $enunciadoPregunta=$mostrar->enunciado;
                                    $puntajeTotal=$puntajeTotal+$puntaje;
                                    echo "<option value=".$mostrar->puntaje." selected=".$mostrar->puntaje.">".$mostrar->puntaje."</option>\n";
                                    while($i<=10){
                                        echo "<option value=".$i.">".$i."</option>\n";
                                        $i=$i+1;
                                    }?>
                                </select>
                            </div>
                            <div class="col-1 center"><a href="?evaluacion=frm_editarPreguntaEvaluacion&idEvaluacion=<?php echo $idEvaluacion; ?>&idPregunta=<?php echo $idPregunta; ?>&idTipoPregunta=<?php echo $idTipoPregunta; ?>&enunciadoPregunta=<?php echo $enunciadoPregunta; ?>&puntaje=<?php echo $puntaje; ?>"><img height="30px" src="./img/modificar.png"></a></div>
                            <div class="col-1 center"><a href="?evaluacion=cmd_retirarPregunta&idEvaluacion=<?php echo $idEvaluacion; ?>&idPregunta=<?php echo $idPregunta; ?>"><img height="30px" src="./img/delete.jpg"></a></div>
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
                                <select disabled name="<?php echo $cPrgVF; ?>" id="<?php echo $cPrgVF; ?>" class="form-control" aria-label="Default select example">
                               <?php if ($mostrar->respuesta==0){
                                        echo "<option value=".$mostrar->respuesta." selected=".$mostrar->respuesta.">".'Falso'."</option>\n";
                                    }else{
                                        echo "<option value=".$mostrar->respuesta." selected=".$mostrar->respuesta.">".'Verdadero'."</option>\n";
                                    } ?>
                                </select>
                            </div>
                        </div>
                    <?php }
                    ?>
                    <div class="row form-group">
                        <div class="col-sm-8"></div>
                        <div class="col-sm-2">
                            <h5> <?php echo "Puntaje Total : ".$puntajeTotal;?></h5>
                        </div>
                    </div>
             </form>
        </div> <!-- Fin class=col-9 -->

        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 180px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registrar Evaluación</a>
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
