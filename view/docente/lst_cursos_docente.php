<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
// ----------------------------------
// lst_cursos_docente.php
// ----------------------------------

?>

	<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">  
<div class="row form-group">
 	<div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;"> 		
     	<div class="row form-group" style="padding: 10px"> 
     		<div class="col center">     	  		
     			<h5 style="color:white">Cursos del Docente</h5>
     		</div>
        </div>       
        <div class="row form-group">
        	<div class="col-12" style="padding: 10px;">        	
            <?php
            if($listaCursoDocente!=null){
                foreach ($listaCursoDocente as $registro){ ?>
            	<div class="row form-group">
            	<div class="col center">
            	<a class="nav-link nav-white" href="?docente=lst_unidadesCursoDocente&idSeccion=<?php echo base64_encode($registro['idSeccion'])?>
                					&idCurso=<?php echo base64_encode($registro['idCurso'])?>&detalleSeccion=<?php echo $registro['seccion']?>
                							&detalleCurso=<?php echo $registro['curso']?>"> <?php                    
                    echo $registro["seccion"]."<br>";
                	echo $registro["curso"]."<br>";                	
                ?>
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
            				<img src="./img/logo01.jpg">
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


