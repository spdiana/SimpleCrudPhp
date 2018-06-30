<?php

//include_once 'db/db_connect.php';
include('../db/db_connect.php');

class GetJsonObjects{

  private $db;
  private $db_table_events = "tb_events";

  public function __construct(){
    $this->db = new DbConnect();
  }


  public function selectAllEvents(){
      $sql = "SELECT * FROM ".$this->db_table_events." ";
      $result = mysqli_query($this->db->getDb(), $sql) ;
      //create an array
      $array = array();
      while($row =mysqli_fetch_assoc($result))   {
        $array[] = $row;
      }
      //echo json_encode($array);

      //close the db connection
      mysqli_close($this->db->getDb());
      return $array;
    }

}
?>
