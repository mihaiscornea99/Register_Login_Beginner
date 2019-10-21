<?php

namespace Auth; // Auth/User

class User {
  private $username;
  private $password;
  private $db;

  function __construct($username, $password){
    $this->username=$username;
    $this->password=$password;
    $this->db=mysqli_connect('localhost', 'root', '', 'auth');

    //echo 'Constr';
  }


  public function register(){
    $check_duplicate=$this->db->query("SELECT username FROM users WHERE username='$this->username'");
    if($check_duplicate->num_rows==0){
      $register_query="INSERT INTO users (username, password) VALUES ('$this->username','$this->password')";
      mysqli_query($this->db,$register_query);
      return 1;
    }
    else
      return 0;
  }

  public function login(){
    $find_password=$this->db->query("SELECT password FROM users WHERE username='$this->username'");
    if($find_password->num_rows==0){
      return 0;
    }
    else{
      if($this->password==$find_password->fetch_assoc()["password"]){
          return 1;
      }
      else{
        return 0;
      }
    }
  }

}
