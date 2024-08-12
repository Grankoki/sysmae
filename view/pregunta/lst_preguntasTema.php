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
                    <a class="btn btn-primary btn-sm" href="?button=button_backEvaluacion" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>
        </div> <!-- Fin class=col-2 -->

        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
            <form action='?evaluacion=lst_preguntasTemaForSelec' id="frmSelect" method='post'>
                <div class="row form-group">
                    <div class="col-12">
                        <br>
                        <h4>Agregar Preguntas a la Evaluación</h4>
                        <?php $idEvaluacion = $_SESSION['idEvaluacion'];
                        echo "idEv: ".$idEvaluacion; ?>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <select name="cbx_selec_tema" id="cbx_selec_tema" required="true"
                                class="form-control" aria-label="Default select example">
                            <option value="" disabled selected hidden>Seleccione tema</option>
                            <?php
                            foreach ($listaTemaCurso as $registro) {
                                echo "<option value=" . $registro->idTema . ">" . $registro->descripcion . "</option>\n";
                            } ?>
                        </select>
                    </div>
                </div>
                <hr>
            </form>

            <form id="frmPregunta" action='?pregunta=cmd_agregarPregunta' method='post' enctype='multipart/form-data'>
                <?php $idTemaSelec=@$_POST['cbx_selec_tema']; ?>
                <input class="form-control" hidden name="action" type="text" value="agregar">
                <input class="form-control"  name="txt_cbx_tema_selec" type="text" value="<?php echo $idTemaSelec ?>">
                <div class="row form-group">
                    <div class="col-1 center">  <b>idPrg</b></div>
                    <div class="col-2 center">  <b>Pregunta</b> </div>
                    <div class="col-5 center">  <b>Enunciado</b> </div>
                    <div class="col-2 center">  <b>Tipo Pregunta</b> </div>
                </div>
                <?php if (isset($listaPreguntaByTema) && $listaPreguntaByTema!=null){
                    foreach ($listaPreguntaByTema as $registro){
                        $idPregunta = $registro->idPregunta ?>
                    <div class="row form-group">
                        <div class="col-1"><?php echo $registro->idPregunta ?></div>
                        <div class="col-2"><?php echo $registro->nombrePregunta ?></div>
                        <div class="col-5">
                            <?php $idTipoPregunta = $registro->idTipoPregunta ?>
                            <a class="nav-link" href="?evaluacion=frm_agregarPregunta&idTipoPregunta=<?php echo $idTipoPregunta;?>&idPregunta=<?php echo $idPregunta;?>&idEvaluacion=<?php echo $idEvaluacion;?>&enunciadoPregunta=<?php echo $registro->enunciado;?>">
                                <?php echo $registro->enunciado ?>
                            </a>
                        </div>
                        <div class="col-4">
                            <?php echo $registro->tipoPregunta ?>
                        </div>
                    </div>
                <?php } }?>
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
