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
            $query = $this->db->connect()->query('SELECT*FROM tbl_categories');

            while ($row = $query->fetch()) {
                $categoria = $row['name_categorie'];
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
