<?php require_once "../inc/main-handlers.php"; ?>
<?php
$product_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::delete("products", "product_id", $product_id);

if(mysqli_query($conn, $sql))
{
    Session::set("success", "product deleted successfuly");
    redirect("../view-products.php");
}