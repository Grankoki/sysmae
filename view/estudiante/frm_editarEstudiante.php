<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
// ADMINISTRADOR
// frm_editarEstudiante.php
// ----------------------------------

?>

<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 10px">
                <div class="col center">
                    <h5 style="color:white">EDITAR ESTUDIANTE</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12" style="padding: 10px;">


                </div>
            </div>
            <div class="row form-group">
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="?administrador=listarEstudiantes" style="color:white">Back</a>
                </div>
                <div class="col-6 center">
                    <a class="btn btn-primary btn-sm" href="javascript: history.go(+1)" style="color:white">Next</a>
                </div>
            </div>

        </div> <!-- Fin class=col-2 -->


        <div class="col-9" id="div-middle" style="background-color: #E8EAFC; padding-top: 40px">
            <form method="post" action="?administrador=cmd_editarEstudiante" enctype='multipart/form-data'>
                <div class="row form-group">

                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col center">
                                <h4>ACTUALIZACIÓN DE DATOS DEL ESTUDIANTE</h4>
                            </div>
                        </div>
                        <?php $i=0;
                        if($listaEstudiantes!=null){
                            $idEstudiante=$_GET['idEstudiante'];
                            foreach ($listaEstudiantes as $registro){ $i++;
                                if($registro->idEstudiante == $idEstudiante){
                                   // if(isset($_GET['seccion'])){ $seccion=$_GET['seccion']; }else{ $seccion='sin matricula'; }
                                   // if($registro->seccion!=null){ $seccion=$registro->seccion; }else{ $seccion='sin matricula'; }

                                    ?>
                                    <input type="hidden" name="txt_idEstudiante" value="<?php echo $idEstudiante ?>">
                                    <div class="row form-group">
                                        <div class="col-9">
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    Nombres
                                                </div>
                                                <div class="col-4">
                                                    Apellido Paterno
                                                </div>
                                                <div class="col-4">
                                                    Apellido Materno
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <input type="nombres" class="form-control" id="txt_nombre" name="txt_nombre" required="true" value="<?php echo $registro->nombre ?>">
                                                </div>
                                                <div class="col-4">
                                                    <input type="nombres" class="form-control" id="txt_apePat" name="txt_apePat" required="true" value="<?php echo $registro->apePat ?>">
                                                </div>
                                                <div class="col-4">
                                                    <input type="nombres" class="form-control" id="txt_apeMat" name="txt_apeMat" required="true" value="<?php echo $registro->apeMat ?>">
                                                </div>
                                            </div>

                                            <div class="row form-group">
                                                <div class="col-3">
                                                    DNI
                                                </div>
                                                <div class="col-3">
                                                    Género
                                                </div>
                                                <div class="col-3">
                                                    Fec. Nac.
                                                </div>
                                                <div class="col-3">
                                                    Fec. Ingreso
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col-3">
                                                    <input type="nombres" class="form-control" id="txt_dni" name="txt_dni" required="true" value="<?php echo $registro->dniEstudiante ?>">
                                                </div>
                                                <div class="col-3">
                                                    <select name="txt_genero" id="txt_genero" required="true"
                                                            class="form-control" aria-label="Default select example">
                                                        <option value="" disabled selected hidden>Seleccione Genero</option>
                                                        <?php
                                                        foreach ($listaGenero as $mostrar) {
                                                            if($registro->idGenero==$mostrar->idGenero){
                                                                echo "<option value=".$registro->idGenero." selected=".$registro->idGenero.">".$mostrar->desGenero."</option>\n";
                                                            }else{
                                                                echo "<option value=" . $mostrar->idGenero . ">" . $mostrar->desGenero . "</option>\n";
                                                            }
                                                        }
                                                        $seccion = 'NO esta matriculado';
                                                        foreach ($verificarEstudianteMatricula as $verificar) {
                                                            if($verificar->idEstudiante==$idEstudiante){
                                                                $seccion = $verificar->seccion;
                                                                $idSeccion = $verificar->idSeccion;
                                                            }else{
                                                                $seccion = 'NO esta matriculado';
                                                            }
                                                        }
                                                        ?>
                                                    </select>
                                                </div>
                                                <div class="col-3">
                                                    <input type="date" value="<?php echo $registro->fecNac ?>" class="form-control" id="txt_fecNac" name="txt_fecNac" >
                                                </div>
                                                <div class="col-3">
                                                    <input type="date" value="<?php echo $registro->fecIngreso ?>" class="form-control" id="txt_fecIng" name="txt_fecIng" >
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    Apoderado
                                                </div>
                                                <div class="col-3">
                                                    Sección
                                                </div>
                                                <div class="col-3">
                                                    Usuario
                                                </div>

                                            </div>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <input type="nombres" disabled class="form-control" id="txt_apoderado" name="txt_apoderado" value="<?php echo $registro->apoderado ?>">
                                                </div>
                                                <div class="col-3">
                                                    <input type="nombres" disabled class="form-control" id="txt_seccion" name="txt_seccion" required="true" value="<?php echo $seccion ?>">
                                                </div>
                                                <div class="col-3">
                                                    <input type="nombres" disabled class="form-control" id="txt_usuario" name="txt_usuario" required="true" value="<?php echo $registro->nomUsuario ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-10">
                                                    Observación
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-10">
                                                    <textarea class="form-control" rows=3 id="txt_observacion" name="txt_observacion"><?php echo $registro->observacion ?></textarea>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-3">
                                            <div class="row form-group">
                                                <div class="col-6 center border" style="height: 200px; align-content: center; vertical-align: center">
                                                    <?php if(!empty($registro->fotoEstudiante)){
                                                        $nameImagen = $registro->fotoEstudiante; ?>
                                                        <img src="img/user/<?php echo $nameImagen;?>" id="usuario<?php echo $registro->idUsuario;?>" height="200px">
                                                    <?php } else{ echo "sin foto"; }?>
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    Cambiar foto
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-10 center">
                                                    <input type="file" name="foto" id="foto" class="btn btn-primary btn-sm form-control"/>
                                                    <input hidden name="nameImagen" value="<?php echo $registro->fotoEstudiante ?>"/>
                                                    <input hidden name="nameFoto" value="usuario<?php echo $registro->idUsuario ?>"/>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                <?php } }
                        } else{
                            echo "<br><br><br>";
                            echo "NO existen cursos registrados";
                        }?>
                        <div class="row form-group" style="text-align:center">
                            <div class="col-12" style="padding:10px">
                                <button type="submit" class="btn btn-primary btn-sm">Actualizar y Enviar</button>
                            </div>
                        </div>
                    </div> <!-- Fin class=container -->

                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 150px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Cambiar contraseña</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center" style="background-color: #C0D9FF; padding-top: 50px">

                </div>
            </div>
            <script type="text/javascript">
                    function ConfirmDelete(){
                        let respuesta = confirm("Estas seguro de eliminar la matricula del estudiante?");
                        if(respuesta===true){
                            return true;
                        }else{
                            return false;
                        }
                    }
            </script>
            <div class="row form-group">
                <div class="col center">
                    <?php
                      if($seccion=="NO esta matriculado"){ ?>
                        <a class="btn btn-primary btn-sm" href="?administrador=frm_matricularEstudiante&idEstudiante=<?php echo $idEstudiante ?>" style="color:white">Matricular en sección</a>
                    <?php }else{ ?>
                        <a class="btn btn-secondary btn-sm " href="" style="color:white">Estudiante Matriculado</a>
                    <?php } ?>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registro de Cursos</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registro de Unidades</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center" style="background-color: #C0D9FF; padding-top: 100px">

                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <?php if($seccion=="NO esta matriculado"){ ?>
                        <a class="btn btn-secondary btn-sm " href="" style="color:white">Retirar Estudiante</a>
                    <?php }else{ ?>
                        <a class="btn btn-primary btn-sm" href="?administrador=cmd_retirarEstudiante&idSeccion=<?php echo $idSeccion ?>&idEstudiante=<?php echo $idEstudiante ?>" style="color:white" onclick="return ConfirmDelete()">Retirar Estudiante</a>
                    <?php } ?>
                </div>
            </div>
        </div> <!-- Fin class=col-1 -->
    </div> <!-- Fin class=Row               #1F618D            -->
</div> <!-- Fin class=container Fluid       #C0D9FF"  -->
<script>
    // Tamaño maximo del archivo
    const maxSize = 300000;

    // Obtener referencia al elemento
    const $miInput = document.querySelector("#foto");

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