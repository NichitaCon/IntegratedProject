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
    // Check if the form was submitted via POST
    if ($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
    
    // Start session if not already started
    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
    
    // Validate form data
    $validator = new StoryFormValidator($_POST);
    $valid = $validator->validate();
    
    if ($valid) {
        // Check if the author already exists
        $author = Author::findByFullName($_POST['first_name'], $_POST['last_name']);
        
        // If author does not exist, create a new author
        if (!$author) {
            $newAuthor = new Author([
                'first_name' => $_POST['first_name'],
                'last_name' => $_POST['last_name']
            ]);
            $newAuthor->save(); // Save the new author to the database
            $authorId = $newAuthor->id; // Retrieve the ID of the newly created author
        } else {
            $authorId = $author->id; // Use the ID of the existing author
        }
        
        // Check if the category already exists
        $category = Category::findByName($_POST['category_name']);

        // If category does not exist, create a new category
        if (!$category) {
            $newCategory = new Category([
                'name' => $_POST['category_name']
            ]);
            $newCategory->save(); // Save the new category to the database
            $categoryId = $newCategory->id; // Retrieve the ID of the newly created category
        } else {
            $categoryId = $category->id; // Use the ID of the existing category
        }
        
        // Create a new story object
        $story = new Story([
            'headline' => $_POST['headline'],
            'article' => $_POST['article'],
            'img_url' => $_POST['img_url'],
            'author_id' => $authorId, // Use the author ID
            'category_id' => $categoryId, // Use the category ID
            'created_at' => $_POST['created_at'],
            'user_created' => 1
        ]);
        
        $story->save(); // Save the new story to the database
        
        $_SESSION["flash"] = [
            "message" => "Story created successfully",
            "type" => "success"
        ];
        // Redirect the browser to the success page
        redirect("index.php");
    } else {
        // If form data is not valid, redirect back to the form page
        $errors = $validator->errors();
        $_SESSION["form-data"] =  $_POST;
        $_SESSION["form-errors"] = $errors;
        $_SESSION["flash"] = [
            "message" => "Please fix errors below",
            "type" => "Warning"
        ];
        redirect("story_create_form.php");
    }
} catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}

?>