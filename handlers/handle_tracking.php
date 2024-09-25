<?php require_once "../inc/main-handlers.php"; ?>
<?php

$track = Request::getPost("tracking");

$validator = new Validation();

$validator->required("track", $track);
$validator->numeric("track", $track);

if (!empty($validator->getErrors())) {
    Session::set("errors", $validator->getErrors());
    redirect(url("tracking"));
} else {
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::select(["status"], "orders", "tracking_number", $track);
    $result = mysqli_query($conn, $sql);

    if (mysqli_num_rows($result) > 0) {
        $row = mysqli_fetch_assoc($result);
        $status = $row["status"]; 

        Session::set("tracking_status", $status);
        redirect(url("tracking")); 
    } else {
        Session::set("errors", ["Tracking number not found."]);
        redirect(url("tracking"));
    }
}
