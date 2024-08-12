<?php
// ----------------------------------
// DOCENTE
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
            <?php foreach ($listaTUCD as $registro){ ?>
            	<div class="row form-group">
            	<div class="col center">
            	<a class="nav-link nav-white " href="?docente=lst_contenidoTUCD&idTema=<?php echo base64_encode($registro->idTema)?>
                							&detalleTema=<?php echo $registro->descripcion?>">
                		<?php echo $registro->descripcion?>
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
                        		<div class="col-12 center">Tarea</div>
                        	</div>
                        	
                        	<?php
                        	if ($listaTareaTUCD!=NULL)
                        	{                        	
                        	foreach ($listaTareaTUCD as $registro){
                        	    $idTarea = $registro['idTarea'];
                                $descripcionTarea = $registro['descripcion'];
                        	?>                        	
                        	<div class="row form-group">
                                <div class="col-9">
                        		<a class="nav-link" href="?tarea=frm_editarTarea&idTarea=<?php echo base64_encode($registro['idTarea'])?>
                                							&detalleTarea=<?php echo $registro['descripcion']?>">
                                		<?php echo $registro["descripcion"]."<br>" ?>
                                </a>
                                </div>
                                <div class="col-1 center">
                                    <a href="?tarea=cmd_estadoTarea&estado=1&idTarea=<?php echo base64_encode($registro['idTarea'])?>">
                                        <img height="25px" src="./img/mostrar.png">
                                    </a>
                                </div>
                                <div class="col-1 center">
                                    <a href="?tarea=cmd_estadoTarea&estado=0&idTarea=<?php echo base64_encode($registro['idTarea'])?>">
                                        <img height="25px" src="./img/ocultar.png">
                                    </a>
                                </div>
                            </div>
                            <div class="row form-group">                        		                    		
                        		<div class="col-12">
                        			<textarea style="background: transparent; border:none" class="form-control" rows="5" disabled><?php echo $registro['enunciado'] ?></textarea>
                        		</div>
                        	</div>                        	
                        	<div class="row form-group">                        		                      		
                        		<div class="col-6"><?php echo "Inicia  : ".$registro['fechaInicio'] ?></div>
                        		<div class="col-6"><?php echo "Finaliza: ".$registro['fechaTermino'] ?></div>
                        	</div>                            
                            <div class="row form-group">
                        		<div class="col-1"></div>      
                        		<?php 
                        		if(!empty($registro['documento'])){                        		    
                        		?>
                        			<div class="col-6">
                            			<img height="30px" src="./img/iconoDoc01.png">
                            			<font color="#123B81">
                            			<b><?php echo $registro['documento'] ?></b>
                        				</font>
                        			</div>
                        			<div class="col-2">
                                        <a href="./img/documentos/uploads/<?php echo $registro['documento'] ?>" download="">
                                            <?php echo "Descargar" ?>
                                        </a>
                        			</div>
                        			<div class="col-1">
                                        <a href="./img/documentos/uploads/<?php echo $registro['documento'] ?>" download="">
                                            <img height="30px" src="./img/descarga01.png">
                                        </a>
                        			</div>
                        			<div class="col-1">
                        				<a href="?tarea=cmd_retirarDocumento&idTarea=<?php echo $idTarea; ?>">
                        					<img height="30px" src="./img/delete.jpg">
                        				</a>
                        			</div>
                            <?php }else{        
                                    
                                } ?>
                        	</div>
                                <div class="row form-group">
                                    <div class="col center">
                                        <a class="btn btn-primary btn-sm" href="?docente=lst_revisarTareaEstudiante&idTarea=<?php echo $idTarea?>&descripcionTarea=<?php echo $descripcionTarea; ?>" style="color:white">Revisar Tarea</a>
                                    </div>
                                </div>
                        	<hr>
                            <?php }
                        	}?>
                        </div>
                        
                        <div class="col-6" id="evaluacion">
                        	<div class="row form-group">                        		                      		
                        		<div class="col-12 center">Evaluación</div>
                        	</div>
                        	<?php 
                        	if ($listaEvaluacionTUCD!=NULL)
                        	{
                        	    foreach ($listaEvaluacionTUCD as $registro){
                                    $idEvaluacion = $registro['idEvaluacion']; ?>
                        	<div class="row form-group">
                                <div class="col-10">
                        		<a class="nav-link" href="?evaluacion=frm_editarEvaluacion&idEvaluacion=<?php echo base64_encode($registro['idEvaluacion'])?>
                                							&detalleEvaluacion=<?php echo $registro['titulo']?>">
                                		<?php echo $registro["titulo"]."<br>" ?>
                                </a>
                                </div>
                                <div class="col-1 center">
                                    <a href="?evaluacion=cmd_estadoEvaluacion&estado=1&idEvaluacion=<?php echo base64_encode($registro['idEvaluacion'])?>">
                                        <img height="25px" src="./img/mostrar.png">
                                    </a>
                                </div>
                                <div class="col-1 center">
                                    <a href="?evaluacion=cmd_estadoEvaluacion&estado=0&idEvaluacion=<?php echo base64_encode($registro['idEvaluacion'])?>">
                                        <img height="25px" src="./img/ocultar.png">
                                    </a>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-1">  </div>
                                <div class="col-9">
                                    <div class="row">
                                    Inicia: <?php echo $registro['fechaInicio']; ?>
                                    </div>
                                    <div class="row">
                                    Finaliza: <?php echo $registro['fechaTermino']; ?>
                                    </div>
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col-1">  </div>
                                <div class="col-9">
                                    Duración : <?php echo $registro['limiteTiempo']; ?> minutos
                                </div>
                            </div>
                            <div class="row form-group">
                                <div class="col center">
                                    <a class="btn btn-primary btn-sm" href="?docente=lst_revisarEvaluacionEstudiante&idEvaluacion=<?php echo $idEvaluacion?>" style="color:white">Revisar Evaluación</a>
                                </div>
                            </div>
                            <?php }
                        	}?>

                        </div>
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
                     			<a class="btn btn-primary btn-sm" href="?evaluacion=frm_registrarEvaluacion" style="color:white">Registrar Evaluación</a>
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