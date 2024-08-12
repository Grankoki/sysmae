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
                    <a class="btn btn-primary btn-sm" href="

                    ?evaluacion=lst_preguntasTema" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>
        </div> <!-- Fin class=col-2 -->

        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
            <form action='?evaluacion=cmd_agregarPregunta' id="frmSelect" method='post'>
                <div class="row form-group">
                    <div class="col-12">
                        <br>
                        <h4>Detalle de Pregunta por Agregar a la Evaluación</h4>
                        <?php $idEvaluacion = $_SESSION['idEvaluacion'] ?>
                        <input type="hidden" name="txt_idEvaluacion" value="<?php echo $idEvaluacion ?>">
                        <input type="hidden" name="txt_idPregunta" value="<?php echo  $_GET['idPregunta'] ?>">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-1 center"><h5>id</h5></div>
                    <div class="col-8 center"><h5>Enunciado de la pregunta</h5></div>
                    <div class="col-1 center">Puntaje pregunta</div>
                </div>
                <div class="row form-group">
                    <div class="col-1 center"> <?php echo $_GET['idPregunta'] ?> </div>
                    <div class="col-8">
                        <b><?php echo $_GET['enunciadoPregunta']; ?> </b>
                    </div>
                    <div class="col-1 center">
                        <select name="cbx_puntajePregunta" id="cbx_puntajePregunta" class="form-control" aria-label="Default select example">
                            <?php
                            $i=1;
                            while($i<=10){
                                //
                                echo "<option value=".$i.">".$i."</option>\n";
                                $i=$i+1;
                            }
                            ?>
                        </select>
                    </div>
                </div>

                <?php
                foreach ($datosPregunta as $registro){
                    $idTipoPregunta = $_GET['idTipoPregunta'];
                    ?>
                    <div class="row form-group">
                        <div class="col-1">  </div>
                        <div class="col-8">
                        <?php
                    if($idTipoPregunta==1){
                        $cantOpciones = $registro->cantOpciones;
                        $idSubOpcMultiple = $registro->idSubOpcMultiple;
                        if($cantOpciones==1){
                            ?>

                            <input type="radio" name="radioPregunta">
                            <?php

                        }else{
                            ?>
                            <input type="checkbox" name="<?php echo $idSubOpcMultiple; ?>">
                            <?php
                        }
                        ?>
                        <label for="radioPregunta"><?php echo $registro->eleccion ?></label>
                    <?php }else if($idTipoPregunta==2){ ?>
                        <div class="row form-group">
                            <div class="col-3">
                                <select disabled name="cbx_respuesta" id="cbx_respuesta" class="form-control" aria-label="Default select example">
                                    <?php
                                    if ($registro->respuesta==0){
                                        echo "<option value=".$registro->respuesta." selected=".$registro->respuesta.">".'Falso'."</option>\n";
                                    }else{
                                        echo "<option value=".$registro->respuesta." selected=".$registro->respuesta.">".'Verdadero'."</option>\n";
                                    }
                                    ?>
                                </select>
                            </div>
                        </div>
                    <?php }  // del if ?>
                        </div>
                    </div>
                <?php } // del foreach $datosPregunta ?>
                <hr>
                <div class="row form-group center">
                    <div class="col-8">
                        <button type="submit" class="btn btn-primary btn-lm">Agregar a la Evaluación</button>
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
<script>
    // Tamaño maximo del archivo
    const maxSize = 100000;

    // Obtener referencia al elemento
    const $miInput = document.querySelector("#imgPregunta");

    $miInput.addEventListener("change", function () {
        // si no hay archivos, regresamos
        if (this.files.length <= 0) return;

        // Validamos el primer archivo únicamente
        const archivo = this.files[0];
        if (archivo.size > maxSize) {
            // const tamanioEnMb = maxSize / 1000000;
            alert(`El tamaño máximo es ${maxSize/1000000} Mb o ${maxSize/1000} Kb`);
            // Limpiar
            $miInput.value = "";
        } else {
            // Validación pasada. Envía el formulario o haz lo que tengas que hacer
        }
    });
</script>
<script>
    // Agrega un evento al cambio de la opción seleccionada en el select
    document.getElementById('cbx_selec_tema').addEventListener('change', function() {
        // Simula hacer clic en el botón de submit cuando cambia la opción
        document.getElementById('frmSelect').submit();
    });
</script>
