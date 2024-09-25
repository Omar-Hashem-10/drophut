<?php require_once "../inc/main-handlers.php"; ?>
<?php

$email = Request::getPost("email");


$validator = new Validation();

$validator->required("email", $email);
$validator->validateEmailFormat("email", $email);
$validator->validateEmailRegex("email", $email);

$errors = $validator->getErrors();


if (!empty($errors)) {
    Session::set('errors', $errors);
    redirect(url("forget-password"));
}else{
    $conn = Database::connect("localhost", "root", "", "drophut");

    $sql = Database::select(["password"], "users", "email", $email) . "AND `role` = 'User'";

    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0)
    {
        $row = mysqli_fetch_assoc($result);
        $password = $row['password'];
    
        Session::set("password", $password);
    
        $pass = Session::get("password");
    
        Session::set("success", "Password is found: $pass");
    
        redirect(url("forget-password"));
    }else
    {
        Session::set("errors", "No user found with this email.");
    
        redirect(url("forget-password"));
    }

}

