<?php require_once "../inc/main-handlers.php"; ?>
<?php

$contact_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("contact", "contact_id", $contact_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "Message deleted successfuly");
    redirect("../view-contact.php");
}