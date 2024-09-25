<?php require_once "../inc/main-handlers.php"; ?>
<?php

$feedback_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("feedback", "feedback_id", $feedback_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "feedback deleted successfuly");
    redirect("../view-feedback.php");
}