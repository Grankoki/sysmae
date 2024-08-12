<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once("config/connection.php");
require_once("model/matricula_model.php");

class evaluacion_estudiante_model {
    protected $idRespuestaEstudiante;
    protected $intento;
    public function crearPorIdseccion($idSeccion, $idEvaluacion, $intentos)
    {
        try {
            $modelMatricula = new matricula_model();
            $data = $modelMatricula->obtener_por_id_seccion($idSeccion);
            $ic = new Connection();
            foreach ($data as $key => $value) {
                $idEstudiante = $value->idEstudiante;
                $sql ="INSERT INTO tb_evaluacion_estudiante (idEstudiante, idEvaluacion, intentos) VALUES (?, ?, ?)";
                $insertar = $ic->db->prepare($sql);
                $insertar->bindParam(1,$idEstudiante);
                $insertar->bindParam(2,$idEvaluacion);
                $insertar->bindParam(3,$intentos);
                $insertar->execute();
            }
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }

    public function SearchEvaluationLastTry($idEvaluacion, $idEstudiante){
        $ic = new Connection();
        $sql = "SELECT max(intento) as intento FROM tb_respuesta_estudiante where idEvaluacion='$idEvaluacion' and idEstudiante='$idEstudiante'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        //$objetoConsulta = $consulta->fetchAll(PDO::FETCH_ASSOC);
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        return $row['intento'];
        //return $objetoConsulta;
    }
    public function InsertStudentAnswers($matrizRptaRadio, $matrizRptaCheck,$matrizRptaVF, $intentos, $idEvaluacion, $idEstudiante,$intentoLast){
        try {
            $ic = new Connection();
            $puntajePrg=0; $puntajeTotal=0;
            $intentos = $intentos - 1;
            if($intentoLast==null){ $intento = 1; }else{ $intento = $intentoLast+1; }
            if($matrizRptaRadio!=null){
                $i=0;
                foreach($matrizRptaRadio as $registro){
                    $puntajePrg=$matrizRptaRadio[$i][1]*$matrizRptaRadio[$i][2];
                    $puntajeTotal=$puntajeTotal+$puntajePrg;
                    $idPregunta = $matrizRptaRadio[$i][0];
                    $estado = 1;
                    $sql ="INSERT INTO tb_respuesta_estudiante (idEvaluacion, idEstudiante, estado, calificacion, idPregunta, intento) VALUES (?, ?, ?, ?, ?, ?)";
                    $insertar = $ic->db->prepare($sql);
                    $insertar->bindParam(1,$idEvaluacion);
                    $insertar->bindParam(2,$idEstudiante);
                    $insertar->bindParam(3,$estado);
                    $insertar->bindParam(4,$puntajePrg);
                    $insertar->bindParam(5,$idPregunta);
                    $insertar->bindParam(6,$intento);
                    $insertar->execute();
                    $this->idRespuestaEstudiante = $ic->db->lastInsertId();

                    $opcSeleccionada = $matrizRptaRadio[$i][3];
                    $sql ="INSERT INTO tb_respuesta_multiple (idRespuestaEstudiante, opcionSeleccionada, estado) VALUES (?, ?, ?)";
                    $insertar = $ic->db->prepare($sql);
                    $insertar->bindParam(1,$this->idRespuestaEstudiante);
                    $insertar->bindParam(2,$opcSeleccionada);
                    $insertar->bindParam(3,$estado);
                    $insertar->execute();
                    $i++;
                }
            }else {
                echo "<br>no se han seleccionado opciones RADIO <br>";
            }

            if($matrizRptaCheck!=null) {
                $i=0;
                foreach($matrizRptaCheck as $registro){
                    $puntajePrg=$matrizRptaCheck[$i][1]*$matrizRptaCheck[$i][2];
                    $puntajeTotal=$puntajeTotal+$puntajePrg;
                    $idPregunta = $matrizRptaCheck[$i][0];
                    $estado = 1;
                    $sql ="INSERT INTO tb_respuesta_estudiante (idEvaluacion, idEstudiante, estado, calificacion, idPregunta, intento) VALUES (?, ?, ?, ?, ?, ?)";
                    $insertar = $ic->db->prepare($sql);
                    $insertar->bindParam(1,$idEvaluacion);
                    $insertar->bindParam(2,$idEstudiante);
                    $insertar->bindParam(3,$estado);
                    $insertar->bindParam(4,$puntajePrg);
                    $insertar->bindParam(5,$idPregunta);
                    $insertar->bindParam(6,$intento);
                    $insertar->execute();
                    $this->idRespuestaEstudiante = $ic->db->lastInsertId();

                    $opcSeleccionada = $matrizRptaCheck[$i][3];
                    $sql ="INSERT INTO tb_respuesta_multiple (idRespuestaEstudiante, opcionSeleccionada, estado) VALUES (?, ?, ?)";
                    $insertar = $ic->db->prepare($sql);
                    $insertar->bindParam(1,$this->idRespuestaEstudiante);
                    $insertar->bindParam(2,$opcSeleccionada);
                    $insertar->bindParam(3,$estado);
                    $insertar->execute();
                    $i++;
                }
            }else {
                //echo "<br>no se han seleccionado opciones Checkbox <br>";
            }

            if($matrizRptaVF!=null) {
                $i=0;
                foreach($matrizRptaVF as $registro){
                    $puntajePrg=$matrizRptaVF[$i][1];
                    $idPregunta = $matrizRptaVF[$i][0];
                    $puntajeTotal=$puntajeTotal+$puntajePrg;
                    $estado = 1;
                    $sql ="INSERT INTO tb_respuesta_estudiante (idEvaluacion, idEstudiante, estado, calificacion, idPregunta, intento) VALUES (?, ?, ?, ?, ?, ?)";
                    $insertar = $ic->db->prepare($sql);
                    $insertar->bindParam(1,$idEvaluacion);
                    $insertar->bindParam(2,$idEstudiante);
                    $insertar->bindParam(3,$estado);
                    $insertar->bindParam(4,$puntajePrg);
                    $insertar->bindParam(5,$idPregunta);
                    $insertar->bindParam(6,$intento);
                    $insertar->execute();
                    $this->idRespuestaEstudiante = $ic->db->lastInsertId();

                    $opcSeleccionada = $matrizRptaVF[$i][2];
                    $sql ="INSERT INTO tb_respuesta_vf (idRespuestaEstudiante, opcionSeleccionada, estado) VALUES (?, ?, ?)";
                    $insertar = $ic->db->prepare($sql);
                    $insertar->bindParam(1,$this->idRespuestaEstudiante);
                    $insertar->bindParam(2,$opcSeleccionada);
                    $insertar->bindParam(3,$estado);
                    $insertar->execute();
                    $i++;
                }
            }else {
                echo "<br>no se han seleccionado opciones V F <br>";
            }
            date_default_timezone_set('America/Lima');
            $fechaHoy       = date('Y-m-d H:i:s');
            $sql = "UPDATE tb_evaluacion_estudiante set puntajeTotal='$puntajeTotal', fechaRegistro='$fechaHoy', intentos='$intentos' where idEvaluacion='$idEvaluacion' and idEstudiante='$idEstudiante'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
            if($puntajeTotal<=13){   // $intentos==0 && ESTO SE DEBE COLOCAR DENTRO DEL IF
                $msgPt1='';
                $msgPt2='';
                $ic = new Connection();
                $sql = "SELECT ta.nombre as nomApoderado, ta.email as email, ta.telfMovil as telefono, ta.observacion, te.nombre as nomEstudiante from tb_apoderado ta 
			                inner join tb_estudiante te on te.idApoderado = ta.idApoderado 
                                where idEstudiante ='$idEstudiante'";
                $consulta=$ic->db->prepare($sql);
                $consulta->execute();
                $row = $consulta->fetch(PDO::FETCH_ASSOC);
                $list = [];
                $preguntasIncorrectasT1 = $this->StudendIncorrectAnswersT1($idEvaluacion, $idEstudiante, $intento);
                foreach ($preguntasIncorrectasT1 as $pT1){
                    $list[] = $pT1->nombrePregunta;
                    $msgPt1 = $msgPt1.'<br>'.$pT1->nombrePregunta;
                }
                $preguntasIncorrectasT2 = $this->StudendIncorrectAnswersT2($idEvaluacion, $idEstudiante, $intento);
                foreach ($preguntasIncorrectasT2 as $pT2){
                    $list[] = $pT1->nombrePregunta;
                    $msgPt2 = $msgPt2.'<br>'.$pT2->nombrePregunta;
                }

//                require 'src/PHPMailer/src/Exception.php';
//                require 'src/PHPMailer/src/PHPMailer.php';
//                require 'src/PHPMailer/src/SMTP.php';

                $para = $row['email'];
                $asunto = 'Temas por repasar';
                $mensaje = 'Sr.(a) '.$row['nomApoderado'].'<br>Se le hace llegar los temas que '.$row['nomEstudiante'].' debe repasar<br>'.
                            $msgPt1.$msgPt2;
                $response = $this->sendMail($para, $asunto, 'recommendation-notification', [
                    'senderContent' => $mensaje,
                    'courseTopics' => $list,
                ]);
               // var_dump($response);
//                $mail = new PHPMailer(true);
//                $mail->isSMTP();
//                $mail->Host = 'smtp.gmail.com';
//                $mail->SMTPAuth = true;
//                $mail->Username = 'iep.mae.computo@gmail.com';
//                $mail->Password = 'arvwviixowpsalqk';
//                $mail->SMTPSecure = 'ssl';
//                $mail->Port = 465;
//                $mail->setFrom('iep.mae.computo@gmail.com');
//                $mail->addAddress($para);
//                $mail->isHTML(true);
//                $mail->Subject = $asunto;
//                $mail->Body = $mensaje;
//                $mail->send();
            }
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
        return $puntajeTotal;
    }

    public function sendMail($to, $subject, $templateName, $data)
    {
        $sendData = [
            'data' => $data,
            'templateName' => $templateName,
            'to' => $to,
            'subject' => $subject
        ];

        $jsonData = json_encode($sendData);

        // Inicializar cURL
        $ch = curl_init();

        // Configurar la URL, el método POST, y otros parámetros
        curl_setopt($ch, CURLOPT_URL, 'https://school-microservice-v2notification.000webhostapp.com/v2/notification/mail');
        curl_setopt($ch, CURLOPT_POST, true);
        curl_setopt($ch, CURLOPT_POSTFIELDS, $jsonData);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($jsonData)
        ]);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

        // Ejecutar la solicitud
        $response = curl_exec($ch);

        // Manejar errores
        if (curl_errno($ch)) {
            echo 'Error:' . curl_error($ch);
        }

        // Cerrar cURL
        curl_close($ch);

        // Devolver la respuesta
        return $response;
    }
    public function StudentsListWithLowScore($idEvaluacion)
    {
        $ic = new Connection();
        $sql = "select idEvaluacion, tb_evaluacion_estudiante.idEstudiante as idEstudiante, intentos, concat(tb_estudiante.apePat,' ',tb_estudiante.apeMat,' ',
                        tb_estudiante.nombre) as 'nomEstudiante', puntajeTotal, fechaRegistro, tb_apoderado.nombre as apoderado, tb_apoderado.email as email
                        from tb_evaluacion_estudiante
                        inner join tb_estudiante on tb_estudiante.idEstudiante = tb_evaluacion_estudiante.idEstudiante and idEvaluacion='$idEvaluacion' and puntajeTotal<=13
                        inner join tb_apoderado on tb_apoderado.idApoderado = tb_estudiante.idApoderado";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function StudentsWithLowScore($idUnidad)
    {
        $ic = new Connection();
        $sql = "select te.idTema, tee.idEstudiante, tee.idEvaluacion, concat(tes.apePat,' ',tes.apeMat,' ',tes.nombre) as nombre, tee.puntajeTotal, tee.fechaRegistro from tb_evaluacion_estudiante tee
                inner join tb_evaluacion ev
                inner join tb_tema te
                inner join tb_estudiante tes
                inner join tb_unidad tu
            where tu.idUnidad = '$idUnidad' and te.idTema = ev.idTema and tu.idUnidad = te.idUnidad
            and ev.idEvaluacion=tee.idEvaluacion and tes.idEstudiante=tee.idEstudiante and puntajeTotal<14;";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function StudendIncorrectAnswersT1($idEvaluacion, $idEstudiante, $intento)
    {
        $ic = new Connection();
        $sql = "SELECT tre.idEvaluacion, tre.idEstudiante, tre.idRespuestaEstudiante, tre.calificacion, tre.idPregunta, tre.intento, 
                        p.idTipoPregunta, trm.opcionSeleccionada, p.nombrePregunta as nombrePregunta, t.descripcion as tema
                            from tb_respuesta_estudiante tre
                        inner join tb_pregunta p on p.idPregunta = tre.idPregunta
                        inner join tb_respuesta_multiple trm on trm.idRespuestaEstudiante = tre.idRespuestaEstudiante
                        inner join tb_tema t on t.idTema = p.idTema
                        where tre.idEvaluacion='$idEvaluacion' and tre.idEstudiante='$idEstudiante' and tre.intento='$intento' and calificacion=0 group by idPregunta";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function StudendIncorrectAnswersT2($idEvaluacion, $idEstudiante, $intento)
    {
        $ic = new Connection();
        $sql = "select tre.idEvaluacion, tre.idEstudiante, tre.idRespuestaEstudiante, tre.calificacion, tre.idPregunta, tre.intento, 
                p.idTipoPregunta, trvf.opcionSeleccionada, p.nombrePregunta as nombrePregunta, t.descripcion as tema
                    from tb_respuesta_estudiante tre
                inner join tb_pregunta p on p.idPregunta = tre.idPregunta
                inner join tb_respuesta_vf trvf on trvf.idRespuestaEstudiante = tre.idRespuestaEstudiante
                inner join tb_tema t on t.idTema = p.idTema
                where tre.idEvaluacion='$idEvaluacion' and tre.idEstudiante='$idEstudiante' and tre.intento='$intento' and calificacion=0;";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListStudentsEvaluationByTopic($idEvaluacion){
        $ic = new Connection();
        $sql = "SELECT idEvaluacion, tb_evaluacion_estudiante.idEstudiante as idEstudiante, intentos, concat(tb_estudiante.apePat,' ',tb_estudiante.apeMat,' ',tb_estudiante.nombre) as 'nomEstudiante', puntajeTotal, fechaRegistro 
				from tb_evaluacion_estudiante inner join tb_estudiante on tb_estudiante.idEstudiante = tb_evaluacion_estudiante.idEstudiante and idEvaluacion='$idEvaluacion' order by tb_estudiante.apePat";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListStudentsEvaluationAlternativesType1($idEvaluacion, $idEstudiante, $intento){
        $ic = new Connection();
        $sql = "SELECT tre.idEvaluacion, tre.idEstudiante, tre.idRespuestaEstudiante, tre.calificacion, tre.idPregunta, tre.intento, 
	                p.idTipoPregunta, trm.opcionSeleccionada from tb_respuesta_estudiante tre
	                        inner join tb_pregunta p on p.idPregunta = tre.idPregunta
                            inner join tb_respuesta_multiple trm on trm.idRespuestaEstudiante = tre.idRespuestaEstudiante
                            where tre.idEvaluacion='$idEvaluacion' and tre.idEstudiante='$idEstudiante' and tre.intento='$intento'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function ListStudentsEvaluationAlternativesType2($idEvaluacion, $idEstudiante, $intento){
        $ic = new Connection();
        $sql = "SELECT tre.idEvaluacion, tre.idEstudiante, tre.idRespuestaEstudiante, tre.calificacion, tre.idPregunta, tre.intento, 
	                p.idTipoPregunta, tvf.opcionSeleccionada from tb_respuesta_estudiante tre
                            inner join tb_pregunta p on p.idPregunta = tre.idPregunta
                            inner join tb_respuesta_vf tvf on tvf.idRespuestaEstudiante = tre.idRespuestaEstudiante
                            where tre.idEvaluacion='$idEvaluacion' and tre.idEstudiante='$idEstudiante' and tre.intento='$intento'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SendEmailTopicToReview($idEstudiante,$preguntasIncorrectasT1, $preguntasIncorrectasT2) {
        $ic = new Connection();
        $sql = "SELECT ta.nombre, ta.email as email, ta.observacion from tb_apoderado ta inner join tb_estudiante te on te.idApoderado = ta.idApoderado where idEstudiante = '$idEstudiante'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        //return $row['email'];
        foreach ($preguntasIncorrectasT1 as $pT1){
            $msgT1 = $msgT1.'<br>'.$pT1->nombrePregunta;
        }

        require 'src/PHPMailer/src/Exception.php';
        require 'src/PHPMailer/src/PHPMailer.php';
        require 'src/PHPMailer/src/SMTP.php';

        $para = $row['email'];
        $asunto = 'Temas por repasar';
        $mensaje = 'Temas a repasar<br>'.$msgT1;

        $mail = new PHPMailer(true);
        $mail->isSMTP();
        $mail->Host = 'smtp.gmail.com';
        $mail->SMTPAuth = true;
        $mail->Username = 'iep.mae.computo@gmail.com';
        $mail->Password = 'arvwviixowpsalqk';
        $mail->SMTPSecure = 'ssl';
        $mail->Port = 465;
        $mail->setFrom('iep.mae.computo@gmail.com');
        $mail->addAddress($para);
        $mail->isHTML(true);
        $mail->Subject = $asunto;
        $mail->Body = $mensaje;
        $mail->send();

        $msg = "msg enviado";
        return $msg;
    }
}

?>