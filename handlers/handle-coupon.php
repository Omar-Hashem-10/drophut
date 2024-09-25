<?php require_once "../inc/main-handlers.php"; ?>
<?php
$coupon = Request::getPost("coupon");


$validator = new Validation();

$validator->required("coupon", $coupon);

Session::set("errors", $validator->getErrors());


$conn = Database::connect("localhost", "root", "", "drophut");

$sql = Database::select(["coupon_value"], "products", "coupon", $coupon);

$result = mysqli_query($conn, $sql);

if (!empty($validator->getErrors())) {
    Session::set("errors", $validator->getErrors());
    redirect(url("cart"));
}elseif ($result && mysqli_num_rows($result) > 0) {
    Session::set('success', "Found coupon");
    while($value = mysqli_fetch_assoc($result))
    {
        Session::set("coupon_value", $value["coupon_value"]);
    }
    redirect(url("cart"));
} else {
    Session::set("errors", ["coupon" => "Coupon not found"]);
    redirect(url("cart"));
}

// Close the database connection
mysqli_close($conn);
?>
