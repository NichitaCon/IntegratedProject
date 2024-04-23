<?php
require_once "./etc/config.php";
require_once "./etc/global.php";
 
try {
    if($_SERVER["REQUEST_METHOD"] !== "POST") {
        throw new Exception("Invalid request method");
    }
 
    if(array_key_exists("id",$_POST)){
        $id = $_POST ["id"];
        $movie = Movie::findById($id);
        if($movie === null) {
            throw new Exception("Movie not found");
        }
    }
    else{
        throw new Exception("Missing parameter: Movie id");
    }
 
    if(session_status() === PHP_SESSION_NONE) {
        session_start();
    }
 
 
$vadlidator = new MovieFormValidator($_POST);
$valid = $vadlidator->validate();
 
if ($valid){
    $movie->title = $_POST["title"];
    $movie->genre = $_POST["genre"];
    $movie->year = $_POST["year"];
    $movie->box_office = $_POST["box_office"];
    $movie->director_id = $_POST["director_id"];
    $movie->save();
 
    $_SESSION["flash"] = [
        "message" => "Movie updated successfully",
        "type" => "success"
    ];
    redirect("index.php");
}
else{
    $errors =  $vadlidator->errors();
    $_SESSION["form-data"] = $_POST;
    $_SESSION["form-errors"] = $errors;
    $_SESSION["flash"] = [
        "message" => "Please fix the errors below",
        "type" => "warning"
    ];
    redirect("movie_edit_form.php?id=".$movie->id);
 
}
 
}
catch(Exception $ex){
    echo $ex->getMessage();
    exit();
}
?>