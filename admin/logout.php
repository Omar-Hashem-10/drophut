<?php session_start();
require_once '../src/config.php'; 
require_once '../core/functions.php';
require_once '../core/classes/Session.php'; 

Session::remove("admin_id");

redirect("login.php");

?>
