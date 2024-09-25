<?php require_once "../inc/main-handlers.php"; ?>
<?php

$cart_id = Request::getGet("id");
$user_id = Session::get("user_id"); 

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("cart", "id", $cart_id) . " AND user_id = '$user_id'";

if (mysqli_query($conn, $sql)) {
    Session::set('success', "Product removed from cart.");
} else {
    Session::set('error', "Error removing product: " . mysqli_error($conn));
}

$sql_count = "SELECT COUNT(*) AS total_items FROM cart WHERE user_id = '$user_id'";
$count_result = mysqli_query($conn, $sql_count);
$total_items = 0;

if ($count_result && mysqli_num_rows($count_result) > 0) {
    $count_data = mysqli_fetch_assoc($count_result);
    $total_items = $count_data['total_items'] ?: 0; 
    Session::set("total_items", $total_items);
}

redirect(url("cart"));
?>
