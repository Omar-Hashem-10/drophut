<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $first_name = sanitize_input(Request::getPost("first_name"));
    $last_name = sanitize_input(Request::getPost("last_name"));
    $company_name = sanitize_input(Request::getPost("company_name"));
    $country = sanitize_input(Request::getPost("country"));
    $street_address = sanitize_input(Request::getPost("address"));
    $street_address_op = sanitize_input(Request::getPost("address_op"));
    $city = sanitize_input(Request::getPost("city"));
    $state = sanitize_input(Request::getPost("state"));
    $phone = sanitize_input(Request::getPost("phone"));
    $email = sanitize_input(Request::getPost("email"));
    $order_note = sanitize_input(Request::getPost("order_note"));
    $payment_method = sanitize_input(Request::getPost("payment_method"));

    $validator = new Validation();

    $validator->required("first_name", $first_name);
    $validator->maxVal("first_name", $first_name, 25);
    $validator->minVal("first_name", $first_name, 3);
    $validator->alpha("first_name", $first_name);

    $validator->required("last_name", $last_name);
    $validator->maxVal("last_name", $last_name, 25);
    $validator->minVal("last_name", $last_name, 3);
    $validator->alpha("last_name", $last_name);

    $validator->required("country", $country);
    $validator->required("street_address", $street_address);
    $validator->required("city", $city);
    $validator->required("state", $state);

    $validator->required("phone", $phone);
    $validator->numeric("phone", $phone);
    $validator->maxVal("phone", $phone, 11);
    $validator->minVal("phone", $phone, 11);

    $validator->required("email", $email);
    $validator->validateEmailFormat("email", $email);
    $validator->validateEmailRegex("email", $email);


    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect(url("checkout"));
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");

        $order_sql = Database::insert("orders", [
            "user_id", "total_amount", "payment_method", "address", "address_op", 
            "first_name", "last_name", "company_name", "country", "city", 
            "state", "phone", "email", "order_notes"
        ], [
            Session::get("user_id"), Session::get("total"), $payment_method, 
            $street_address, $street_address_op, $first_name, $last_name, $company_name, 
            $country, $city, $state, $phone, $email, $order_note
        ]);

        mysqli_query($conn, $order_sql);
        $order_id = mysqli_insert_id($conn);

        $cart_sql = Database::selectJoin(
            [
                "cart.product_id", 
                "cart.quantity", 
                "cart.color", 
                "products.title", 
                "products.price_after_discount", 
                "products.price_before_discount", 
                "products.image"
            ], 
            "cart", 
            "products", 
            "cart.product_id = products.product_id", 
            "cart.user_id", 
            Session::get("user_id")
        );
        $cart_result = mysqli_query($conn, $cart_sql);

        while ($row = mysqli_fetch_assoc($cart_result)) {
            if($row["price_after_discount"] != 0)
            {
                $order_item_sql = Database::insert("order_items", [
                    "order_id", "product_id", "quantity", "price", "color_product" 
                ], [
                    $order_id, $row['product_id'], $row['quantity'], $row['price_after_discount'], $row['color'] 
                ]);
            
                mysqli_query($conn, $order_item_sql);
            }else{
                $order_item_sql = Database::insert("order_items", [
                    "order_id", "product_id", "quantity", "price", "color_product" 
                ], [
                    $order_id, $row['product_id'], $row['quantity'], $row['price_before_discount'], $row['color'] 
                ]);
            
                mysqli_query($conn, $order_item_sql);
            }
        }

        $delete_cart_sql = Database::delete("cart", "user_id", Session::get("user_id"));
        mysqli_query($conn, $delete_cart_sql);


        $sql_count = "SELECT COUNT(*) AS total_items FROM cart WHERE user_id = '$user_id'";
        $count_result = mysqli_query($conn, $sql_count);
        $total_items = 0;

if ($count_result && mysqli_num_rows($count_result) > 0) {
    $count_data = mysqli_fetch_assoc($count_result);
    $total_items = $count_data['total_items'] ?: 0; 
    Session::set("total_items", $total_items);
}

$sql_count_orders = "SELECT COUNT(*) AS total_orders FROM orders WHERE user_id = '".Session::get("user_id")."'";
$count_orders_result = mysqli_query($conn, $sql_count_orders);
$total_orders = 0;

if ($count_orders_result && mysqli_num_rows($count_orders_result) > 0) {
    $count_orders_data = mysqli_fetch_assoc($count_orders_result);
    $total_orders = $count_orders_data['total_orders'] ?: 0; 
    Session::set("total_orders", $total_orders);
}


Session::remove("coupon_value");
Session::remove("coupon");

        redirect(url("cart"));
    }
} else {
    redirect(url("404.php"));
}
?>
