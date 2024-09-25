<?php session_start();
require_once 'src/config.php'; 
require_once ROOT_PATH . 'core/functions.php';
require_once ROOT_PATH . 'core/classes/Session.php'; 

Session::remove("user_id");
Session::remove("coupon_value");
Session::remove("coupon");
Session::remove("wishlist_count");
Session::remove("total_items");
Session::remove("total_orders");

redirect(url("home"));

?>
