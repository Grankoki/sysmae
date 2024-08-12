<?php
if (@$_GET['login']=='loginOk') {
    require_once('login/login.php');
}if (@$_GET['login']=='btn_logOut') {
    require_once('controller/login_controller.php');
}if (@$_GET['menu']=='btn_login') {
    require_once('view/login/login.php');
}if (@$_GET['login']=='usuarioLogin') {
    require_once('controller/login_controller.php');
}
if (@$_GET['button']=='button_backCurse') {
    require_once('controller/docente_controller.php');
}if (@$_GET['button']=='button_backEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['button']=='button_backCourseEst') {
    require_once('controller/estudiante_controller.php');
}

if (@$_GET['menu']=='btn_inicio') {
    require_once('view/base/portada.php');
}if (@$_GET['menu']=='btn_nosotros') {
    require_once('view/base/nosotros.php');
}if (@$_GET['menu']=='btn_preguntas_frecuentes') {
    require_once('view/login/lst_usuarios.php');
}
if (@$_GET['seguimiento']=='lst_cursosDocente') {
    require_once('controller/seguimiento_controller.php');
}if (@$_GET['seguimiento']=='lst_unidadesCursoDocente') {
    require_once('controller/seguimiento_controller.php');
}if (@$_GET['seguimiento']=='lst_estudiantesBPU') {
    require_once('controller/seguimiento_controller.php');
}

// del docente
if (@$_GET['docente']=='lst_cursosDocente') {
    require_once('controller/docente_controller.php');
}if (@$_GET['docente']=='lst_unidadesCursoDocente') {
    require_once('controller/docente_controller.php');
}if (@$_GET['docente']=='lst_temasUCD') {
    require_once('controller/docente_controller.php');
}if (@$_GET['docente']=='lst_contenidoTUCD') {
    require_once('controller/docente_controller.php');
}
if (@$_GET['tarea']=='frm_registrarTarea') {
    require_once('controller/docente_controller.php');
}if (@$_GET['tarea']=='cmd_registrarTarea') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['tarea']=='cmd_retirarDocumento') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['tarea']=='frm_editarTarea') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['tarea']=='cmd_editarTarea') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['tarea']=='cmd_estadoTarea') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['estudiante']=='cmd_retirarDocumentoTareaEstudiante') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['docente']=='lst_revisarTareaEstudiante') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['tarea']=='frm_detalleTareaEstudiante') {
    require_once('controller/tarea_estudiante_controller.php');
}if (@$_GET['tarea']=='cmd_calificarTarea') {
    require_once('controller/tarea_estudiante_controller.php');
}if (@$_GET['docente']=='lst_revisarEvaluacionEstudiante') {
    require_once('controller/evaluacion_estudiante_controller.php');
}
if (@$_GET['evaluacion']=='frm_registrarEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='cmd_registrarEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='frm_editarEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='cmd_editarEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='lst_preguntasTema') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='lst_preguntasTemaForSelec') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='frm_agregarPregunta') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='cmd_agregarPregunta') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='frm_editarPreguntaEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='cmd_editarPreguntaEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='cmd_retirarPregunta') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='cmd_estadoEvaluacion') {
    require_once('controller/evaluacion_controller.php');
}if (@$_GET['evaluacion']=='frm_detalleEvaluacionEstudiante') {
    require_once('controller/evaluacion_estudiante_controller.php');
}
if (@$_GET['pregunta']=='frm_registrarPregunta') {
    require_once('controller/pregunta_controller.php');
}if (@$_GET['pregunta']=='cmd_registrarPregunta') {
    require_once('controller/pregunta_controller.php');
}
if (@$_GET['registro']=='lst_cursosDocente') {
    require_once('controller/calificacion_controller.php');
}if (@$_GET['registro']=='lst_unidadesCursoDocente') {
    require_once('controller/calificacion_controller.php');
}if (@$_GET['registro']=='lst_calificacionesUCD') {
    require_once('controller/calificacion_controller.php');
}


// del estudiante
if (@$_GET['estudiante']=='lst_cursosEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='lst_unidadesCursoEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='lst_temasUCE') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='lst_contenidoTUCE') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='frm_desarrollarEvaluacion') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='cmd_desarrollarEvaluacion') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='frm_desarrollarTarea') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['estudiante']=='cmd_desarrollarTarea') {
    require_once('controller/tarea_controller.php');
}if (@$_GET['estudiante']=='cmd_enviarEmail') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['estudiante']=='frm_verCalificacion') {
    require_once('controller/tarea_estudiante_controller.php');
}if (@$_GET['estudiante']=='frm_verEvaluacion') {
    require_once('controller/evaluacion_estudiante_controller.php');
}
// del administrador
if (@$_GET['administrador']=='listarDocentes') {
    require_once('controller/docente_controller.php');
}if (@$_GET['administrador']=='editarDocente') {
    require_once('controller/docente_controller.php');
}if (@$_GET['administrador']=='cmd_editarDocente') {
    require_once('controller/docente_controller.php');
}if (@$_GET['administrador']=='registrarDocente') {
    require_once('controller/docente_controller.php');
}if (@$_GET['administrador']=='cmd_registrarDocente') {
    require_once('controller/docente_controller.php');
}
if (@$_GET['administrador']=='listarApoderados') {
    require_once('controller/apoderado_controller.php');
}if (@$_GET['administrador']=='editarApoderado') {
    require_once('controller/apoderado_controller.php');
}if (@$_GET['administrador']=='cmd_editarApoderado') {
    require_once('controller/apoderado_controller.php');
}if (@$_GET['administrador']=='registrarApoderado') {
    require_once('controller/apoderado_controller.php');
}if (@$_GET['administrador']=='cmd_registrarApoderado') {
    require_once('controller/apoderado_controller.php');
}
if (@$_GET['administrador']=='listarEstudiantes') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='cmd_buscarNombre') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='editarEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='cmd_editarEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='registrarEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='cmd_registrarEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='listarEstudiantesGeneral') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='cmd_buscarNombreGeneral') {
    require_once('controller/estudiante_controller.php');
}
if (@$_GET['administrador']=='frm_matricularEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='cmd_matricularEstudiante') {
    require_once('controller/estudiante_controller.php');
}if (@$_GET['administrador']=='cmd_retirarEstudiante') {
    require_once('controller/estudiante_controller.php');
}
?>
