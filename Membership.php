<?php
require 'Mysql.php';
class Membership {
  function validate_user($Email, $pwd) {
  $mysql = New Mysql();
  $ensure_credentials = $mysql->verify_Username_and_Pass($Email, $pwd);

  if($ensure_credentials){
    $_SESSION['status'] = 'authorized';
    header("location: home.php");


  }else return "Incorrect username and password";
  }

  function log_out(){
  	if(isset($_SESSION['status']))
  		unset($_SESSION['status']);

  	if(isset($_COOKIE[session_name()])) setcookie(session_name(), '', time() - 10);
  	session_destroy();
  }

  function confirm_login(){
  	session_start();
  	if($_SESSION['status'] != 'authorized') header("location: login.php");
  }
}
