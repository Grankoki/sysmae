<?php
//header('Content-Type: text/html; charset=ISO-8859-1');
// ADMINISTRADOR
// lst_Estudiantes.php
// ----------------------------------

?>

<link rel="stylesheet" href="css/mystyle.css">
<div class="container-fluid">
    <div class="row form-group">
        <div class="col-2" id="div-left" style="background-color: #115089; padding-top: 80px; min-height: 650px;">
            <div class="row form-group" style="padding: 10px">
                <div class="col center">
                    <h5 style="color:white">LISTA DE ESTUDIANTES</h5>
                </div>
            </div>
            <div class="row form-group">
                <div class="col-12" style="padding: 10px;">
                    <div class="row form-group">
                        <div class="col">
                            <label style="color:white">Buscar por nombre</label>
                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col">
                            <input class="form-control" id="txt_buscar" name="txt_buscar" autofocus>

                        </div>
                    </div>
                    <div class="row form-group">
                        <div class="col" id="list">
                            <a class="btn btn-primary btn-sm" href="?administrador=cmd_buscarNombre" style="color:white">Buscar</a>
                        </div>
                    </div>
                </div>
                <script>
                    document.getElementById('txt_buscar').onkeyup= function() {
                        var valorTxT = document.getElementById('txt_buscar').value;

                        list.innerHTML += `
                                <a class="btn btn-primary btn-sm" href="?administrador=cmd_buscarNombre&txt_buscar=${valorTxT}" style="color:white">Buscar2</a>
                                `
                    }
                </script>
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
                            <div class="col center">
                                <h4>REGISTRO DE ESTUDIANTES</h4>
                            </div>
                        </div>
                        <div class="row form-group" style="background-color: #8BB7BF;">
                            <div class="col-1 center border">
                                Nro
                            </div>
                            <div class="col-4 center border">
                                Nombre y Apellidos
                            </div>
                            <div class="col-2 center border">
                                Usuario
                            </div>
                            <div class="col-1 center border">
                                DNI
                            </div>
                            <div class="col-2 center border">
                                Apoderado
                            </div>
                            <div class="col-2 center border">

                            </div>
                        </div>
                        <?php $i=0;
                        if($listaEstudiantes!=null){
                            foreach ($listaEstudiantes as $registro){ $i++;?>
                                <div class="row form-group">
                                    <div class="col-1 center ">
                                        <?php echo $i; ?>
                                    </div>
                                    <div class="col-3 ">
                                        <?php echo $registro->nombre.' '.$registro->apePat.' '.$registro->apeMat  ?>
                                    </div>
                                    <div class="col-3 center ">
                                        <?php echo $registro->idUsuario ?>
                                    </div>
                                    <div class="col-1 center ">
                                        <?php echo $registro->dniEstudiante ?>
                                    </div>
                                    <div class="col-2 center ">
                                        <?php echo $registro->idApoderado ?>
                                    </div>
                                    <div class="col-2 center ">
                                        <div class="row form-group">
                                            <div class="col-sm-1 center"><a href="?administrador=editarEstudiante&idEstudiante=<?php echo $registro->idEstudiante ?>"><img height="20px" src="./img/modificar.png"></a></div>
                                            <div class="col-sm-1 center"><a href="#"><img height="20px" src="./img/delete.jpg"></a></div>
                                        </div>
                                    </div>
                                </div>
                            <?php }
                        } else{
                            echo "<br><br><br>";
                            echo "NO existen datos registrados";
                        }?>

                    </div> <!-- Fin class=container -->

                </div> <!-- Fin row from-group -->
            </form>
        </div> <!-- Fin class=col-9 -->


        <div class="col-1" id="div-right" style="background-color: #C0D9FF; padding-top: 200px" >
            <div class="row form-group">
                <div class="col center">
                    <a class="btn btn-primary btn-sm" href="?administrador=registrarEstudiante" style="color:white">Registrar Estudiante</a>
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



