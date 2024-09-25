<?php require_once "../inc/main-handlers.php"; ?>
<?php

$feedback = sanitize_input(Request::getPost("feedback"));
$user_title = sanitize_input(Request::getPost("user_title"));
$image = sanitize_input(Request::getPost("image"));

$validator = new Validation();

$validator->required('feedback', $feedback);
$validator->minVal('feedback', $feedback, 6);

$validator->required('user_title', $user_title);
$validator->minVal('user_title', $user_title, 6);
$validator->maxVal('user_title', $user_title, 30);

$validator->required('image', $image);


if (!empty($validator->getErrors())) {
    Session::set("errors", $validator->getErrors());
    redirect(url("feedback"));
}else{
    $user_id = Session::get("user_id");
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::insert("feedback", ["image", "feedback_text", "user_id", "user_title"], [$image, $feedback, $user_id, $user_title]);
    if(mysqli_query($conn, $sql))
    {
        Session::set("success", "Feedback sent");
        redirect(url("order"));
    }
}