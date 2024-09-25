<?php

session_start();
require_once "../../src/config.php";
require_once '../../core/functions.php';
require_once '../../core/classes/Validation.php';
require_once '../../core/classes/Database.php';
require_once '../../core/classes/Session.php';
require_once '../../core/classes/Request.php';

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
        redirect("../login.php");
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");

        $sql = Database::select(['user_id', 'password', 'role'], 'users', 'email', $email);
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $adminId = $row['user_id'];
            $dbPassword = $row['password'];
            $role = $row['role'];

            if ($password === $dbPassword && $role == "Admin") {
                Session::set("admin_id", $adminId);
                redirect("../index.php");
            } else {
                Session::set("errors", ["Invalid email or password."]);
                redirect("../login.php");
            }
        } else {
            Session::set("errors", ["Invalid email or password."]);
            redirect("../login.php");
        }

        mysqli_close($conn);
    }
} else {
    redirect(url("404.php"));
}
