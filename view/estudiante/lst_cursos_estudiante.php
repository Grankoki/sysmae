<?php
// ----------------------------------
// lst_cursos_estudiante.php
// ----------------------------------

?>
	<link rel="stylesheet" href="css/bootstrap.css">
	<script src="js/jquery-3.3.1.slim.min.js"></script>
	<script src="js/popper.min.js"></script>
	<script src="js/bootstrap.min.js"></script>
	<link rel="stylesheet" href="css/mystyle.css">
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
<div class="container-fluid">  
<div class="row form-group">
 	<div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;"> 		
     	<div class="row form-group" style="padding: 10px"> 
     		<div class="col center">     	  		
     			<h5 style="color:white">Cursos del Estudiante</h5>
     		</div>
        </div>
        <div class="row form-group">
            <div class="col-12" style="padding: 10px;">
            <?php
            if($listaCursoEstudiante!=null){
                foreach ($listaCursoEstudiante as $registro){ ?>
            <div class="row form-group">
                <div class="col center">
                    <a class="nav-link nav-white" href="?estudiante=lst_unidadesCursoEstudiante&idSeccion=<?php echo base64_encode($registro->idSeccion)?>
                                        &idCurso=<?php echo base64_encode($registro->idCurso)?>&detalleSeccion=<?php echo $registro->seccion?>
                                                &detalleCurso=<?php echo $registro->curso?>"> <?php
                        echo utf8_encode($registro->curso)?>
                    </a>
                </div>
            </div>
            <?php }
            } else{
                    echo "NO existen cursos registrados";
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
     	
    	
    <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 80px">
    <form method="post">
    <div class="row form-group">
         
            <div class="container" style="background-color: #E8EAFC; padding:50px;">
            	<div class="row form-group">
            			<div class="col center">   
            				<img src="./img/mascota01.gif">
            			</div>  
            	</div>
            	<div class="row form-group">  
            	<div class="col center">          		
            		<font face="Comic sans ms">            		
            			<h1>
            		<?php
            		echo "Hola ".$_SESSION['realNameUsuario']." :)";
            		?>
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


