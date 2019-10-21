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
    if(empty($_POST["password_confirmation"])){
      echo "Password confirmation not set";
      echo $backButton;
    }
    else{
      if(!($_POST["password"]==$_POST["password_confirmation"])){
        echo "The passwords do not match";
        echo $backButton;
      }
      else{
        $user=new User($_POST["username"],$_POST["password"]);
        if($user->register()==0){
        echo "Username already exists";
        echo $backButton;
        }
        else{
          echo "All done!
          <br>
          <a href=\"login_page.php\">Log in</a> now!";
        }
      }
    }
  }
}
//echo $_POST["username"];
//$user = new User($_POST["username"],"1234");
