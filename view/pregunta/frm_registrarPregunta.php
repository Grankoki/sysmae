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
                                <a class="nav-link nav-white " href="?docente=lst_contenidoTUCD&idTema=<?php echo base64_encode($registro['idTema'])?>
                							&detalleTema=<?php echo $registro['descripcion']?>">
                                    <?php echo $registro["descripcion"]."<br>" ?>
                                </a>
                            </div>
                        </div>
                    <?php } ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="?button=button_backCurse" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>
        </div> <!-- Fin class=col-2 -->

        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
            <form action='#frmPregunta' id="frmSelect" method='post'>
                <div class="row form-group">
                    <div class="col-12">
                        <br>
                        <h4>Registro de Preguntas</h4>
                        <input type="hidden" name="action" value="registrar">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-4">
                        <select name="cbx_tipo_pregunta" id="cbx_tipo_pregunta"
                                class="form-control" aria-label="Default select example">
                            <option value="" disabled selected hidden>Seleccione tipo pregunta</option>
                            <?php
                            foreach ($listaTipoPrg as $registro){
                                echo "<option value=".$registro->idTipoPregunta.">".$registro->descripcion."</option>\n";
                            } ?>
                        </select>
                    </div>
                </div>
               <hr>
            </form>

            <form id="frmPregunta" action='?pregunta=cmd_registrarPregunta' method='post' enctype='multipart/form-data'>
                <?php $idPreguntaSelec=@$_POST['cbx_tipo_pregunta']; ?>
                <input class="form-control" hidden name="action" type="text" value="registrar">
                <input class="form-control" hidden name="txt_cbx_tipo_pregunta" type="text" value="<?php echo $idPreguntaSelec ?>">
            <?php if($idPreguntaSelec==1){ ?>
                <div class="row form-group">
                    <div class="col-12 center">
                            <h5>OPCION MULTIPLE</h5>
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
                    <div class="col-sm-1">
                        <input value="<?php echo $idPreguntaSelec ?>" class="form-control">
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="lbl_nomPregunta">Nombre de la pregunta:</label>
                        <input class="form-control" id="txt_nomPregunta"
                               name="txt_nomPregunta" required="true"
                               placeholder="Ingrese nombre de la pregunta">
                    </div>
                    <div class="col-sm-2">
                        <label for="lbl_imgPregunta">Agregar imagen</label>
                        <input type="file" name="imgPregunta" id="imgPregunta" class="btn btn-primary btn-sm"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-8">
                        <label for="lbl_desPregunta">Enunciado de la pregunta</label>
                        <textarea class="form-control" required="true" rows=5 id="txt_desPregunta" name="txt_desPregunta"></textarea>
                    </div>
                    <div class="col-sm-2">
                        <label for="lbl_cantidad_respuestas">Respuestas seleccionables</label>
                        <select name="cbx_cantidad_respuestas" id="cbx_cantidad_respuestas" class="form-control" aria-label="Default select example">
                            <?php
                            $i=1;
                            while($i<=2){
                                echo "<option value=".$i.">".$i."</option>\n";
                                $i=$i+1;
                            }  ?>
                        </select>
                    </div>
                </div>
                <hr>
                <?php
                for($i=0; $i<4; $i++){ ?>
                    <div class="row form-group" id="<?php echo $i ?>">
                        <div class="col-sm-8">
                            <label for="lbl_eleccion<?php echo $i ?>">Elección <?php echo $i+1 ?></label>
                            <input class="form-control" id="txt_eleccion<?php echo $i ?>"
                                   name="txt_eleccion[]" required="true"
                                   placeholder="Ingrese alternativa">
                        </div>
                        <div class="col-sm-2">
                            <label for="lbl_calificacion<?php echo $i ?>">Peso calificación</label>
                            <select name="cbx_calificacion_opcion[]" class="form-select" aria-label="Default select example">
                                <?php
                                $c=0;
                                while($c<=100){
                                    //
                                    $valor=$c/100;
                                    echo "<option value=".$valor.">".$c." % </option>\n";
                                    $c=$c+25;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-sm-2">
                            Retroalimentación
                        </div>
                        <div class="col-sm-6">
                            <textarea class="form-control" rows=5 name="txt_retroalimentacion[]"></textarea>
                        </div>
                    </div>
                <?php } ?>
                <div class="row form-group">
                    <div class="col-sm-8 center">
                        <button type="submit" class="btn btn-primary btn-lm">Guardar Pregunta</button>
                    </div>
                </div>
            <?php }else if($idPreguntaSelec==2) { ?>
                <div class="row form-group">
                    <div class="col-12 center">
                        <h5>VERDADERO O FALSO</h5>
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
                        <div class="col-sm-1">
                            <input value="<?php echo $idPreguntaSelec ?>" class="form-control">
                        </div>
                </div>
                    <div class="row form-group">
                        <div class="col-sm-6">
                            <label for="lbl_nomPregunta">Nombre de la pregunta:</label>
                            <input class="form-control" id="txt_nomPregunta"
                                   name="txt_nomPregunta" required="true"
                                   placeholder="Ingrese nombre de la pregunta">
                        </div>
                        <div class="col-sm-2">
                            <label for="lbl_imgPregunta">Agregar imagen</label>
                            <input type="file" name="imgPregunta" id="imgPregunta" class="btn btn-primary btn-sm"/>
                        </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-8">
                        <label for="lbl_desPregunta">Enunciado de la pregunta</label>
                        <textarea class="form-control" required="true" rows=5 id="txt_desPregunta" name="txt_desPregunta"></textarea>
                    </div>
                    <div class="col-sm-3">
                        <label for="lbl_alternativa">Seleccione alternativa</label>
                        <select name="cbx_alternativa" id="cbx_alternativa" required class="form-control" aria-label="Default select example">
                            <option value="" disabled selected hidden>Seleccione respuesta</option>
                            <option value="0" >Falso</option>
                            <option value="1" >Verdadero</option>
                        </select>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="lbl_desVerdadero">Retroalimentacion para Verdadero</label>
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" required="true" rows=3 id="txt_desVerdadero" name="txt_desVerdadero"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-2">
                        <label for="lbl_desFalso">Retroalimentacion para Falso</label>
                    </div>
                    <div class="col-sm-6">
                        <textarea class="form-control" required="true" rows=3 id="txt_desFalso" name="txt_desFalso"></textarea>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-8 center">
                        <button type="submit" class="btn btn-primary btn-lm">Guardar Pregunta</button>
                    </div>
                </div>
            <?php }else if($idPreguntaSelec==3) {
                echo "Emparejamiento"; ?>
            <?php }else if($idPreguntaSelec==4) { ?>
                <div class="row form-group">
                    <div class="col-12 center">
                        <h5>RESPUESTA CORTA</h5>
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
                <div class="row form-group">
                    <div class="col-sm-6">
                        <label for="lbl_nomPregunta">Nombre de la pregunta:</label>
                        <input class="form-control" id="txt_nomPregunta"
                               name="txt_nomPregunta" required="true"
                               placeholder="Ingrese nombre de la pregunta">
                    </div>
                    <div class="col-sm-2">
                        <label for="lbl_imgPregunta">Agregar imagen</label>
                        <input type="file" name="imgPregunta" id="imgPregunta" class="btn btn-primary btn-sm"/>
                    </div>
                </div>
                <div class="row form-group">
                    <div class="col-sm-8">
                        <label for="lbl_desPregunta">Enunciado de la pregunta</label>
                        <textarea class="form-control" required="true" rows=5 id="txt_desPregunta" name="txt_desPregunta"></textarea>
                    </div>
                    <div class="col-sm-2">
                        <div class="row form-group">
                            <div class="col center">
                            <label for="lbl_cantidad_respuestas">Add Respuestas</label>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col center">
                            <input type="button" id="addBtn" name="addBtn" value=" + ">
                            </div>
                        </div>
                    </div>
                </div>
                <hr>
                <div class="row form-group" id="list">

                </div>

                <div class="row form-group">
                    <div class="col-sm-8 center">
                        <button type="submit" class="btn btn-primary btn-lm">Guardar Pregunta</button>
                    </div>
                </div>
            <?php }else if($idPreguntaSelec==5) {
                echo "Respuesta numérica"; ?>
            <?php } ?>

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
    document.getElementById('cbx_tipo_pregunta').addEventListener('change', function() {
        // Simula hacer clic en el botón de submit cuando cambia la opción
        document.getElementById('frmSelect').submit();
    });
</script>
<script>
    var addBtn = document.getElementById('addBtn'),
        contador=0;
    let IdCounter = 0;
    function evento()
    {
        IdCounter++;
        list.innerHTML += `
            <div class="col-12" id="${IdCounter}">
            <div class="col-12">
                   <div class="row form-group" id="${IdCounter}">
                        <div class="col-8">
                            <label for="lbl_eleccion${IdCounter}">Respuesta ${IdCounter}</label>
                            <input class="form-control" id="txt_eleccion${IdCounter}"
                                   name="txt_eleccion[]" required="true"
                                   placeholder="Ingrese alternativa">
                        </div>
                        <div class="col-2">
                            <label for="lbl_calificacion<${IdCounter}">Peso calificación</label>
                            <select name="cbx_calificacion_opcion[]" class="form-select" aria-label="Default select example">
                                <?php
                                $c=0;
                                while($c<=100){
                                    //
                                    $valor=$c/100;
                                    echo "<option value=".$valor.">".$c." % </option>\n";
                                    $c=$c+25;
                                }
                                ?>
                            </select>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col-2">
                            Retroalimentación
                        </div>
                        <div class="col-6">
                            <textarea class="form-control" rows=5 name="txt_retroalimentacion[]"></textarea>
                        </div>
                        <div class="col-1">
                            <img src="img/delete.jpg" height="30px" class="closeBtn">
                        </div>
                    </div>


                </div>
            </div>
            `
    };
    addBtn.addEventListener('click',evento,true);
</script>