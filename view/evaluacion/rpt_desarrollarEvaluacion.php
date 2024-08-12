<?php
// ----------------------------------
// ESTUDIANTE - REPORTE DESARROLLO EVALUACION
// rpt_desarrollarEvaluacion.php
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
            <form method="post">
                <div class="row form-group">
                    <div class="col center">
                        <h2><br>REPORTE EVALUACION </h2>
                    </div>
                </div> <!-- Fin row from-group -->
                <div class="row form-group">
                        <div class="col center">
                            <h3><?php echo "Puntaje Total: ".$puntajeTotal;?></h3>
                            <?php
                            if($puntajeTotal>17){
                                ?>
                                <h1>AD</h1>
                                <img src="./img/feliz01.gif" height="300px">
                                <?php
                            }else if($puntajeTotal>13 && $puntajeTotal<=17){
                                ?>
                                <h1>A</h1>
                                <img src="./img/contento01.gif" height="300px">
                                <?php
                            }else if($puntajeTotal>10 && $puntajeTotal<=13){
                                ?>
                                <h1>B</h1>
                                <img src="./img/preocupado01.gif" height="300px">
                                <?php
                            }else {
                                ?>
                                <h1>C</h1>
                                <img src="./img/triste01.gif" height="300px">
                                <?php
                            }
                            ?>
                    </div>
                </div>
                <div class="row form-group"">
                    <div class="col-12 center">
                        <br>
                        <a href="javascript: history.go(-2)" class="btn btn-primary"> Continuar </a>
                    </div>
                </div>
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