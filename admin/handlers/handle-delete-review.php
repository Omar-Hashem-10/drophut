<?php require_once "../inc/main-handlers.php"; ?>
<?php

$review_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("review", "review_id", $review_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "Review deleted successfuly");
    redirect("../show-review.php");
}