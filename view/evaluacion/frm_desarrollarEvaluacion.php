<?php
// ----------------------------------
// ESTUDIANTE
// frm_desarrollarEvaluacion.php
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
                    <?php foreach ($listaTUCE as $registro){ ?>
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


        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
            <form action="?estudiante=cmd_desarrollarEvaluacion" method="post">
            <div class="row form-group">
            <div class="container" style="background-color: #E8EAFC; padding:20px;">
                <div class="row form-group">
                    <div class="col center">
                        <h5><b><?php echo $_SESSION['detalleTema']?></b></h5>
                        <input type="hidden" value="Finalizar" name="cmdFinalizar">
                    </div>
                </div>

                <?php foreach ($DatosEvaluacion as $registro){
                    $limiteTiempo = $registro->limiteTiempo; ?>
                <div class="form-group">
                    <label for="titulo">Título:</label>
                    <input type="text" class="form-control" id="txt_titulo" name="txt_titulo"
                           disabled value="<?php echo $registro->titulo?>">
                </div>
                <div class="form-group">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion"
                           disabled value="<?php echo $registro->descripcion?>">
                </div>
                <div class="form-group">
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <label for="idIntentos">Intentos:</label>
                        </div>
                        <div class="col-sm-2">
                            <label for="cbx_tiempo">Límite tiempo:</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            <select disabled name="cbx_intentos" id="cbx_intentos" class="form-control" aria-label="Default select example">
                                <?php $i=1;
                                echo "<option value=".$_SESSION['intentos']." selected=".$_SESSION['intentos'].">".$_SESSION['intentos']."</option>\n";
                                while($i<=5){ echo "<option value=".$i.">".$i."</option>\n"; $i=$i+1;  } ?>
                            </select>
                        </div>
                        <div class="col-2">
                            <select disabled name="cbx_tiempo" id="cbx_tiempo" class="form-control" aria-label="Default select example">
                                <?php $i=10;
                                echo "<option value=".$registro->limiteTiempo." selected=".$registro->limiteTiempo.">".$registro->limiteTiempo."</option>\n";
                                while($i<=120){ echo "<option value=".$i.">".$i."</option>\n"; $i=$i+5; } ?>
                            </select>
                        </div>
                        <div class=col-3>
                            <b> <label id="contadormm"></label> <label id="contadorss"></label> </b>
                        </div>
                        <script>
                            var min=<?php echo $limiteTiempo; ?>;
                            var mm=min-1; var cs=59; var ss=59;
                            function timer(){
                                cs++;
                                var t=setTimeout("timer()",1000);
                                if (cs==60){
                                    document.getElementById('contadormm').innerHTML = 'Tiempo: '+mm--+" mins";
                                    cs=0; ss=59;
                                }
                                document.getElementById('contadorss').innerHTML = ' '+ss--+" segundos";
                                i--;
                                if (i==-1){
                                    document.getElementById('contadorss').innerHTML = 'Hola?';
                                    clearTimeout(t);
                                    document.frm_desEvaluacion.submit();
                                }
                            }
                            i=60*min;
                        </script>
                        <?php
                        echo "<script>";
                        echo "timer();";
                        echo "</script>";
                        ?>
                    </div>
                </div>
                <?php }  //fin IF $DatosEvaluacion ?> <hr>
                <div class="row form-group">
                    <div class="col-1 center"><h5>Nro</h5></div>
                    <div class="col-8 center"><h5>Enunciado de la pregunta</h5></div>
                    <div class="col-1 center">Puntaje</div>
                    <div class="col-1 center"></div>
                    <div class="col-1 center"></div>
                </div>

                <?php
                $cc=0; $c=0;  $cPrg=0; $puntajeTotal=0; $cPrgVF=0;
                $contPrgOpcRadio=0; $cantPrgOpcRadio=0;
                $contPrgOpcCk=0; $cantPrgOpcCk=0;
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
                        <div class="col-1 center"></div>
                        <div class="col-8">
                            <?php $idSubOpcMultiple=$mostrar->idSubOpcMultiple;
                            if($mostrar->cantOpciones==1){
                                $contPrgOpcRadio++; ?>
                                    <input type="radio" id="opc<?php echo $cantPrgOpcRadio ?>" value="<?php echo $idSubOpcMultiple; ?>" name="arraySelectRadio[<?php echo $cantPrgOpcRadio ?>]"> <?php
                                if($contPrgOpcRadio==4){
                                    $contPrgOpcRadio=0;
                                    echo '<input type="hidden" name="idPreguntaRd[]" value="'.$idPregunta.'" >';
                                    $cantPrgOpcRadio++;
                                }
                            }else if($mostrar->cantOpciones==2){ ?>
                                <input type="checkbox" onclick=uncheck<?php echo $cantPrgOpcCk;?>() id="<?php echo $cantPrgOpcCk.$contPrgOpcCk; ?>" value="<?php echo $idSubOpcMultiple; ?>" name="arraySelectCk[<?php echo $cantPrgOpcCk ?>][<?php echo $contPrgOpcCk; ?>]"> <?php
                            if($contPrgOpcCk==3){  ?>
                                <script>
                                    function uncheck<?php echo $cantPrgOpcCk;?>(){
                                        var checkbox1 = document.getElementById("<?php echo $cantPrgOpcCk."0"; ?>");
                                        var checkbox2 = document.getElementById("<?php echo $cantPrgOpcCk."1"; ?>");
                                        var checkbox3 = document.getElementById("<?php echo $cantPrgOpcCk."2"; ?>");
                                        var checkbox4 = document.getElementById("<?php echo $cantPrgOpcCk."3"; ?>");

                                        checkbox1.onclick = function(){
                                            if(checkbox1.checked != false && checkbox2.checked != false){
                                                checkbox3.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox3.checked != false){
                                                checkbox2.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox4.checked != false){
                                                checkbox2.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox3.checked != false){
                                                checkbox1.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox3.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox2.checked =null;
                                            }
                                        }

                                        checkbox2.onclick = function(){
                                            if(checkbox1.checked != false && checkbox2.checked != false){
                                                checkbox3.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox3.checked != false){
                                                checkbox2.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox4.checked != false){
                                                checkbox2.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox3.checked != false){
                                                checkbox1.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox3.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox2.checked =null;
                                            }
                                        }
                                        checkbox3.onclick = function(){
                                            if(checkbox1.checked != false && checkbox2.checked != false){
                                                checkbox3.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox3.checked != false){
                                                checkbox2.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox4.checked != false){
                                                checkbox2.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox3.checked != false){
                                                checkbox1.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox3.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox2.checked =null;
                                            }
                                        }
                                        checkbox4.onclick = function(){
                                            if(checkbox1.checked != false && checkbox2.checked != false){
                                                checkbox3.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox3.checked != false){
                                                checkbox2.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox1.checked != false && checkbox4.checked != false){
                                                checkbox2.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox3.checked != false){
                                                checkbox1.checked =null;
                                                checkbox4.checked =null;
                                            }
                                            if(checkbox2.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox3.checked =null;
                                            }
                                            if(checkbox3.checked != false && checkbox4.checked != false){
                                                checkbox1.checked =null;
                                                checkbox2.checked =null;
                                            }
                                        }
                                    }
                                </script>  <?php
                            }
                                $contPrgOpcCk++;
                                if($contPrgOpcCk==4){
                                $contPrgOpcCk=0;
                                echo '<input type="hidden" name="idPreguntaCk[]" value="'.$idPregunta.'" >';
                                    $cantPrgOpcCk++;
                                }
                            } ?>
                            <label for="radioPregunta"><?php echo $mostrar->eleccion ?></label>
                        </div>
                    </div>
                    <?php if($c==4){ $c=0; ?> <hr><?php }
                }       // cierre del foreach $preguntasevaluacion
                        // foreach $preguntasEvaluacionTipo2 son para las preguntas Verdadero Falso
                foreach ($preguntasEvaluacionTipo2 as $mostrar){  $cPrg++;?>
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
                            <select name="cbx_respuesta[]" id="cbx_respuesta" class="form-control" aria-label="Default select example">
                                <option hidden value="">Selecciona respuesta</option>
                                <option value="0">Falso</option>
                                <option value="1">Verdadero</option>
                            </select>
                        </div>
                    </div>
                <?php } ?>
                <hr>
                <div class="row form-group">
                    <div class="col-1"></div>
                    <div class="col-8 center">
                        <button type="submit" class="btn btn-primary btn-lg">Finalizar y Enviar</button>
                    </div>
                </div>

            </div> <!-- Fin class=container -->
            </div> <!-- Fin row from-group -->
            </form>

        </div> <!-- Fin class=col-9 div-middle-->

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