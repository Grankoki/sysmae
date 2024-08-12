<?php
// frm_editarTarea.php
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
            <form action='?tarea=cmd_editarTarea' method='post' enctype='multipart/form-data'>
                <div class="row form-group">
                    <div class="col-12">
                        <br>
                        <h4>Edición de Tareas</h4>
                        <h4><?php echo 'Tema: '.$_SESSION['detalleTema'];

                            ?></h4>

                        <input type="hidden" name="action" value="editar">
                    </div>
                </div>
                <?php foreach ($datosTarea as $key => $datos){
                    $idTarea = $datos->idTarea;
                    ?>
                    <input type="hidden" name="txt_idTarea" value="<?php echo $idTarea ?>">
                <div class="row form-group">
                    <div class="col-sm-7">
                        <label for="descripcion">Descripción:</label>
                        <input type="nombres" class="form-control" id="txt_titulo" name="txt_titulo" required="true" value="<?php echo $datos->descripcion ?>">
                    </div>
                    <div class="col-sm-2">
                        <label for="lbl_imgPregunta">Agregar documento</label>
                        <input type="file" name="documentoTarea" id="documentoTarea" class="btn btn-primary btn-sm"/>
                        <input hidden name="nameDocumento" value="<?php echo $datos->documento ?>"/>
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col">
                        <label for="descripcion">Enunciado:</label>
                        <textarea class="form-control" rows=5 id="txt_enunciado" name="txt_enunciado" required="true" ><?php echo $datos->enunciado ?></textarea>
                    </div>
                </div>

                    <div class="row form-group" >
                        <div class="col-sm-3">
                            <label for="horaInicio">Inicia:</label>
                            <input type="datetime-local" class="form-control" name="fechaInicio" value="<?php echo $datos->fechaInicio ?>">
                        </div>
                        <div class="col-sm-3">
                            <label for="horaTermino">Finaliza:</label>
                            <input type="datetime-local" class="form-control" name="fechaFin" value="<?php echo $datos->fechaTermino ?>">
                        </div>
                    </div>


                <?php } ?>
                <div class="row form-group" style="text-align:center">
                    <div class="col-8" style="padding:10px">
                        <button type="submit" class="btn btn-primary btn-lg">Guardar y Enviar</button>
                    </div>
                </div>

            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 180px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registrar Pregunta</a>
                </div>
            </div>
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

        </div> <!-- Fin class=col-1 -->
    </div> <!-- Fin class=Row               #1F618D            -->
</div> <!-- Fin class=container Fluid       #C0D9FF"  -->
<script>
    // Tamaño maximo del archivo
    const maxSize = 500000;

    // Obtener referencia al elemento
    const $miInput = document.querySelector("#documentoTarea");

    $miInput.addEventListener("change", function () {
        // si no hay archivos, regresamos
        if (this.files.length <= 0) return;

        // Validamos el primer archivo únicamente
        const archivo = this.files[0];
        if (archivo.size > maxSize) {
            // const tamanioEnMb = maxSize / 1000000;
            alert(`El tamaño máximo es ${maxSize/1000000} Mb`);
            // Limpiar
            $miInput.value = "";
        } else {
            // Validación pasada. Envía el formulario o haz lo que tengas que hacer
        }
    });
</script>
