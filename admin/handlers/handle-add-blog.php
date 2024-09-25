<?php require_once "../inc/main-handlers.php"; ?>
<?php

if (check_request_method("POST")) {
    $title = sanitize_input(Request::getPost("title"));
    $author = sanitize_input(Request::getPost("author"));
    $excerpt = sanitize_input(Request::getPost("excerpt"));
    $quote = sanitize_input(Request::getPost("quote"));
    $content = sanitize_input(Request::getPost("content"));
    $image = sanitize_input(Request::getPost("image"));
    $major = sanitize_input(Request::getPost("major"));

    $validator = new Validation();

    $validator->required("title", $title);
    $validator->maxVal("title", $title, 50);
    $validator->minVal("title", $title, 3);

    $validator->required("author", $author);
    $validator->maxVal("author", $author, 25);
    $validator->minVal("author", $author, 3);
    $validator->alpha("author", $author);

    $validator->required("excerpt", $excerpt);

    $validator->required("quote", $quote);

    $validator->required("content", $content);

    $validator->required("image", $image);

    $validator->required("major", $major);

    if (!empty($validator->getErrors())) {
        Session::set("errors", $validator->getErrors());
        redirect("../add_blog.php");
    } else {
        $conn = Database::connect("localhost", "root", "", "drophut");
        if (!$conn) {
            die("Connection failed: " . mysqli_connect_error());
        }

        $sql = Database::insert("blogs", ["title", "author", "excerpt", "quote", "content", "image", "major"],
                                [$title, $author, $excerpt, $quote, $content, $image, $major]);
        if (mysqli_query($conn, $sql)) {
            Session::set("success", "Blog inserted successfully");
            redirect("../add-blog.php");
        }
    }
}else {
    redirect(url("404.php"));
}
