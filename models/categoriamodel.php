<?php
class CategoriaModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function traerCurosPorCategoria($id)
    {
        $cursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_cursos_por_categoria(?)');
            $query->bindParam(1, $id);
            $query->execute();
            while ($row = $query->fetch()) {
                $curso = new Cursos();
                $curso->id_course = $row['id_course'];
                $curso->fk_categorie = $row['fk_categorie'];
                $curso->fk_user = $row['fk_user'];
                $curso->logo = $row['logo'];
                $curso->lType = $row['lType'];
                $curso->title = $row['title'];
                $curso->average_rating = $row['average_rating'];
                $curso->short_description = $row['short_description'];
                $curso->large_description = $row['large_description'];
                $curso->number_videos = $row['number_videos'];
                $curso->cost = $row['cost'];
                array_push($cursos, $curso);
            }
            return $cursos;
        } catch (PDOException $exc) {
            echo 'No hay cursos';
        }
    }
}