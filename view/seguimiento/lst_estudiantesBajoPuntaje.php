<?php
// ----------------------------------
// SEGUIMIENTO
// lst_estudiantesBajoPuntaje.php
// ----------------------------------
?>
<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 1px">
                <div class="col center">
                    <h5 style="color:white">Seguimiento del estudiante</h5>
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
                                    <a class="nav-link nav-white" href="?seguimiento=lst_estudiantesBPU&idUnidad=<?php echo base64_encode($registro->idUnidad)?>
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
                                    <h4>Lista de Alumnos candidatos a Taller de Reforzamiento  </h4>
                                    <h4><?php echo $_GET['detalleUnidad'] ?></h4>
                                </div>
                            </div>
                            <div class="row form-group">
                                    <div class="col-2 center">

                                    </div>
                                    <div class="col-8">
                                        <div class="row form-group" style="background-color: #84A8EB;" >
                                            <div class="col-1 center" >
                                                <?php echo 'Nro' ?>
                                            </div>
                                            <div class="col-6 center">
                                                Apellidos y Nombres
                                            </div>
                                            <div class="col-1 center">
                                                Puntaje
                                            </div>
                                            <div class="col-1 center">
                                                Evaluación
                                            </div>
                                        </div>
                                        <?php $i=1;
                                        foreach ($listaEstudiantesBPU as $registro){        ?>
                                            <div class="row form-group" style="background-color: #F8F9ED;">
                                                <div class="col-1 center" >
                                                    <?php echo $i++; ?>
                                                </div>
                                                <div class="col-6" >
                                                    <?php echo $registro->nombre; ?>
                                                </div>
                                                <div class="col-1 center" >
                                                    <?php if($registro->puntajeTotal>=16.5){
                                                        echo "AD"; ?>
                                                    <?php }else if($registro->puntajeTotal>=12.5 && $registro->puntajeTotal<16.5){
                                                        echo "A"; ?>
                                                    <?php }else if($registro->puntajeTotal>=10.5 && $registro->puntajeTotal<12.5){
                                                        echo "B"; ?>
                                                    <?php }else if($registro->puntajeTotal<10.5 && $registro->puntajeTotal!=null){
                                                        echo "C"; ?>
                                                    <?php } ?>
                                                </div>
                                                <div class="col-1 center" >
                                                    <?php //echo $registro->idEvaluacion; ?>
                                                </div>
                                            </div>
                                        <?php } ?>
                                        <div class="row form-group">
                                            Lista de temas a reforzar:
                                        </div>
                                        <div class="row form-group" style="background-color: #A2BEF2;" >
                                            <div class="col-1 center" >
                                                <?php echo 'Nro' ?>
                                            </div>
                                            <div class="col-10" >
                                                <?php echo 'Temas'; ?>
                                            </div>
                                        </div>
                                            <?php $i=1;
                                            foreach ($listaTemasBPU as $temas){        ?>
                                                <div class="row form-group">
                                                    <div class="col-1 center" >
                                                        <?php echo $i; ?>
                                                    </div>
                                                    <div class="col-10" >
                                                        <?php echo $temas->nombrePregunta; ?>
                                                    </div>
                                                </div>
                                                <?php $i++; } ?>
                                    </div>
                                    <div class="col-2 center">

                                    </div>

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
                    Hola
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
