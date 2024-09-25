<?php require_once "../inc/main-handlers.php"; ?>
<?php
if (check_request_method("POST")) {
    $description_id = Request::getGet("id");
    $description = sanitize_input(Request::getPost("description"));

    $validator = new Validation();

    $validator->required("description", $description);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../edit-description.php");
    }else{
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::update("description", ["description" => $description], "id", $description_id);

        if (mysqli_query($conn, $sql)) {
            Session::set("success", "description updated successfully");
            redirect("../view-descriptions.php");
        }
    }
}else {
    redirect(url("404.php"));
}
