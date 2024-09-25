<?php require_once "../inc/main-handlers.php"; ?>
<?php

$name = Request::getPost('name');
$email = Request::getPost('email');
$comment = Request::getPost('comment');

$validator = new Validation();

$validator->required('comment', $comment);
$validator->required('name', $name);
$validator->required('email', $email);
$validator->validateEmailFormat('email', $email);

$errors = $validator->getErrors();

if (!empty($errors)) {
    Session::set('errors', $errors);
    redirect(url("blog-details&id=") . $blog_id);
} else {
    $blog_id = Request::getGet("id");
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::insert("comments", ["name", "email", "comment_text","blog_id"], [$name, $email, $comment, $blog_id]);
    if (mysqli_query($conn, $sql)) {
        Session::set('success', "comment added");
        redirect(url("blog-details&id=") . $blog_id);
    }
}
