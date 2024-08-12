<?php
// ----------------------------------
// ESTUDIANTE
// lst_contenido_tema.php
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
            <div class="container" style="background-color: #E8EAFC; padding:20px;">
            	<div class="row form-group">
    				<div class="col center">
    					<h5><b><?php echo $_SESSION['detalleTema']?></b></h5>
    				</div>
            	</div> 
            	<div class="row form-group">
            			<div class="col-6" id="tarea">
                        	<div class="row form-group">
                        		<div class="col-12 center">TAREA</div>
                        	</div>
                        	
                        	<?php
                        	if ($listaTareaTUCE!=NULL)
                        	{   date_default_timezone_set('America/Lima');
                                $fechaHoy = date('Y-m-d H:i:s');
                        	foreach ($listaTareaTUCE as $registro){
                                $dateT1 = $registro->fechaTermino;
                                $dateT2 = $registro->fechaInicio;
                                $diferenciaFin = strtotime($dateT1) - strtotime($fechaHoy);
                                $diferenciaInicio = strtotime($fechaHoy) - strtotime($dateT2);
                                $rangoSegundos = strtotime($dateT1) - strtotime($dateT2);
                        	    $idTarea = $registro->idTarea;
                                if ($registro->estado==1){
                        	?>                        	
                        	<div class="row form-group">
                                <?php if($diferenciaInicio>0 && $diferenciaInicio<=$rangoSegundos && 0 < $diferenciaFin){?>
                                    <a class="nav-link" href="?estudiante=frm_desarrollarTarea&idTarea=<?php echo $registro->idTarea?>">
                                        <?php echo $registro->descripcion ?>
                                    </a>
                                <?php }else{  ?>
                                    <a class="nav-link">
                                        <?php echo $registro->descripcion ?> <br><b>TAREA CERRADA</b>
                                    </a>
                                <?php } ?>
                            </div>
                            <div class="row form-group">                        		                    		
                        		<div class="col-12">
                        			<textarea style="background: transparent; border:none" class="form-control" rows="6" disabled><?php echo $registro->enunciado ?></textarea>
                        		</div>
                        	</div>                        	
                        	<div class="row form-group">                        		                      		
                        		<div class="col-4"><?php echo "Inicia  : ".$registro->fechaInicio ?></div>
                        		<div class="col-4"><?php echo "Finaliza: ".$registro->fechaTermino ?></div>
                        	</div>                            
                            <div class="row form-group">
                        		<div class="col-1"></div>      
                        		<?php 
                        		if(!empty($registro->documento)){
                        		?>
                        			<div class="col-6">
                                        <a href="./img/documentos/uploads/<?php echo $registro->documento ?>" target="_blank">
                            			<img height="30px" src="./img/iconoDoc01.png">
                            			<font color="#123B81">
                            			<b><?php echo $registro->documento ?></b>
                        				</font>
                                        </a>
                        			</div>
                        			<div class="col-2">
                        				<a href="./img/documentos/uploads/<?php echo $registro->documento ?>" download="">
                        					<?php echo "Descargar" ?>                        					
                        				</a>
                        			</div>
                        			<div class="col-1">
                                        <a href="./img/documentos/uploads/<?php echo $registro->documento ?>" download="">
                        					<img height="30px" src="./img/descarga01.png">
                        				</a>
                        			</div>
                        			<div class="col-1">
                        				
                        			</div>
                            <?php }else {
                                } ?>
                            </div>
                            <div class="row form-group">
                                <div class="col center">
                                    <a class="btn btn-primary btn-sm" href="?estudiante=frm_verCalificacion&idTarea=<?php echo $idTarea ?>" style="color:white">Ver calificación</a>
                                </div>
                            </div>
                            <hr>
                            <?php   }       // Fin if ($registro->estado==1)        ?>
                            <?php }     // Fin foreach ($listaTareaTUCE as $registro)
                        	}        // Fin if $listaTareaTUCE!=NULL             ?>
                        </div> <!-- Fin div id=Tarea -->
                        
                        <div class="col-6" id="evaluacion">
                        	<div class="row form-group">
                        		<div class="col-12 center">EVALUACIÓN</div>
                        	</div>
                        	<?php 
                        	if ($listaEvaluacionTUCE!=NULL)
                        	{   date_default_timezone_set('America/Lima');
                                $fechaHoy = date('Y-m-d H:i:s');
                        	    foreach ($listaEvaluacionTUCE as $registro){
                                    $date1 = $registro->fechaTermino;
                                    $date2 = $registro->fechaInicio;
                                    $diferenciaFin = strtotime($date1) - strtotime($fechaHoy);
                                    $diferenciaInicio = strtotime($fechaHoy) - strtotime($date2);
                                    $rangoSegundos = strtotime($date1) - strtotime($date2);
                                    $idEvaluacion = $registro->idEvaluacion;
                                    if ($registro->estado==1){
                                            ?>
                                    <div class="row form-group">
                                        <?php
                                            if($diferenciaInicio>0 && $diferenciaInicio<=$rangoSegundos && 0 < $diferenciaFin){?>
                                                <a class="nav-link" href="?estudiante=frm_desarrollarEvaluacion&idEvaluacion=<?php echo $registro->idEvaluacion ?>">
                                                    <?php echo $registro->titulo ?>
                                                </a>
                                            <?php }else{  ?>
                                                <a class="nav-link">
                                                    <?php echo $registro->titulo ?> <br><b>EVALUACIÓN CERRADA</b>
                                                </a>
                                            <?php } ?>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-12">
                                            <textarea style="background: transparent; border:none" class="form-control" rows="4" disabled><?php echo $registro->descripcion ?></textarea>
                                        </div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col-4"><?php echo "Inicia  : ".$registro->fechaInicio ?></div>
                                        <div class="col-4"><?php echo "Finaliza: ".$registro->fechaTermino ?></div>
                                    </div>
                                    <div class="row form-group">
                                        <div class="col center">
                                            <a class="btn btn-primary btn-sm" href="?estudiante=frm_verEvaluacion&idEvaluacion=<?php echo $idEvaluacion ?>" style="color:white">Ver calificación</a>
                                        </div>
                                    </div>
                                        <?php
                                    }
                                }
                        	}?>    
                        </div> <!-- Fin div id=Evaluacion -->
            	</div>
            	<div class="row form-group">
                    <div class="col-6 center">




                    </div>
                    <div class="col-6 center">

                    </div>
            	</div>
            </div> <!-- Fin class=container -->
        
	</div> <!-- Fin row from-group -->
	</form>
    </div> <!-- Fin class=col-9 -->
	

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