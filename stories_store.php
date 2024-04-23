<?php
require_once "./author.php";
require_once "./category.php";
require_once "./location.php";
require_once "./story.php";
require_once "classes/StoryFormValidator.php";
require_once "classes/FormValidator.php";

function redirect($url) {
    header("Location: $url");
    exit();
}

try {
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    $validator = new StoryFormValidator($_POST);
    $valid = $validator->validate();
    if ($valid) {
        $story = new Story($_POST);
        $story->save();
        $_SESSION["flash"] = [
            "message" => "Movie created successfully",
            "type" => "success"
        ];
        // redirect the browser to the success page
        redirect("index(php).php");
    }
    else {
        $errors = $validator->errors();
        // redirect the browser back to the form
        if (session_status() === PHP_SESSION_NONE) {
            session_start();
        }
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        $_SESSION["flash"] = [
            "message" => "Please fix errors below",
            "type" => "Warning"
        ];
        redirect("story_create_form.php");
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>