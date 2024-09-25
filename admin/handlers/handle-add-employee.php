<?php require_once "../inc/main-handlers.php"; ?>
<?php
if (check_request_method("POST")) {
    $username = sanitize_input(Request::getPost("username"));
    $email = sanitize_input(Request::getPost("email"));
    $phone = sanitize_input(Request::getPost("phone"));
    $password = sanitize_input(Request::getPost("password"));
    $job_title = sanitize_input(Request::getPost("job_title"));
    $role = sanitize_input(Request::getGet("role"));
    $image = sanitize_input(Request::getPost("image"));

    $validator = new Validation();

    $validator->required("username", $username);
    $validator->maxVal("username", $username, 25);
    $validator->minVal("username", $username, 3);
    $validator->alpha("username", $username);

    $validator->required("email", $email);
    $validator->validateEmailFormat("email", $email);
    $validator->validateEmailRegex("email", $email);

    $validator->required("password", $password);
    $validator->validatePasswordRegex("password", $password, "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/");

    $validator->required("job_title", $job_title);
    $validator->alpha("job_title", $job_title);

    if(!empty($phone)){
    $validator->maxVal("phone", $phone, 11);
    $validator->minVal("phone", $phone, 11);
    $validator->numeric("phone", $phone);
    }

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../add_employee.php");
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::insert("users", ["username", "password", "email", "phone_number", "role", "job_title", "image"], [$username, $password, $email, $phone, $role, $job_title, $image]);
        if (mysqli_query($conn, $sql)) {
            Session::set("success", "Data inserted successfully");
            redirect("../employee.php");
        }
    }
}else {
    redirect(url("404.php"));
}
