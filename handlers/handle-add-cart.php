<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (Session::check("user_id")) {
    $user_id = Session::get("user_id");
} else {
    redirect(url("my-account"));
}

$product_id = Request::getGet('id');
$color = Request::getPost('selected_color');
$quantity = Request::getPost('qty');

$conn = Database::connect("localhost", "root", "", "drophut");

$sql_check = Database::select("*", "cart", "user_id", $user_id);
$sql_check .= " AND product_id = $product_id AND color = '$color'";
$result = mysqli_query($conn, $sql_check);

if ($result && mysqli_num_rows($result) > 0) {
    $cart_item = mysqli_fetch_assoc($result);
    $new_quantity = $cart_item['quantity'] + $quantity;

    $sql_update = Database::update("cart", ["quantity" => $new_quantity], "id", $cart_item['id']);
    mysqli_query($conn, $sql_update);
} else {
    $sql_insert = Database::insert("cart", ["user_id", "product_id", "quantity", "color"], [$user_id, $product_id, $quantity, $color]);
    mysqli_query($conn, $sql_insert);
}

$sql_count = "SELECT COUNT(*) AS total_items FROM cart WHERE user_id = '$user_id'";
$count_result = mysqli_query($conn, $sql_count);
$total_items = 0;

if ($count_result && mysqli_num_rows($count_result) > 0) {
    $count_data = mysqli_fetch_assoc($count_result);
    $total_items = $count_data['total_items'] ?: 0; 
    Session::set("total_items", $total_items);
}

Session::set('success', "Product added");
redirect(url("product-details"));
