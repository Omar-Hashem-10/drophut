<?php require_once "../inc/main-handlers.php"; ?>
<?php

$blog_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("blogs", "id", $blog_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "blog deleted successfuly");
    redirect("../view-blogs.php");
}