<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $link_id = Request::getGet("id");
    $link_name = sanitize_input(Request::getPost("link_name"));
    $link_url = sanitize_input(Request::getPost("link_url"));

    $validator = new Validation();

    $validator->required("link_name", $link_name);
    $validator->minVal("link_name", $link_name, 3);
    $validator->maxVal("link_name", $link_name, 30);

    $validator->required("link_url", $link_url);
    $validator->URL("link_url", $link_url);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../edit_social_media.php");
    }else{
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::update("social_media", ["link_url" => $link_url, "link_name" => $link_name], "id", $link_id);

        if (mysqli_query($conn, $sql)) {
            Session::set("success", "link updated successfully");
            redirect("../view-social-media.php");
        }
    }
}else {
    redirect(url("404.php"));
}
