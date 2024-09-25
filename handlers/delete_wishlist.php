<?php require_once "../inc/main-handlers.php"; ?>
<?php

$wishlist_id = Request::getGet("id");
$user_id = Session::get("user_id"); 

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("wishlist", "id", $wishlist_id) . " AND user_id = '$user_id'";

if (mysqli_query($conn, $sql)) {
    Session::set('success', "Product removed from wishlist.");
} else {
    Session::set('error', "Error removing product: " . mysqli_error($conn));
}

$count_query = "SELECT COUNT(*) as total FROM wishlist WHERE user_id = '$user_id'";
$count_result = mysqli_query($conn, $count_query);
$count = mysqli_fetch_assoc($count_result)['total'];
Session::set('wishlist_count', $count);

redirect(url("wishlist"));
?>
