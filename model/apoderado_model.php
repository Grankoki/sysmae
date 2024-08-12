<?php
require_once("config/connection.php");
class apoderado_model
{
    protected $observacion;
    protected $idApoderado;
    protected $dni;

    protected $nombre;
    protected $apePat;
    protected $apeMat;
    protected $fecNac;
    protected $fecIngreso;
    protected $direccion;
    protected $telfMovil;
    protected $telfFijo;
    protected $email;
    protected $estado;
    protected $idDistrito;
    protected $idGenero;

    protected function InsertFather()
    {
        try {

            $ic = new Connection();
            $this->estado = 1;
            $this->year = date('Y');

            $sql = "INSERT INTO tb_apoderado (observacion, dni, nombre, apePat, apeMat, fecNac, fecIngreso, direccion, telfMovil, telfFijo, email, estado, idDistrito, idGenero) 
                        VALUES (?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?, ?)";
            $insertar = $ic->db->prepare($sql);
            $insertar->bindParam(1, $this->observacion);
            $insertar->bindParam(2, $this->dni);
            $insertar->bindParam(3, $this->nombre);
            $insertar->bindParam(4, $this->apePat);
            $insertar->bindParam(5, $this->apeMat);
            $insertar->bindParam(6, $this->fecNac);
            $insertar->bindParam(7, $this->fecIngreso);
            $insertar->bindParam(8, $this->direccion);
            $insertar->bindParam(9, $this->telfMovil);
            $insertar->bindParam(10, $this->telfFijo);
            $insertar->bindParam(11, $this->email);
            $insertar->bindParam(12, $this->estado);
            $insertar->bindParam(13, $this->idDistrito);
            $insertar->bindParam(14, $this->idGenero);
            $insertar->execute();
            $this->idApoderado = $ic->db->lastInsertId();

        } catch (PDOException $e) {
            echo "Error -->: " . $e->getMessage();
        }
    }

    public function UpdateFather(
        $observacion,
        $idApoderado,
        $dni,
        $nombre,
        $apePat,
        $apeMat,
        $fecNac,
        $fecIng,
        $direccion,
        $telfMovil,
        $telfFijo,
        $email,
        $idDistrito,
        $idGenero
    ){
        try {
            $ic = new Connection();
            $sql = "UPDATE tb_apoderado SET observacion = '$observacion',
                                          dni = '$dni',
                                          nombre = '$nombre',
                                          apePat = '$apePat',
                                          apeMat = '$apeMat',
                                          fecNac = '$fecNac',
                                          fecIngreso = '$fecIng',
                                          direccion = '$direccion',
                                          telfMovil = '$telfMovil',                                          
                                          telfFijo = '$telfFijo',                                          
                                          email = '$email', 
                                          idDistrito  = '$idDistrito',
                                          idGenero = '$idGenero'
                  where idApoderado='$idApoderado'";
            $actualizar = $ic->db->prepare($sql);
            $actualizar->execute();
        } catch (PDOException $e) {
            echo "Error -->: ".$e->getMessage();
        }
    }
    public function SearchFatherList(){
        $ic = new Connection();
        $sql = "select observacion,idApoderado, dni, nombre, apePat, apeMat, fecNac, fecIngreso, direccion, telfMovil, telfFijo, email, estado, idDistrito, idGenero from tb_apoderado where estado=1";
        $consulta=$ic->db->prepare($sql);
        $consulta->execute();
        $objetoConsulta = $consulta->fetchAll(PDO::FETCH_OBJ);
        return $objetoConsulta;
    }
}