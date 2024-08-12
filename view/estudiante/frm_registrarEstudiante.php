<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
// ADMINISTRADOR
// frm_registrarEstudiante.php
// ----------------------------------

?>

<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 10px">
                <div class="col center">
                    <h5 style="color:white">DATOS DEL ESTUDIANTE</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12" style="padding: 10px;">


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
            <form method="post" action="?administrador=cmd_registrarEstudiante" enctype='multipart/form-data'>
                <div class="row form-group">

                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col center">
                                <h4>REGISTRAR NUEVO ESTUDIANTE</h4>
                            </div>
                        </div>
                        <?php $i=0; $idApoderado = $_GET['idApoderado'];
                        ?>
                        <input type="hidden" name="txt_idApoderado" id="txt_idApoderado" value="<?php echo $_GET['idApoderado'] ?>">
                        <div class="row form-group">
                            <div class="col-8">
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
                                        <input type="nombres" class="form-control" id="txt_nombre" name="txt_nombre" required="true" placeholder="Ingrese el nombre del estudiante">
                                    </div>
                                    <div class="col-4">
                                        <input type="nombres" class="form-control" id="txt_apePat" name="txt_apePat" required="true" placeholder="Ingrese el apellido paterno">
                                    </div>
                                    <div class="col-4">
                                        <input type="nombres" class="form-control" id="txt_apeMat" name="txt_apeMat" required="true" placeholder="Ingrese el apellido materno">
                                    </div>
                                </div>

                                <div class="row form-group">
                                    <div class="col-6">
                                        Apoderado
                                    </div>
                                    <div class="col-3">
                                        DNI Estudiante
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-6">
                                        <input type="nombres" class="form-control" id="txt_nomApoderado" name="txt_nomApoderado" required="true" value="<?php echo $_GET['nomApoderado'] ?>">
                                    </div>
                                    <div class="col-3">
                                        <input type="nombres" class="form-control" id="txt_dni" name="txt_dni" required="true" placeholder="Ingrese el DNI">
                                    </div>

                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        Observación
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-12">
                                        <input type="nombres" class="form-control" id="txt_observacion" name="txt_observacion" required="true" placeholder="Ingrese alguna observación">
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        Fec. Nac.
                                    </div>
                                    <div class="col-4">
                                        Fec. Ingreso
                                    </div>
                                    <div class="col-3">
                                        Género
                                    </div>
                                </div>
                                <div class="row form-group">
                                    <div class="col-4">
                                        <input type="datetime-local" class="form-control" name="txt_fecNac" required="true">
                                    </div>
                                    <div class="col-4">
                                        <input type="datetime-local" class="form-control" name="txt_fecIng" required="true">
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
                                            } ?>
                                        </select>
                                    </div>
                                </div>
                                <div class="row form-group">

                                </div>
                                <div class="row form-group">


                                </div>
                            </div>
                            <div class="col-4">
                                <div class="row form-group">
                                    <div class="col-6 center border" style="height: 200px; align-content: center; vertical-align: center">
                                        <?php if(!empty($registro->fotoDocente)){
                                            $nameImagen = $registro->fotoDocente; ?>
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
                                        <input hidden name="nameImagen" value="<?php  ?>"/>
                                        <input hidden name="nameFoto" value="usuario<?php  ?>"/>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <div class="row form-group" style="text-align:center">
                            <div class="col-12" style="padding:10px">
                                <button type="submit" class="btn btn-primary btn-sm">Guardar Datos</button>
                            </div>
                        </div>
                    </div> <!-- Fin class=container -->

                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 200px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registrar Docente</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center" style="background-color: #C0D9FF; padding-top: 100px">

                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="#" style="color:white">Registro de Secciones</a>
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


