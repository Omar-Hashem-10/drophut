<?php require_once "../inc/main-handlers.php"; ?>
<?php
if (check_request_method("POST")) {
    $name = sanitize_input(Request::getPost("name"));
    $email = sanitize_input(Request::getPost("email"));
    $password = sanitize_input(Request::getPost("password"));
    $phone = sanitize_input(Request::getPost("phone"));

    $validator = new Validation();

    $validator->required("name", $name);
    $validator->maxVal("name", $name, 25);
    $validator->minVal("name", $name, 3);
    $validator->alpha("name", $name);

    $validator->required("phone", $phone);
    $validator->maxVal("phone", $phone, 11);
    $validator->minVal("phone", $phone, 11);
    $validator->numeric("phone", $phone);

    $validator->required("email", $email);
    $validator->validateEmailFormat("email", $email);
    $validator->validateEmailRegex("email", $email);

    $validator->required("password", $password);
    $validator->validatePasswordRegex("password", $password, "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/");

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect(url("register"));
    }else{
      $conn = Database::connect("localhost", "root", "", "drophut");
    if (!$conn) {
      die("Connection failed: " . mysqli_connect_error());
    }
    $sql = Database::insert("users", ["username", "password", "email", "phone_number","role"], [$name, $password, $email, "$phone","User"]);
    if (mysqli_query($conn, $sql)) {
      $last_id = mysqli_insert_id($conn);
      Session::set("user_id", $last_id);
    }
    Session::remove("coupon_value");
    Session::remove("coupon");

    redirect(url("home"));
    }
} else {
    redirect(url("404.php"));
}
