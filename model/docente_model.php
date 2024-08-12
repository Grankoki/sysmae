<?php
require_once("config/connection.php");
class docente_model{
    protected $idEspecialidad;
    protected $observacion;
    protected $estado;
    protected $idDocente;
    protected $idDistrito;
    protected $dni;
    protected $apePat;
    protected $apeMat;
    protected $fecNac;
    protected $fecIng;
    protected $telfMovil;
    protected $direccion;
    protected $telfFijo;
    protected $email;
    protected $idUsuario;
    protected $nombre;
    protected $idGenero;
    protected $fotoDocente;
    private $year;
    private $nomUsuario;
    private $password;
    private $idRol;
    private $metodo;
    private $db;
    //private $usuario;
    private $objetoCurso;
        protected function InsertTeacher() {
        try {

            $ic = new Connection();
            $this->estado=1;
            $this->year = date('Y');
            $this->password=sha1("mae".$this->year);
            $this->nomUsuario = strtoupper(substr($this->nombre,0,3).substr($this->apePat,0,3).$this->year);
            $this->idRol=2;
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

            $sql = "INSERT INTO tb_docente (idEspecialidad, observacion, estado, idDistrito, dni, apePat, apeMat, fecNac, fecIng, telfMovil, direccion, telfFijo, email, idUsuario, nombre, idGenero, fotoDocente) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1,$this->idEspecialidad);
            $insertar->bindParam(2,$this->observacion);
            $insertar->bindParam(3,$this->estado);
            $insertar->bindParam(4,$this->idDistrito);
            $insertar->bindParam(5,$this->dni);
            $insertar->bindParam(6,$this->apePat);
            $insertar->bindParam(7,$this->apeMat);
            $insertar->bindParam(8,$this->fecNac);
            $insertar->bindParam(9,$this->fecIng);
            $insertar->bindParam(10,$this->telfMovil);
            $insertar->bindParam(11,$this->direccion);
            $insertar->bindParam(12,$this->telfFijo);
            $insertar->bindParam(13,$this->email);
            $insertar->bindParam(14,$this->idUsuario);
            $insertar->bindParam(15,$this->nombre);
            $insertar->bindParam(16,$this->idGenero);
            $insertar->bindParam(17,$this->fotoDocente);
            $insertar->execute();
            $this->idDocente = $ic->db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function UpdateTeacher(
        $nombre,
        $apePat,
        $apeMat,
        $direccion,
        $email,
        $dni,
        $telfMovil,
        $telfFijo,
        $observacion,
        $fecNac,
        $fecIng,
        $idEspecialidad,
        $idDistrito,
        $idGenero,
        $fotoDocente,
        $idDocente
    ){
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_docente SET idEspecialidad ='$idEspecialidad',
                                          observacion = '$observacion',                                          
                                          idDistrito  = '$idDistrito',
                                          dni = '$dni',
                                          apePat = '$apePat',
                                          apeMat = '$apeMat',
                                          fecNac = '$fecNac',
                                          fecIng = '$fecIng',
                                          telfMovil = '$telfMovil',
                                          direccion = '$direccion',
                                          telfFijo = '$telfFijo',
                                          email = '$email',                                          
                                          nombre = '$nombre',
                                          idGenero = '$idGenero',
                                          fotoDocente = '$fotoDocente'
                  where idDocente='$idDocente'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function SearchTeacherList(){
        $ic = new Connection();
        $sql = "select te.desEspecialidad as especialidad, te.idEspecialidad, observacion, nombre, apePat, apeMat, dni, fotoDocente, idDocente, idDistrito, fecNac, fecIng, direccion, telfMovil, telfFijo, email, idGenero, estado,idUsuario from tb_docente 
	                inner join tb_especialidad te on te.idEspecialidad = tb_docente.idEspecialidad where estado=1";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
    public function SearchCursosDocente($idDocente) {        
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select tb_curso_seccion.idSeccion as idSeccion,tb_curso_seccion.idCurso as idCurso,tb_seccion.desSeccion as seccion,tb_curso.descripcion as curso from tb_curso_seccion			
			inner join tb_seccion on tb_curso_seccion.idSeccion = tb_seccion.idSeccion
            inner join tb_curso on tb_curso_seccion.idCurso = tb_curso.idCurso
            inner join tb_docente on tb_curso_seccion.idDocente = tb_docente.idDocente
				where tb_docente.idDocente='$idDocente' and  year(tb_curso_seccion.fechaCurso)=YEAR(NOW())");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->objetoCurso[]=$filas;
        }
        return $this->objetoCurso;        
    }

    public function SearchTemasUCD($idUnidad) {
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select idTema, tb_tema.descripcion as descripcion, estado, tb_tema.idUnidad as idUnidad,tb_unidad.idSeccion
                                           as seccion, tb_unidad.idCurso as curso from tb_tema
			                                 inner join tb_unidad on tb_unidad.idUnidad = tb_tema.idUnidad
                                				 where tb_unidad.idUnidad='$idUnidad'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->objetoTema[]=$filas;
        }
        return $this->objetoTema;
    }
    public function SearchTareaTUCD($idTema) {
        require_once("config/conexion.php");
        $cc=0;
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select idTarea, fechaInicio, fechaTermino,idTema,enunciado,descripcion,documento from tb_tarea
    	                                            where idTema='$idTema'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->objetoTarea[]=$filas;
            $cc++;
        }
        if ($cc>0){
            return $this->objetoTarea;
        }
        return null;
        
    }
    public function SearchEvaluacionTUCD($idTema) {
        require_once("config/conexion.php");
        $cc=0;
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select idEvaluacion,titulo,descripcion,fechaInicio,fechaTermino,limiteTiempo,estado 
                                            from tb_evaluacion where idTema='$idTema'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->objetoEvaluacion[]=$filas;
            $cc++;
        }
        
        if ($cc>0){
            return $this->objetoEvaluacion;
        }
        return null;
    }
}
?>
