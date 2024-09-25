<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $email = sanitize_input(Request::getPost("email"));
    $password = sanitize_input(Request::getPost("password"));

    $validator = new Validation();

    $validator->required("email", $email);
    $validator->validateEmailFormat("email", $email);
    $validator->validateEmailRegex("email", $email);

    $validator->required("password", $password);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect(url("login"));
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");

        $sql = Database::select(['user_id', 'password', 'role'], 'users', 'email', $email);
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $userId = $row['user_id'];
            $dbPassword = $row['password'];
            $role = $row['role'];

            if ($password === $dbPassword && $role == "User") {
                Session::set("user_id", $userId);
                Session::set("logged_in", true);

                // حساب عدد المنتجات اللي في cart
                $sql_count = "SELECT COUNT(*) AS total_items FROM cart WHERE user_id = '$userId'";
                    $count_result = mysqli_query($conn, $sql_count);
                    $total_items = 0;

                    if ($count_result && mysqli_num_rows($count_result) > 0) {
                        $count_data = mysqli_fetch_assoc($count_result);
                        $total_items = $count_data['total_items'] ?: 0; 
                        Session::set("total_items", $total_items);
                    }

                    //حساب عدد الاوردارات اللي في order
                    $sql_count_orders = "SELECT COUNT(*) AS total_orders FROM orders WHERE user_id = '$userId'";
                    $count_orders_result = mysqli_query($conn, $sql_count_orders);
                    $total_orders = 0;

                    if ($count_orders_result && mysqli_num_rows($count_orders_result) > 0) {
                        $count_orders_data = mysqli_fetch_assoc($count_orders_result);
                        $total_orders = $count_orders_data['total_orders'] ?: 0; 
                        Session::set("total_orders", $total_orders);
                    }

                    //حساب عدد المنتجات اللي في wishlist
                    $count_query = "SELECT COUNT(*) as total FROM wishlist WHERE user_id = '$user_id'";
                    $count_result = mysqli_query($conn, $count_query);
                    $count = mysqli_fetch_assoc($count_result)['total'];
                    Session::set('wishlist_count', $count);

                Session::remove("coupon_value");
                Session::remove("coupon");
                redirect(url("home"));
            } else {
                Session::set("errors", ["Invalid email or password."]);
                redirect(url("login"));
            }
        } else {
            Session::set("errors", ["Invalid email or password."]);
            redirect(url("login"));
        }

        mysqli_close($conn);
    }
} else {
    redirect(url("404.php"));
}
