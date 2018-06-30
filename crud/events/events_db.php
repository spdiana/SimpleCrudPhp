<?php

include_once 'db/db_connect.php';

class Events{

  private $db;
  private $db_table = "tb_events";

  public function __construct(){
    $this->db = new DbConnect();
  }


  public function insertEvent($titulo,$endereco,$horario,$data,$site,$urlImage){
    //$sql = "INSERT INTO ".$this->db_table." (titulo, endereco, horario, data, site, url_image) values  ('$titulo', '$endereco','$horario','$data,'$site', '$urlImage')";
    $query = "INSERT INTO ".$this->db_table." SET titulo='$titulo', endereco='$endereco', horario='$horario', data='$data', site='$site', url_image='$urlImage'";
    $res = mysqli_query($this->db->getDb(), $query);

    mysqli_close($this->db->getDb());
    if($res){
      return true;
    }else{
      echo mysqli_errno($this->db->getDb());
      return false;
    }
  }


  public function readAllEvents(){
    $sql = "SELECT * FROM ".$this->db_table." ";
    $res = mysqli_query($this->db->getDb(), $sql) ;
    return $res;
  }


  public function readEventById($id_evento=null){
    $sql = "SELECT * FROM ".$this->db_table." WHERE id_evento=$id_evento";

    $res = mysqli_query($this->db->getDb(), $sql) ;
    return $res;
  }

  public function updateEvent($titulo,$endereco,$horario,$data,$site, $id_evento){
    $sql = "UPDATE ".$this->db_table." SET titulo='$titulo', endereco='$endereco', horario='$horario', data='$data', site='$site' WHERE id_evento=$id_evento";
    $res = mysqli_query($this->db->getDb(), $sql) ;
    if($res) {
      return true;
    } else {
      return false;
    }
  }

  public function deleteEvent($id_evento){
    $sql = "DELETE FROM ".$this->db_table." WHERE id_evento=$id_evento";
    $res = mysqli_query($this->db->getDb(), $sql) ;
    if($res){
      return true;
    }else{
      return false;
    }
  }

}
?>
