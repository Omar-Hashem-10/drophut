<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $category_name = sanitize_input(Request::getPost("category_name"));

    $validator = new Validation();

    $validator->required("category_name", $category_name);
    $validator->maxVal("category_name", $category_name, 10);
    $validator->minVal("category_name", $category_name, 2);
    $validator->alpha("category_name", $category_name);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../add_category.php");
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::insert("categories", ["name"], [$category_name]);
        if (mysqli_query($conn, $sql)) {
            Session::set("success", "category inserted successfully");
            redirect("../add-category.php");
        }
    }
}else {
    redirect(url("404.php"));
}
