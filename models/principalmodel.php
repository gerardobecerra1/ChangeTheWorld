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

    public function getReco()
    {

    }

    public function gegetRecenttReco()
    {

    }
}
