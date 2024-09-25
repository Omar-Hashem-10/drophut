<?php require_once "../inc/main-handlers.php"; ?>
<?php

$category_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("categories", "category_id", $category_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "category deleted successfuly");
    redirect("../view-categories.php");
}