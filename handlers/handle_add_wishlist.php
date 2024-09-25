<?php require_once "../inc/main-handlers.php"; ?>
<?php
if (Session::check("user_id")) {
    $user_id = Session::get("user_id");
} else {
    redirect(url("my-account"));
}


$product_id = Request::getGet("id");

$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::select("*", "products", "product_id", $product_id);

$result = mysqli_query($conn, $sql);

while($row = mysqli_fetch_assoc($result))
{
    $title = $row["title"];
    if($row["price_after_discount"] != 0)
    {
        $price = $row["price_after_discount"];
    }else{
        $price = $row["price_before_discount"];
    }
    $image = $row["image"];
}



$sql = Database::insert("wishlist", ["user_id", "title", "price", "image"], [$user_id, $title, $price, $image]);

if( mysqli_query($conn, $sql))
{
    Session::set('success', "product added in wishlist");
    $count_query = "SELECT COUNT(*) as total FROM wishlist WHERE user_id = '$user_id'";
    $count_result = mysqli_query($conn, $count_query);
    $count = mysqli_fetch_assoc($count_result)['total'];
    Session::set('wishlist_count', $count);
    redirect(url("product-details"));
}
