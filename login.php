<?php
namespace Auth;
include "classes/User.php";

$backButton="<br><input type=\"submit\" value=\"Back\" <a href=\"#\" onclick=\"history.back();\"></a>";

if(empty($_POST["username"])){
  echo "Username not set";
  echo $backButton;
}
else{
  if(empty($_POST["password"])){
    echo "Password not set";
    echo $backButton;
  }
  else{
    $user=new User($_POST["username"],$_POST["password"]);
    if($user->login()==1){
      echo "Login successful!";
      echo $backButton;
    }
    else{
      echo "Wrong username or password";
      echo $backButton;
    }
  }
}
