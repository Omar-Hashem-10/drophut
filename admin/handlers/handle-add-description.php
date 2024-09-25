<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $description = sanitize_input(Request::getPost("description"));

    $validator = new Validation();

    $validator->required("description", $description);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../add_description.php");
    }else {
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::insert("description", ["description"], [$description]);
        if (mysqli_query($conn, $sql)) {
            Session::set("success", "description inserted successfully");
            redirect("../add-description.php");
        }
    }

}else {
    redirect(url("404.php"));
}
