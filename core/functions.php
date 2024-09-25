<?php

// Return a URL path
function url($path)
{
  return BASE_URL . "index.php?page=" . $path;
}

function check_request_method($method)
{
  return $_SERVER["REQUEST_METHOD"] === $method;
}

function sanitize_input($input)
{
  return trim(htmlspecialchars(htmlentities($input)));
}


function redirect($path)
{
  header("Location: $path");
  exit; 
}

function errors($errorName)
{
  if (Session::check('errors') && isset(Session::get('errors')[$errorName])) {
    echo '<div class="alert alert-danger text-center">';
    echo htmlspecialchars(Session::get('errors')[$errorName]);
    echo '</div>';
  }
}
