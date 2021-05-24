<?php
include_once 'models/usuario.php';
include_once 'models/video.php';
include_once 'models/recurso.php';

class DashboardModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function getUsuarioByEmail($email)
    {
        $item = new Usuario();

        $query = $this->db->connect()->prepare('CALL user_set(?)');
        try {
            $query->bindParam(1, $email);
            $query->execute();
            foreach ($query as $currentUser) {
                $item->id_user = $currentUser['id_user'];
                $item->role_user = $currentUser['role_user'];
                $item->photo = $currentUser['photo'];
                $item->username = $currentUser['username'];
                $item->name_user = $currentUser['name_user'];
                $item->last_name = $currentUser['last_name'];
                $item->description_user = $currentUser['description_user'];
                $item->email = $currentUser['email'];
                $item->password_user = $currentUser['password_user'];
                $item->registered_date = $currentUser['registered_date'];
                $item->date_of_last_change = $currentUser['date_of_last_change'];
            }
            return $item;
        } catch (PDOException $exc) {
            return false;
        }
    }

    function insertarCategoria($nombre)
    {
        try {
            $query = $this->db->connect()->prepare('CALL agregar_categoria(?)');
            $query->bindParam(1, $nombre);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            return false;       
        }
        
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

    function insertarCurso($datos){
        try {
            $query = $this->db->connect()->prepare('CALL insert_course(?,?,?,?,?,?,?,?,?,?)');
            $query->bindParam(1, $datos['categoria']);
            $query->bindParam(2, $datos['usuario']);
            $query->bindParam(3, $datos['logo']);
            $query->bindParam(4, $datos['logo_tipo']);
            $query->bindParam(5, $datos['titulo']);
            $query->bindParam(6, $datos['rating']);
            $query->bindParam(7, $datos['shortD']);
            $query->bindParam(8, $datos['longD']);
            $query->bindParam(9, $datos['numberV']);
            $query->bindParam(10, $datos['price']);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return false;
        }
    }

    function traerCursoUsuario($idUsuario){
        $cursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_cursos_de_usuario(?)');
            $query->bindParam(1, $idUsuario);
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

    function insertarVideoIntroduction($datos){
        try {
            $query = $this->db->connect()->prepare('CALL insertar_videos_introduction(:id, :title, :short, :video, :type, :free, :level)');
            $query->execute(['id'=>$datos['id_curso'],'title'=>$datos['title'],'short'=>$datos['shortD'],'video'=>$datos['video'],'type'=>$datos['typeV'],'free'=>$datos['free'],'level'=>$datos['level']]);
            return true;
        } catch (PDOException $exc) {
            echo $exc;
            return false;
        }
    }

    function insertarResource($datos){
        try {
            $query = $this->db->connect()->prepare('CALL insertar_recursos(:id, :name, :contenido, :tipo, :link, :categoria)');
            $query->execute(['id'=>$datos['id_curso'],'name'=>$datos['name'],'contenido'=>$datos['content'],'tipo'=>$datos['typeC'],'link'=>$datos['link'],'categoria'=>$datos['categoria']]);
            return true;
        } catch (PDOException $exc) {
            echo $exc;
            return false;
        }
    }
    

    function traerVideosUsuarioPorNivel($curso,$nivel){
        $videos = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_videos_de_usuario_por_nivel(?,?)');
            $query->bindParam(1, $curso);
            $query->bindParam(2, $nivel);
            $query->execute();
            while ($row = $query->fetch()) {
                $video = new Video();
                $video->id_video = $row['id_video'];
                $video->fk_course = $row['fk_course'];
                $video->title = $row['title'];
                $video->short_description = $row['short_description'];
                $video->content = $row['content'];
                $video->viewed = $row['viewed'];
                $video->level_ = $row['level_'];
                array_push($videos, $video);
            }
            return $videos;
        } catch (PDOException $exc) {
            echo 'error en el procedure';
        }
    }

    function traerRecursosPorCurso($id){
        $recursos = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_recursos_por_curso(?)');
            $query->bindParam(1, $id);
            $query->execute();
            while ($row = $query->fetch()) {
                $recurso = new Recurso();
                $recurso->id_resource = $row['id_resource'];
                $recurso->fk_course = $row['fk_course'];
                $recurso->contentName = $row['contentName'];
                $recurso->content = $row['content'];
                $recurso->contentT = $row['contentT'];
                $recurso->link = $row['link'];
                $recurso->categorie = $row['categorie'];

                array_push($recursos, $recurso);
            }
            return $recursos;
        } catch (PDOException $exc) {
            echo 'error en el procedure';
        }
    }
}
