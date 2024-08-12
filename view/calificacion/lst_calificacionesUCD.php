<?php
// ----------------------------------
// REGISTRO
// lst_unidadesCurso.php
// ----------------------------------
?>
<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 1px">
                <div class="col center">
                    <h5 style="color:white">Registro de Calificaciones</h5>
                    <h6 style="color:white"><?php echo $_SESSION['detalleCurso']?></h6>
                    <h6 style="color:white"><?php echo $_SESSION['detalleSeccion']?></h6>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12" style="padding: 1px">
                    <?php
                    if($listaUCD!=null){
                        foreach ($listaUCD as $registro){ ?>
                            <div class="row form-group">
                                <div class="col center">
                                    <a class="nav-link nav-white" href="?registro=lst_calificacionesUCD&idUnidad=<?php echo base64_encode($registro->idUnidad)?>
                                        &detalleUnidad=<?php echo $registro->descripcion?>">
                                        <?php echo $registro->descripcion ?>
                                    </a>
                                </div>
                            </div>
                        <?php }
                    } else{
                        echo "NO existen DATOS registrados";
                    }?>

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


        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 30px">
            <form method="post">
                <div class="row form-group">

                    <div class="container" style="background-color: #E8EAFC; padding:10px;">
                        <div class="col form-group">
                        <div class="row form-group">
                            <div class="col center">
                                <h4>Registro de Calificaciones</h4>
                                <h4><?php echo $_GET['detalleUnidad'] ?></h4>
                            </div>
                        </div>
                        <div class="row form-group" style="background-color: #294AF0;" >
                            <div class="col-4 center">
                                Apellidos y Nombres
                            </div>
                            <?php $i=0;
                                foreach ($cantTareas as $tareas){ $i++; ?>
                                <div class="col-1 center">
                                    <?php echo 'TA-'.$i;

                                    ?>
                                </div>
                            <?php } $i=0; ?>
                            <?php foreach($cantEvaluaciones as $evaluaciones){ $i++; ?>
                                <div class="col-1 center">
                                    <?php echo 'EV-'.$i; ?>
                                </div>
                            <?php }?>
                        </div>
                            <div class="row form-group">
                                <div class="col-4 ">
                                <?php $i=0;
                                foreach ($registroTareas as $registro){
                                    if($i<$contRegistros){
                                    ?>
                                        <div class="row form-group" style="background-color: #BAD6F5;">
                                            <div class="col-12" >
                                            <?php echo $registro->nombre; ?>
                                            </div>
                                        </div>
                                <?php } $i++;
                                }
                                ?>
                                </div>

                                <?php
                                foreach ($cantTareas as $tareas){ ?>
                                <div class="col-1 center" >
                                    <?php $i=0;
                                    foreach ($registroTareas as $registro){
                                       // if($i<$contRegistros){
                                            if($tareas->idTarea==$registro->idTarea){
                                            ?>
                                            <div class="row form-group" style="background-color: #BAD6F5;">
                                                <div class="col-12 center">
                                                <?php if($registro->calificacion!=null){ echo $registro->calificacion; }else{ echo '-';} ?>
                                                </div>
                                            </div>

                                        <?php
                                            }
                                           // } $i++;
                                    }

                                    ?>
                                </div>
                                <?php
                                } ?>

                                <?php
                                foreach ($cantEvaluaciones as $evaluaciones){ ?>
                                    <div class="col-1 center" >
                                        <?php $i=0;
                                        foreach ($registroEvaluaciones as $registro){
                                            // if($i<$contRegistros){
                                            if($evaluaciones->idEvaluacion==$registro->idEvaluacion){
                                                ?>
                                                <div class="row form-group" style="background-color: #BAD6F5;">
                                                    <div class="col-12 center">
                                                        <?php if($registro->puntajeTotal!=null){ echo $registro->puntajeTotal; }else{ echo '-';} ?>
                                                    </div>
                                                </div>

                                                <?php
                                            }
                                            // } $i++;
                                        }

                                        ?>
                                    </div>
                                    <?php
                                } ?>

                            </div>




                        <div class="row form-group">
                            <div class="col center">

                            </div>
                        </div>
                        </div>
                    </div> <!-- Fin class=container -->

                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 80px" >
            <div class="row form-group">
                <div class="form-group">

                </div>
            </div>
            <div class="row form-group">
                <br>
            </div>
            <div class="row form-group">
                <div class="form-group">

                </div>
            </div>

        </div> <!-- Fin class=col-1 -->
    </div> <!-- Fin class=Row               #1F618D            -->
</div> <!-- Fin class=container Fluid       #C0D9FF"  -->