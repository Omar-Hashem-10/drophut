<?php require_once "../inc/main-handlers.php"; ?>
<?php
$description_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("description", "id", $description_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "description deleted successfuly");
    redirect("../view-descriptions.php");
}