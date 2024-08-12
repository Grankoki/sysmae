<?php
// ----------------------------------
// ESTUDIANTE
// frm_desarrollarTarea.php
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


        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 40px">
            <form action="?estudiante=cmd_desarrollarTarea" method="post" enctype='multipart/form-data'>
                <div class="row form-group">
                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col">
                                <h5><b><?php echo $_SESSION['detalleTema']?></b></h5>
                                <input type="hidden" value="FinalizarTarea" name="cmdFinalizarTarea">
                            </div>
                        </div>


                        <?php foreach ($datosTarea as $registro){
                        foreach($datosTareaEstudiante as $mostrar) {
                            ?>
                            <div class="row form-group">
                                <div class="col-8">
                                    <h4><label>Tarea: <?php echo $registro->descripcion?></label></h4>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-8">
                                    <textarea rows="5" style="background: transparent; border:none; " class="form-control" rows="4" disabled><?php echo $registro->enunciado ?></textarea>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-8">
                                    <label for="descripcion" style="padding:10px">Ingrese su respuesta</label>
                                    <?php if($mostrar->detalle!=null){?>
                                    <textarea class="form-control" rows=8 id="txt_descripcion" name="txt_descripcion"><?php echo $mostrar->detalle ?></textarea>
                                    <?php }else{ ?>
                                        <textarea class="form-control" rows=8 id="txt_descripcion" name="txt_descripcion" placeholder="Ingrese el texto de su respuesta en caso de ingresar caracteres especiales o imágenes cree un archivo en PDF y subalo con el boton de ELEGIR ARCHIVO"></textarea>
                                    <?php } ?>
                                </div>
                                <div class="col-4">
                                    <div class="row form-group">
                                    <label style="padding:10px" for="lbl_imgPregunta">Agregar documento</label>
                                    <input type="file" name="documentoTarea" id="documentoTarea" class="btn btn-primary btn-sm"/>
                                        <input hidden name="nameDocumento" value="<?php echo $mostrar->archivo ?>"/>
                                    </div>
                                    <div class="row form-group">

                                  <?php if(!empty($mostrar->archivo)){ ?>
                                    <div class="col-10">
                                        <img height="30px" src="./img/iconoDoc01.png">
                                        <font color="#123B81">
                                            <b><?php echo $mostrar->archivo ?></b>
                                        </font>
                                    </div>
                                    <div class="col-1">
                                        <a href="?estudiante=cmd_retirarDocumentoTareaEstudiante&idTarea=<?php echo $mostrar->idTarea ?>">
                                            <img height="30px" src="./img/delete.jpg">
                                        </a>
                                    </div>
                                    <div class="col-1">
                                    </div>
                                    <?php } ?>
                                    </div>
                                </div>
                            </div>
                        <?php } }?>
                        <div class="row form-group">
                            <div class="col center">
                                <button type="submit" class="btn btn-primary btn-sm">Finalizar y Enviar</button>
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