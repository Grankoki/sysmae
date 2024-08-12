<?php
// ----------------------------------
// SEGUIMIENTO
// lst_unidadesCurso.php
// ----------------------------------
?>
<style>
    .content{
        width: 40%;
        margin: 0;
    }
    canvas{
    max-width: 100%;
    }
</style>
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
                        echo "NO existen UNIDADES registradas";
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




        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 40px">
            <form method="post">
                <div class="row form-group">
                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col-3"></div>
                            <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                <div id="chart1" style="width: 100%; min-height: 400px; background-color: white; border-radius:20px">

                                </div>
                            </div>

                            <script src="https://cdnjs.cloudflare.com/ajax/libs/echarts/5.4.0/echarts.min.js"> </script>
                            <script type="text/javascript">
                                var avgUnidad = '<?php echo json_encode($promedioUnidad); ?>';
                                var x = JSON.parse(avgUnidad);
                                const getOptionChar1=()=>{
                                    return {
                                        title: {
                                            text: 'Promedio General del Curso por Unidad'
                                        },
                                        label: {
                                            show: true,
                                            position: 'inside'
                                        },
                                        xAxis: {
                                            type: 'category',
                                            data: ['Un1', 'Un2', 'Un3', 'Un4', 'Un5', 'Un6', 'Un7', 'Un8']
                                        },
                                        yAxis: {
                                            type: 'value'
                                        },
                                        series: [
                                            {
                                                data: x,
                                                type: 'bar'
                                            }
                                        ]
                                    };
                                };

                                const initCharts=()=>{
                                    const chart1 = echarts.init(document.getElementById("chart1"));

                                    chart1.setOption(getOptionChar1());

                                };
                                window.addEventListener("load",()=>{
                                    console.log("ok");
                                    initCharts();
                                });
                            </script>
                        </div>

                        <div class="row form-group">
                        <?php for($i=0; $i<sizeof($promedioFinal); $i++){?>
                            <?php if((($i+1)%3)==0){ ?></div> <div class="row form-group"> <?php } ?>
                                <div class="col-sm-12 col-md-6 col-lg-6 col-xl-6">
                                    <div id="graph<?php echo $i; ?>" style="width: 100%; min-height: 400px; background-color: white; border-radius:20px">

                                    </div>
                                </div>



                            <script type="text/javascript">
                                var avgUnidadFin<?php echo $i ?> = '<?php echo json_encode($promedioFinal[$i]); ?>';
                                var x<?php echo $i ?> = JSON.parse(avgUnidadFin<?php echo $i ?>);
                                var g1<?php echo $i ?>=x<?php echo $i ?>[0];
                                var g2<?php echo $i ?>=x<?php echo $i ?>[1];
                                var g3<?php echo $i ?>=x<?php echo $i ?>[2];
                                var g4<?php echo $i ?>=x<?php echo $i ?>[3];
                                let msg<?php echo $i ?> = 'Promedio de la Unidad '+<?php echo $i+1; ?>;
                                const getOptionGraph<?php echo $i ?>=()=>{
                                    return {
                                        title: {
                                            text: msg<?php echo $i ?>,
                                            subtext: 'Fake Data',
                                            left: 'center'
                                        },
                                        tooltip: {
                                            trigger: 'item'
                                        },
                                        legend: {
                                            orient: 'vertical',
                                            left: 'left'
                                        },
                                        series: [
                                            {
                                                name: 'Access From',
                                                type: 'pie',
                                                radius: '50%',
                                                data: [
                                                    { value: g1<?php echo $i ?>, name: 'AD' },
                                                    { value: g2<?php echo $i ?>, name: 'A' },
                                                    { value: g3<?php echo $i ?>, name: 'B' },
                                                    { value: g4<?php echo $i ?>, name: 'C' }
                                                ],
                                                emphasis: {
                                                    itemStyle: {
                                                        shadowBlur: 10,
                                                        shadowOffsetX: 0,
                                                        shadowColor: 'rgba(0, 0, 0, 0.5)'
                                                    }
                                                }
                                            }
                                        ]
                                    };
                                };
                                    const initGraphs<?php echo $i ?>=()=>{
                                        const graph<?php echo $i ?> = echarts.init(document.getElementById("graph<?php echo $i; ?>"));

                                        graph<?php echo $i ?>.setOption(getOptionGraph<?php echo $i ?>());

                                    };
                                    window.addEventListener("load",()=>{
                                        console.log(x<?php echo $i ?>);
                                        initGraphs<?php echo $i ?>();
                                    });
                            </script>

                        <?php } ?>

                    </div>


                        <div class="row form-group">
                            <div class="col center">
                                    <?php
                                    // print("<pre>" . print_r($promedioFinal, true) . "</pre>");
                                    ?>
                            </div>
                        </div>
                        <div class="row form-group">
                            <div class="col center">
                                <font face="Comic sans ms">
                                    <h1>

                                    </h1>
                                </font>
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