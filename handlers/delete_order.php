<?php require_once "../inc/main-handlers.php"; ?>
<?php

$order_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("orders", "order_id", $order_id);

if (mysqli_query($conn, $sql)) {
    Session::set('success', "order deleted successfuly.");
} else {
    Session::set('error', "Error removing product: " . mysqli_error($conn));
}

$sql_count_orders = "SELECT COUNT(*) AS total_orders FROM orders WHERE user_id = '".Session::get("user_id")."'";
$count_orders_result = mysqli_query($conn, $sql_count_orders);
$total_orders = 0;

if ($count_orders_result && mysqli_num_rows($count_orders_result) > 0) {
    $count_orders_data = mysqli_fetch_assoc($count_orders_result);
    $total_orders = $count_orders_data['total_orders'] ?: 0; 
    Session::set("total_orders", $total_orders);
}

redirect(url("order"));
?>
