<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $order_id = Request::getGet("id");
    $status = Request::getPost("status");


    $conn = Database::connect("localhost", "root", "", "drophut");
    if (!$conn) {
        die("Connection failed: " . mysqli_connect_error());
    }

    $sql = Database::update("orders",["status" => $status], "order_id", $order_id);

if (mysqli_query($conn, $sql)) {
    Session::set("success", "Order updated successfully");
    redirect("../view-orders.php");
}
}else {
    redirect(url("404.php"));
}
