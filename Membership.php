<?php
require 'Mysql.php';
class Membership {
  function validate_user($un, $pwd) {
  $mysql = New Mysql();
  $ensure_credentials = $mysql->verify_Username_and_Pass($un, $pwd);

  if($ensure_credentials){
    $_SESSION['status'] = 'authorized';
    header("location: test.php");


  }else return "Incorrect username and password";
  }
}
