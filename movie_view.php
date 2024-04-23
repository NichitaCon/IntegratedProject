<?php
require_once './etc/config.php';

try {
    if ($_SERVER["REQUEST_METHOD"] !== "GET") {
        throw new Exception("Invalind request method");
    }

    if (array_key_exists("id", $_GET)) {
        $id = $_GET["id"];
        $movie = Movie::findById($id);
        if ($movie === null) {
            throw new Exception("Movie not found");
        }
    }
    else {
        throw new Exception("Missing parameter: movie id");
    }

    if (session_status() === PHP_SESSION_NONE) {
        session_start();
    }
}
catch (Exception $ex) {
    echo $ex->getMessage();
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Movie</title>
</head>
<body>
    <p>
        <a href="index.php">Back</a>
    </p>
    <h2>View Movie</h2>
    <p>
        <strong>Title:</strong> <?= $movie->title ?>
        <strong>Genre:</strong> <?= $movie->genre ?>
        <strong>Year:</strong> <?= $movie->year ?>
        <strong>Box office:</strong> <?= $movie->box_office ?>
        <strong>Director:</strong> <?= $movie->director_id ?>
        
    </p>
    
</body>
</html>