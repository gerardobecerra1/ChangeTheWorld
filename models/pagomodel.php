<?php
class PagoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function insertarCompra($idUser,$idCurso)
    {
        try {
            $query = $this->db->connect()->prepare('CALL insertar_compra_venta(?,?)');
            $query->bindParam(1, $idUser);
            $query->bindParam(2, $idCurso);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            return false;
        }
    }
}