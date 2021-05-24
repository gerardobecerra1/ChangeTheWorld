<?php
include_once 'models/cursos.php';
class MycourseModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function traerCursosComprados($idUsuario){
        $cursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_misCursos(?)');
            $query->bindParam(1, $idUsuario);
            $query->execute();
            while ($row = $query->fetch()) {
                $curso = new Cursos();
                $curso->id_course = $row['id_course'];
                $curso->logo = $row['logo'];
                $curso->lType = $row['lType'];
                $curso->title = $row['title'];
                $curso->short_description = $row['short_description'];
                array_push($cursos, $curso);
            }
            return $cursos;
        } catch (PDOException $exc) {
            echo 'error en el procedure';
        }
    } 

    function traerPorciento($idC,$idU){
       try {
        $query = $this->db->connect()->prepare('SELECT porcentaje(?,?)');
        $query->bindParam(1, $idC);
        $query->bindParam(2, $idU);
        $query->execute();
        $row = $query->fetch();
        return  $row[0];
       } catch (PDOException $th) {
        echo $th;
       }
    }

}