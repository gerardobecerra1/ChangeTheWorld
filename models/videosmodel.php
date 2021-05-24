<?php
include_once 'models/video.php';

class VideosModel extends Model
{
    public function __construct()
    {
        parent::__construct();
    }

    function infoVideo($id){
        $video = new Video();
        try {
            $query = $this->db->connect()->prepare('CALL traer_video_por_id(?)');
            $query->bindParam(1, $id);
            $query->execute();
            foreach ($query as $row) {
                $video->id_video = $row['id_video'];
                $video->fk_course = $row['fk_course'];
                $video->title = $row['title'];
                $video->short_description = $row['short_description'];
                $video->content = $row['content'];
                $video->contentT = $row['contentT'];
                $video->viewed = $row['viewed'];
                $video->level_ = $row['level_'];
            }
            return $video;
        } catch (PDOException $exc) {
            echo 'No video';
        }
    }

    function visto($idU,$idV){
        try {
            $query = $this->db->connect()->prepare('CALL guardar_vistos(?,?)');
            $query->bindParam(1, $idU);
            $query->bindParam(2, $idV);
            $query->execute();
            return true;
        } catch (PDOException $exc) {
            echo $exc->getMessage();
            return false;
        }

    }
}