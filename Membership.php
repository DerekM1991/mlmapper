<?php
require 'Mysql.php';
class Membership {
  function validate_user($Email, $pwd) {
  $mysql = New Mysql();
  $ensure_credentials = $mysql->verify_Username_and_Pass($Email, $pwd);

  if($ensure_credentials){
    $_SESSION['status'] = 'authorized';
    header("location: home.html");


  }else return "Incorrect username and password";
  }
}
