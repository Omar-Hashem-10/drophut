<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $name = sanitize_input(Request::getPost("username"));
    $email = sanitize_input(Request::getPost("email"));
    $phone = sanitize_input(Request::getPost("phone"));
    $password = sanitize_input(Request::getPost("password"));
    $job_title = sanitize_input(Request::getPost("job_title"));

    $validator = new Validation();

    $validator->required("name", $name);
    $validator->maxVal("name", $name, 25);
    $validator->minVal("name", $name, 3);
    $validator->alpha("name", $name);

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
        redirect("../edit_employee.php");
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $user_id = Request::getGet("id");

        $sql = Database::select("*", "users", "user_id", $user_id);
        $result = mysqli_query($conn, $sql);
        $row = mysqli_fetch_assoc($result);

        if ($email != $row["email"]) {
                $sql = Database::update("users", [
                    "username" => $name,
                    "password" => $password,
                    "email" => $email,
                    "phone_number" => $phone,
                    "job_title" => $job_title
                ], "user_id", $user_id);
            }else {
            $sql = Database::update("users", [
                "username" => $name,
                "password" => $password,
                "phone_number" => $phone,
                "job_title" => $job_title
            ], "user_id", $user_id);
        }

        if (mysqli_query($conn, $sql)) {
            Session::set("success", "Data updated successfully");
            redirect("../employee.php");
        }
    }
    } else {
    redirect(url("404.php"));
}
