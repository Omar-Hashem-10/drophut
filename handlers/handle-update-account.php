<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $email = sanitize_input(Request::getPost("email"));
    $current_password = sanitize_input(Request::getPost("current_password"));
    $new_password = sanitize_input(Request::getPost("new_password"));
    $confirm_password = sanitize_input(Request::getPost("confirm_password"));

    // Initialize validation
    $validator = new Validation();

    // Validate email
    $validator->required("email", $email);
    $validator->validateEmailFormat("email", $email);
    $validator->validateEmailRegex("email", $email);

    // Validate current password
    $validator->required("current_password", $current_password);

    // Validate new password and confirm it
    $validator->required("new_password", $new_password);
    $validator->validatePasswordRegex("new_password", $new_password, "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[@$!%*?&])[A-Za-z\d@$!%*?&]{8,}$/");

    $validator->required("confirm_password", $confirm_password);
    $validator->matchInput("confirm_password", $new_password, $confirm_password);


    // Check for validation errors
    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect(url("edit-profile"));
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");

        // Fetch the user data based on the session user_id
        $user_id = Session::get("user_id");
        $sql = Database::select(['user_id', 'password', 'email'], 'users', 'user_id', $user_id);
        $result = mysqli_query($conn, $sql);

        if ($result && mysqli_num_rows($result) > 0) {
            $row = mysqli_fetch_assoc($result);
            $dbPassword = $row['password'];
            $dbEmail = $row['email'];

            if($dbEmail == $email){
            // Check if the current password matches
            if ($current_password == $dbPassword ) {
                // Update the email and password
                $update_sql = Database::update("users", ["email" => $email, "password" => $new_password], "user_id", $user_id);
                $update_result = mysqli_query($conn, $update_sql);

                if ($update_result) {
                    Session::set("success", "Your profile has been updated successfully.");
                    redirect(url("my-account"));
                } else {
                    Session::set("errors", ["Failed to update your profile."]);
                    redirect(url("edit-profile"));
                }
            } else {
                Session::set("errors", ["Current password is incorrect."]);
                redirect(url("edit-profile"));
            }
        }else{
            Session::set("errors", ["email not found."]);
            redirect(url("edit-profile"));
        }
        } else {
            Session::set("errors", ["User not found."]);
            redirect(url("edit-profile"));
        }

        mysqli_close($conn);
    }
} else {
    redirect(url("404.php"));
}
