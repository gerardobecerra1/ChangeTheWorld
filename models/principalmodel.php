<?php
include_once 'models/categoria.php';

class PrincipalModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getCategories()
    {
        $categorias = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_categorias()');
            $query->execute();
            while ($row = $query->fetch()) {
                $categoria = new Categoria();
                $categoria->id_categorie = $row['id_categorie'];
                $categoria->name_categorie = $row['name_categorie'];
                array_push($categorias, $categoria);
            }
            return $categorias;
        } catch (PDOException $exc) {
            return [];
        }
    }

    public function getMejorCalificados()
    {
        $cursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL cursos_mejor_calificados()');
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
            echo 'error en el procedure';
        }
    }

    public function getMasVendidos()
    {
        $cursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL cursos_mas_vendidos()');
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
            echo 'error en el procedure';
        }
    }
    
    public function getRecientes()
    {
        $cursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL cursos_recientes()');
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
            echo 'error en el procedure';
        }
    }
}
