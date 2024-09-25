<?php require_once "../inc/main-handlers.php"; ?>
<?php

$name = Request::getPost('name');
$email = Request::getPost('email');
$review = Request::getPost('review_comment');
$rating = Request::getPost('rating');

$validator = new Validation();

$validator->required('review_comment', $review);
$validator->required('name', $name);
$validator->required('email', $email);
$validator->validateEmailFormat('email', $email);

$errors = $validator->getErrors();

if (!empty($errors)) {
    Session::set('errors', $errors);
    redirect(url("product-details"));
} else {
    $product_id = Request::getGet("id");
    $conn = Database::connect("localhost", "root", "", "drophut");
    $sql = Database::insert("review", ["you_review", "name", "email", "rating", "product_id"], [$review, $name, $email, $rating, $product_id]);
    if (mysqli_query($conn, $sql)) {
        Session::set('success', "review added");
        redirect(url("product-details"));
    }
}
