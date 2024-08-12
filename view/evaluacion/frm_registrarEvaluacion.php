<?php
// ----------------------------------
// EVALUACION
// frm_registrarEvaluacion.php
// ---------------------------

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
                    <a class="btn btn-primary btn-sm" href="?button=button_backCurse" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>

        </div> <!-- Fin class=col-2 -->


        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
            <form action='?evaluacion=cmd_registrarEvaluacion' method='post'>
                <div class="row form-group">
                    <div class="col-12">
                        <br>
                        <h2>Registro de Evaluaciones</h2>
                        <?php
                        echo 'idTema: '.$_SESSION['idTema'];
                        ?>
                        <input type="hidden" name="txt_idTema" value="<?php echo $_SESSION['idTema']?>">
                        <input type="hidden" name="action" value="registrar">
                    </div>
                </div>


                <div class="row form-group">
                    <div class="col-sm-12">
                    <label for="descripcion">Título:</label>
                    <input type="nombres" class="form-control" id="txt_titulo" name="txt_titulo" required="true" placeholder="Ingrese el título de la evaluación">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-sm-12">
                    <label for="descripcion">Descripción:</label>
                    <input type="text" class="form-control" id="txt_descripcion" name="txt_descripcion" required="true" placeholder="Ingrese la descripción de la evaluación">
                    </div>
                </div>

                <div class="row form-group">
                    <div class="col-2">
                        <label for="idIntentos">Intentos:</label>
                        <select name="cbx_intentos" id="cbx_intentos" class="form-control" aria-label="Default select example">
                            <?php
                            $i=1;
                            while($i<=5){
                                //
                                echo "<option value=".$i.">".$i."</option>\n";
                                $i=$i+1;
                            }
                            ?>
                        </select>
                    </div>





                </div>
                <div class="row form-group" >
                    <div class="col-sm-3">
                        <label for="fechaInicio">Inicia:</label>
                        <input type="datetime-local" name="fechaInicio" class="form-control">
                    </div>
                    <div class="col-sm-3">
                        <label for="fechaTermino">Finaliza:</label>
                        <input type="datetime-local" name="fechaTermino" class="form-control">
                    </div>
                </div>

                <button type="submit" class="btn btn-primary btn-lm">Guardar cambios y agregar preguntas</button>
                <button type="submit" class="btn btn-primary btn-lm">Guardar cambios y volver al curso</button>
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
