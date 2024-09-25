<?php require_once "../inc/main-handlers.php"; ?>
<?php

$order_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("orders", "order_id", $order_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "Order deleted successfuly");
    redirect("../view-orders.php");
}