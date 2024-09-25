<?php require_once "../inc/main-handlers.php"; ?>
<?php
$link_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("social_media", "id", $link_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "link deleted successfuly");
    redirect("../view-social-media.php");
}