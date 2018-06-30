<?php

    include_once 'db/db_connect.php';

    class User{

        private $db;
        private $db_table = "tb_user";

        public function __construct(){
            $this->db = new DbConnect();
        }

        public function isLoginExist($username, $password){

            $query = "SELECT * from ".$this->db_table." WHERE username='$username' AND password='$password' Limit 1";
            $result = mysqli_query($this->db->getDb(), $query);
            $user_data = $result->fetch_array(MYSQLI_ASSOC);

            if(mysqli_num_rows($result) > 0){
                mysqli_close($this->db->getDb());
                $_SESSION['login'] = true; // this login var will use for the session thing
	              $_SESSION['username'] = $user_data['username'];
                $_SESSION['fullname'] = $user_data['fullname'];
                return true;
            }

            mysqli_close($this->db->getDb());
            return false;
        }

        public function get_fullname($username){
        		$query = "SELECT fullname FROM ".$this->db_table." WHERE username = '$username' ";
            //$result = mysqli_query($this->db->getDb(), $query);
            $result = mysqli_query($this->db->getDb(), $query) ;
        		//$result = $this->db->query($query) or die($this->db->error);

        		$user_data = $result->fetch_array(MYSQLI_ASSOC);
        		echo $user_data['fullname'];
            mysqli_close($this->db->getDb());
        	}


          /*** starting the session ***/
     	public function get_session(){
  	    return $_SESSION['login'];
  	  }

      public function user_logout() {
  	    $_SESSION['login'] = FALSE;
  		  unset($_SESSION);
  	    session_destroy();
  	  }


        public function isEmailUsernameExist($username){

            $query = "select * from ".$this->db_table." where username = '$username' ";
            $result = mysqli_query($this->db->getDb(), $query);
            if(mysqli_num_rows($result) > 0){
                mysqli_close($this->db->getDb());
                return true;
            }
            return false;
        }

        public function isValidEmail($email){
            return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
        }

        public function createNewRegisterUser($username, $fullname, $password){

            $isExisting = $this->isEmailUsernameExist($username);

            if($isExisting){
                return false;
            } else{

                $query = "INSERT INTO ".$this->db_table." (username, fullname, password, created_at, updated_at) values ('$username', '$fullname', '$password', NOW(), NOW())";
              //  $query = "INSERT INTO ".$this->db_table." SET username='$username', fullname='$fullname', password='$password'";
                echo $query;
                $inserted = mysqli_query($this->db->getDb(), $query) ;
                mysqli_close($this->db->getDb());

                return true;
            }
            return false;
        }

    }
    ?>
