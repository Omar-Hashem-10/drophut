<?php require_once "../inc/main-handlers.php"; ?>
<?php

$name = Request::getPost('name');
$email = Request::getPost('email');
$message = Request::getPost('msg');

$validator = new Validation();

$validator->required('name', $name);

$validator->required("email", $email);
$validator->validateEmailFormat("email", $email);
$validator->validateEmailRegex("email", $email);

$validator->required('msg', $message);

$errors = $validator->getErrors();

if (!empty($errors)) {
    Session::set('errors', $errors);
    redirect(url("contact"));
}else{
  $user_id = Session::get("user_id");
  $conn = Database::connect("localhost", "root", "", "drophut");
  $sql = Database::insert("contact", ["name", "email", "message", "user_id"], ["$name", "$email", "$message", "$user_id"]);
}


if (mysqli_query($conn, $sql)) {
    Session::set('success', 'Message sent successfully.');
    redirect(url("contact"));
} else {
    Session::set('errors', ['general' => 'Failed to send message. Please try again later.']);
    redirect(url("contact"));
}
exit();
?>
