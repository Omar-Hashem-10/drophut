<?php require_once "../inc/main-handlers.php"; ?>
<?php

$user_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("users", "user_id", $user_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "Customer deleted successfuly");
    redirect("../customers.php");
}