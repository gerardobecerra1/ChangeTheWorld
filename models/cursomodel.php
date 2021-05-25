<?php
include_once 'models/cursos.php';
include_once 'models/video.php';
include_once 'models/ccurso.php';


class CursoModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function traerCurosPorId($id)
    {
        $curso = new Cursos();

        try {
            $query = $this->db->connect()->prepare('CALL traer_curso_por_id(?)');
            $query->bindParam(1, $id);
            $query->execute();
            foreach ($query as $row) {
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
            }
            return $curso;
        } catch (PDOException $exc) {
            echo 'No hay cursos';
        }
    }

    function traerVideosPorNivel($curso,$nivel){
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
                $video->contentT = $row['contentT'];
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

    function traerCreadorCurso($id)
    {
        $creador = new Usuario();

        try {
            $query = $this->db->connect()->prepare('CALL traer_creador_curso(?)');
            $query->bindParam(1, $id);
            $query->execute();
            foreach ($query as $row) {
                $creador->photo = $row['photo'];
                $creador->pType = $row['pType'];
                $creador->name_user = $row['name_user'];
                $creador->last_name = $row['last_name'];
                $creador->description_user = $row['description_user'];
            }
            return $creador;
        } catch (PDOException $exc) {
            echo 'No hay cursos';
        }
    }

    function traerComentarioCurso($id){
        $comentarios = [];

        try {
            $query = $this->db->connect()->prepare('CALL traer_comentarios(?)');
            $query->bindParam(1, $id);
            $query->execute();
            while ($row = $query->fetch()) {
                $comentario = new Ccurso();
                $comentario->id_comment_course = $row['id_comment_course'];
                $comentario->fk_course = $row['fk_course'];
                $comentario->fk_sender = $row['fk_sender'];
                $comentario->_message = $row['_message'];
                $comentario->comment_date = $row['comment_date'];
                $comentario->name = $row['name'];
                $comentario->lastname = $row['lastname'];
                array_push($comentarios, $comentario);
            }
            return $comentarios;
        } catch (PDOException $exc) {
            echo 'error en el procedure';
        }
    }

    function insertarCFinal($datos){
        try {
            $query = $this->db->connect()->prepare('CALL insertar_comentario_curso(?,?,?,?)');
            $query->bindParam(1, $datos['course']);
            $query->bindParam(2, $datos['user']);
            $query->bindParam(3, $datos['coment']);
            $query->bindParam(4, $datos['dia']);
            $query->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function insertR($datos){
        try {
            $query = $this->db->connect()->prepare('CALL insert_rating(?,?,?)');
            $query->bindParam(1, $datos['course']);
            $query->bindParam(2, $datos['user']);
            $query->bindParam(3, $datos['rating']);
            $query->execute();
            return true;
        } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
        }
    }

    function promedioR($id)
    {
        try {
            $query = $this->db->connect()->prepare('SELECT promedio_rating(?)');
            $query->bindParam(1, $id);
            $query->execute();
            return  true;
           } catch (PDOException $th) {
            echo $th->getMessage();
            return false;
           }
    }
}