<?php
class usuario_model{
    private $db;
    private $usuario;
    private $objetoConsulta;
    private $usuarioObjeto;
    
    public function __construct(){
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $this->usuario=array();
    }
    
    // ---------------------------------------------------------------
    // este procedimiento get_usuario() es solo una prueba de listar en el lst_usuarios.php
    // ---------------------------------------------------------------
    public function get_usuario() {
        $consulta=$this->db->query("SELECT idUsuario, nomUsuario, password, estadoUsuario,
                                 idRol, metodo FROM tb_usuario");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->usuario[]=$filas;
        }
        return $this->usuario;        
    }
    // ---------------------------------------------------------------
    protected function SearchUsuarioByName() {
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("SELECT idUsuario, nomUsuario, password, estadoUsuario,
                                 idRol, metodo FROM tb_usuario where nomUsuario='$this->usuarioName'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->objetoConsulta[]=$filas;
         }
        return $this->objetoConsulta;
    }
    
    // ---------------------------------------------------------------
    // este procedimiento SearchNameUsuario() falta probar
    // ---------------------------------------------------------------
    public function SearchDocenteByIdUsuario() {
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select tb_usuario.idUsuario,tb_docente.idDocente as idDocente, tb_docente.fotoDocente as foto, tb_docente.nombre as nomRealUsuario,tb_docente.apePat as apeUsuario from tb_usuario
					inner join tb_docente on tb_usuario.idUsuario=tb_docente.idUsuario
							where tb_usuario.idUsuario='$this->idUsuario'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->usuarioObjeto[]=$filas;
        }
        return $this->usuarioObjeto;
    }
    
    public function SearchEstudianteByIdUsuario() {
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select tb_usuario.idUsuario,tb_estudiante.idEstudiante as idEstudiante, tb_estudiante.fotoEstudiante as foto, tb_estudiante.nombre as nomRealUsuario,tb_estudiante.apePat apeUsuario from tb_usuario
					inner join tb_estudiante on tb_usuario.idUsuario=tb_estudiante.idUsuario
							where tb_usuario.idUsuario='$this->idUsuario'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->usuarioObjeto[]=$filas;
        }
        return $this->usuarioObjeto;
    }
    public function SearchAdministradorByIdUsuario() {
        require_once("config/conexion.php");
        $this->db=Conectar::conexion();
        $consulta=$this->db->query("select tb_usuario.idUsuario,tb_administrativo.idAdministrativo as idAdministrativo, tb_administrativo.fotoAdministrativo as foto, tb_administrativo.nombre as nomRealUsuario,tb_administrativo.apePat apeUsuario from tb_usuario
					inner join tb_administrativo on tb_usuario.idUsuario=tb_administrativo.idUsuario
							where tb_usuario.idUsuario='$this->idUsuario'");
        while($filas=$consulta->fetch(PDO::FETCH_ASSOC)){
            $this->usuarioObjeto[]=$filas;
        }
        return $this->usuarioObjeto;
    }
}
?>
