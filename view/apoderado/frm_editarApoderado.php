<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
// ADMINISTRADOR
// frm_editarApoderado.php
// ----------------------------------

?>

<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 10px">
                <div class="col center">
                    <h5 style="color:white">Apoderados</h5>
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
            <form method="post" action="?administrador=cmd_editarApoderado" enctype='multipart/form-data'>
                <div class="row form-group">

                    <div class="container" style="background-color: #E8EAFC; padding:20px;">
                        <div class="row form-group">
                            <div class="col center">
                                <h4>ACTUALIZACIÓN DE DATOS DEL APODERADO</h4>
                            </div>
                        </div>
                        <?php $i=0;
                        if($listaApoderados!=null){
                            $idApoderado=$_GET['idApoderado'];
                            foreach ($listaApoderados as $registro){ $i++;
                                if($registro->idApoderado == $idApoderado){
                                    ?>
                                    <input type="hidden" name="txt_idApoderado" value="<?php echo $idApoderado ?>">
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
                                                    <input type="nombres" class="form-control" id="txt_nombre" name="txt_nombre" required="true" value="<?php echo $registro->nombre ?>">
                                                    <?php $nomApoderado = $registro->nombre ?>
                                                </div>
                                                <div class="col-4">
                                                    <input type="nombres" class="form-control" id="txt_apePat" name="txt_apePat" required="true" value="<?php echo $registro->apePat ?>">
                                                </div>
                                                <div class="col-4">
                                                    <input type="nombres" class="form-control" id="txt_apeMat" name="txt_apeMat" required="true" value="<?php echo $registro->apeMat ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    Dirección
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-12">
                                                    <input type="nombres" class="form-control" id="txt_direccion" name="txt_direccion" value="<?php echo $registro->direccion ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    E-mail
                                                </div>
                                                <div class="col-2">
                                                    DNI
                                                </div>
                                                <div class="col-2">
                                                    Telf Móvil
                                                </div>
                                                <div class="col-2">
                                                    Telf Fijo
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <input type="nombres" class="form-control" id="txt_email" name="txt_email" value="<?php echo $registro->email ?>">
                                                </div>
                                                <div class="col-2">
                                                    <input type="nombres" class="form-control" id="txt_dni" name="txt_dni" required="true" value="<?php echo $registro->dni ?>">
                                                </div>
                                                <div class="col-2">
                                                    <input type="nombres" class="form-control" id="txt_telfMovil" name="txt_telfMovil" value="<?php echo $registro->telfMovil ?>">
                                                </div>
                                                <div class="col-2">
                                                    <input type="nombres" class="form-control" id="txt_telfFijo" name="txt_telfFijo" value="<?php echo $registro->telfFijo ?>">
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    Observación
                                                </div>
                                                <div class="col-3">
                                                    Fec. Nac.
                                                </div>
                                                <div class="col-3">
                                                    Fec. Ingreso
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-6">
                                                    <input type="nombres" class="form-control" id="txt_observacion" name="txt_observacion" value="<?php echo $registro->observacion ?>">
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
                                                    Distrito
                                                </div>
                                                <div class="col-3">
                                                    Género
                                                </div>
                                            </div>
                                            <div class="row form-group">
                                                <div class="col-4">
                                                    <select name="txt_distrito" id="txt_distrito" required="true"
                                                            class="form-control" aria-label="Default select example">
                                                        <option value="" disabled selected hidden>Seleccione Distrito</option>
                                                        <?php
                                                        foreach ($listaDistrito as $mostrar) {
                                                            if($registro->idDistrito==$mostrar->idDistrito){
                                                                echo "<option value=".$registro->idDistrito." selected=".$registro->idDistrito.">".$mostrar->desDistrito."</option>\n";
                                                            }else{
                                                                echo "<option value=" . $mostrar->idDistrito . ">" . $mostrar->desDistrito . "</option>\n";
                                                            }
                                                        } ?>
                                                    </select>
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
                                        </div>
                                        <div class="col-4">
                                            <div class="row form-group">
                                                  <div class="col-12" style="background-color: #F7F9E6; min-height: 450px;">
                                                      <div class="row form-group center">
                                                          <div class="col-12" style="padding-top: 80px">
                                                            <b> Estudiantes a cargo</b>
                                                          </div>
                                                      </div>
                                                      <div class="row form-group" style="background-color: #ECEFCE;">
                                                          <div class="col-9 center">
                                                              Nombre
                                                          </div>
                                                          <div class="col-3 center">
                                                              DNI
                                                          </div>
                                                      </div>
                                                      <?php if($estudiantesDelApoderado!=null){
                                                      foreach ($estudiantesDelApoderado as $registro){ $i++;?>
                                                      <div class="row form-group">
                                                          <div class="col-9 center ">
                                                              <a href="?administrador=editarEstudiante&idEstudiante=<?php echo $registro->idEstudiante ?>"><?php echo $registro->nombre.' '.$registro->apePat .' '.$registro->apeMat?></a>
                                                          </div>
                                                          <div class="col-3 center ">
                                                              <?php echo $registro->dniEstudiante ?>
                                                          </div>
                                                      </div>
                                                      <?php }
                                                      } ?>
                                                  </div>
                                            </div>

                                        </div>
                                    </div>
                                <?php } }
                        } else{
                            echo "<br><br><br>";
                            echo "NO existen datos registrados";
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


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 200px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?administrador=registrarEstudiante&idApoderado=<?php echo $idApoderado ?>&nomApoderado=<?php echo $nomApoderado ?>" style="color:white">Registrar Estudiante</a>
                </div>
            </div>
            <div class="row form-group">
                <div class="col center" style="background-color: #C0D9FF; padding-top: 100px">

                </div>
            </div>
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?administrador=registrarApoderado" style="color:white">Registrar Apoderado</a>
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


