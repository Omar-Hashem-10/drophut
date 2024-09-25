<?php require_once "../inc/main-handlers.php"; ?>
<?php
if (check_request_method("POST")) {
    $linkName = sanitize_input(Request::getPost("link_name"));
    $linkUrl = sanitize_input(Request::getPost("link_url"));

    $validator = new Validation();

    $validator->required("linkName", $linkName);
    $validator->minVal("linkName", $linkName, 3);
    $validator->maxVal("linkName", $linkName, 30);

    $validator->required("linkUrl", $linkUrl);
    $validator->URL("linkUrl", $linkUrl);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../add-social-media.php");
    }else{
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::insert("social_media", ["link_url", "link_name"], [$linkUrl, $linkName]);

        if (mysqli_query($conn, $sql)) {
            Session::set("success", "link inserted successfully");
            redirect("../add-social-media.php");
        }
    }
}else{
    redirect(url("404.php"));
}