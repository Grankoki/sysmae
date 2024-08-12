<?php
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\Exception;
require_once("config/connection.php");
class estudiante_model {
    private $db;
    protected $fotoEstudiante;
    protected $estadoEstudiante;
    protected $idEstudiante;
    protected $idApoderado;
    protected $dniEstudiante;
    protected $nombre;
    protected $idUsuario;
    protected $apePat;
    protected $apeMat;
    protected $idGenero;
    protected $fecIngreso;
    protected $observacion;
    protected $fecNac;

    public function SearchCursosEstudiante($idEstudiante){
        $ic = new Connection();
        $sql = "select tb_matricula.idEstudiante, tb_matricula.idSeccion, tb_curso_seccion.idSeccion as idSeccion,
                tb_curso_seccion.idCurso as idCurso, tb_seccion.desSeccion as seccion, 
                tb_curso.descripcion as curso from tb_curso_seccion
			inner join tb_seccion on tb_curso_seccion.idSeccion = tb_seccion.idSeccion
             inner join tb_curso on tb_curso_seccion.idCurso = tb_curso.idCurso
               inner join tb_matricula on tb_seccion.idSeccion = tb_matricula.idSeccion
              where tb_matricula.idEstudiante='$idEstudiante' and  year(tb_curso_seccion.fechaCurso)=YEAR(NOW())";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchStudentsByIdFather($idApoderado){
        $ic = new Connection();
        $sql = "select nombre, apePat, apeMat, dniEstudiante, fecIngreso, fecNac, estadoEstudiante, observacion, idGenero, idEstudiante, idUsuario,fotoEstudiante from tb_estudiante where idApoderado='$idApoderado'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchEvaluacionTUCE($idTema) {
        $ic = new Connection();
        $sql = "SELECT idEvaluacion,titulo,descripcion,fechaInicio,fechaTermino,intentos,limiteTiempo,estado 
                                            from tb_evaluacion where idTema='$idTema'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function VerifyEvaluationTry($idEvaluacion, $idEstudiante) {
        $ic = new Connection();
        $sql = "SELECT * from tb_evaluacion_estudiante where idEvaluacion='$idEvaluacion' and idEstudiante='$idEstudiante'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchStudentsList($nomBuscar,$idSeccion){
        $ic = new Connection();
        $sql = "SELECT ts.desSeccion as seccion, tu.nomUsuario, tu.password, fotoEstudiante, estadoEstudiante, te.idEstudiante, concat(ta.nombre,' ',ta.apePat) as apoderado, dniEstudiante, te.nombre, te.idUsuario, te.apePat, te.apeMat, te.idGenero, te.fecIngreso, te.observacion, te.fecNac from tb_estudiante te
			inner join tb_apoderado ta
            inner join tb_usuario tu
            inner join tb_matricula tm
            inner join tb_seccion ts            
			where te.nombre LIKE '%$nomBuscar%' and ts.idSeccion LIKE '%$idSeccion%' and tu.idUsuario = te.idUsuario and tm.idEstudiante = te.idEstudiante and tm.idSeccion = ts.idSeccion and te.idApoderado = ta.idApoderado and year(ts.fechaCreacion)=YEAR(NOW()) order by te.apePat";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchGeneralStudentsList($nomBuscar){
        $ic = new Connection();
        $sql = "SELECT tu.nomUsuario, tu.password, fotoEstudiante, estadoEstudiante, te.idEstudiante, concat(ta.nombre,' ',ta.apePat) as apoderado, dniEstudiante, te.nombre, te.idUsuario, te.apePat, te.apeMat, te.idGenero, te.fecIngreso, te.observacion, te.fecNac from tb_estudiante te
			inner join tb_apoderado ta
            inner join tb_usuario tu
			where te.nombre LIKE '%$nomBuscar%' and tu.idUsuario = te.idUsuario and te.idApoderado = ta.idApoderado order by te.apePat";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function VerifyStudentRegisteredInSection($idEstudiante){
        $ic = new Connection();
        $sql = "select tm.idEstudiante as idEstudiante, ts.desSeccion as seccion, ts.idSeccion as idSeccion, fecMatricula from tb_matricula tm
	            inner join tb_seccion ts
                where idEstudiante = '$idEstudiante' and ts.idSeccion=tm.idSEccion and year(tm.fecMatricula)=YEAR(NOW());";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        //$row = $consulta->fetch(PDO::FETCH_ASSOC);
        return $objetoConsulta;
    }
    public function SendEmailToFather($idEstudiante) {
        $ic = new Connection();
        $sql = "SELECT ta.nombre, ta.email as email, ta.observacion from tb_apoderado ta inner join tb_estudiante te on te.idApoderado = ta.idApoderado where idEstudiante = '$idEstudiante'";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $row = $consulta->fetch(PDO::FETCH_ASSOC);
        //return $row['email'];

        require 'src/PHPMailer/src/Exception.php';
        require 'src/PHPMailer/src/PHPMailer.php';
        require 'src/PHPMailer/src/SMTP.php';

        $para = $row['email'];
        $asunto = 'Temas por repasar';
        $mensaje = 'Temas a repasar<br>'.
                    'palabra a buscar';

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

    protected function InsertStudent() {
        try {

            $ic = new Connection();
            $this->estado=1;
            $this->year = date('Y');
            $this->password=sha1("mae".$this->year);
            $this->nomUsuario = strtoupper(substr($this->nombre,0,3).substr($this->apePat,0,3).$this->year);
            $this->idRol=6;
            $this->metodo="sha1";

            $sql = "INSERT INTO tb_usuario (nomUsuario, password, estadoUsuario, idRol, metodo) 
                                        VALUES (?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$this->nomUsuario);
            $insertar->bindParam(2,$this->password);
            $insertar->bindParam(3,$this->estado);
            $insertar->bindParam(4,$this->idRol);
            $insertar->bindParam(5,$this->metodo);
            $insertar->execute();
            $this->idUsuario = $ic->db->lastInsertId();

            $this->estadoEstudiante=1;
            $sql = "INSERT INTO tb_estudiante (fotoEstudiante, estadoEstudiante, idApoderado, dniEstudiante, nombre, idUsuario, apePat, apeMat, idGenero, fecIngreso, observacion, fecNac) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$this->fotoEstudiante);
            $insertar->bindParam(2,$this->estadoEstudiante);
            $insertar->bindParam(3,$this->idApoderado);
            $insertar->bindParam(4,$this->dniEstudiante);
            $insertar->bindParam(5,$this->nombre);
            $insertar->bindParam(6,$this->idUsuario);
            $insertar->bindParam(7,$this->apePat);
            $insertar->bindParam(8,$this->apeMat);
            $insertar->bindParam(9,$this->idGenero);
            $insertar->bindParam(10,$this->fecIngreso);
            $insertar->bindParam(11,$this->observacion);
            $insertar->bindParam(12,$this->fecNac);
            $insertar->execute();
            $this->idEstudiante = $ic->db->lastInsertId();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function UpdateStudent(
        $nameFoto,
        $idEstudiante,
        $dni,
        $nombre,
        $apePat,
        $apeMat,
        $genero,
        $fecIng,
        $observacion,
        $fecNac
    ){
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_estudiante SET observacion = '$observacion',
                                          dniEstudiante = '$dni',
                                          apePat = '$apePat',
                                          apeMat = '$apeMat',
                                          fecNac = '$fecNac',
                                          fecIngreso = '$fecIng',
                                          nombre = '$nombre',
                                          idGenero = '$genero',
                                          fotoEstudiante = '$nameFoto'
                  where idEstudiante='$idEstudiante'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }


}



?>