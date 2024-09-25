<?php require_once "../inc/main-handlers.php"; ?>
<?php

$comment_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("comments", "id", $comment_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "Comment deleted successfuly");
    redirect("../show-comment.php");
}