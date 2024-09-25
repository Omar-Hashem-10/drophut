<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $product_id = Request::getGet("id");
    $title = sanitize_input(Request::getPost("title"));
    $price_before_discount = sanitize_input(Request::getPost("price_before_discount"));
    $price_after_discount = sanitize_input(Request::getPost("price_after_discount"));
    $image = sanitize_input(Request::getPost("image"));
    $category_id = sanitize_input(Request::getPost("category_id"));
    $major = sanitize_input(Request::getPost("major"));
    $delivery = sanitize_input(Request::getPost("delivery"));
    $coupon = sanitize_input(Request::getPost("coupon"));
    $coupon_value = sanitize_input(Request::getPost("coupon_value"));
    $color = sanitize_input(Request::getPost("color"));
    $stock = sanitize_input(Request::getPost("stock"));
    $description = sanitize_input(Request::getPost("description"));

    $validator = new Validation();

    $validator->required("title", $title);
    $validator->maxVal("title", $title, 50);
    $validator->minVal("title", $title, 3);
    $validator->alpha("title", $title);

    $validator->required("price_before_discount", $price_before_discount);
    $validator->numeric("price_before_discount", $price_before_discount);

    if(!empty($price_after_discount))
    {
        $validator->numeric("price_after_discount", $price_after_discount);
    }

    $validator->required("image", $image);

    $validator->required("color", $color);

    $validator->required("description", $description);


    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../edit-product.php");
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::update("products",
                                [
                                    "title" => $title,
                                    "price_after_discount" => $price_after_discount,
                                    "price_before_discount" => $price_before_discount,
                                    "image" => $image,
                                    "major" => $major,
                                    "category_id" => $category_id,
                                    "delivery" => $delivery,
                                    "coupon" => $coupon,
                                    "coupon_value" => $coupon_value,
                                    "color" => $color,
                                    "description" => $description,
                                    "stock" => $stock
                                ], "product_id", $product_id);

    if (mysqli_query($conn, $sql)) {
        Session::set("success", "Product updated successfully");
        redirect("../view-products.php");
    }
    }
}else {
    redirect(url("404.php"));
}
